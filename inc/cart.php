<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Vua_Cart — gio hang luu trong cookie JSON
 * Format: {"items":[{"id":123,"qty":2},...]}
 */
class Vua_Cart {
    const COOKIE = 'vua_cart';
    const TTL    = 30 * DAY_IN_SECONDS;

    public static function get_items() {
        if ( empty($_COOKIE[self::COOKIE]) ) return array();
        $raw = wp_unslash($_COOKIE[self::COOKIE]);
        $data = json_decode($raw, true);
        if ( ! is_array($data) || empty($data['items']) ) return array();
        $clean = array();
        foreach ( $data['items'] as $i ) {
            $id  = isset($i['id']) ? (int) $i['id'] : 0;
            $qty = isset($i['qty']) ? max(1, min(999, (int) $i['qty'])) : 1;
            if ( $id > 0 ) $clean[] = array('id' => $id, 'qty' => $qty);
        }
        return $clean;
    }

    public static function save($items) {
        $data = wp_json_encode(array('items' => array_values($items)));
        setcookie(self::COOKIE, $data, time() + self::TTL, COOKIEPATH ?: '/', COOKIE_DOMAIN, is_ssl(), false);
        $_COOKIE[self::COOKIE] = $data;
    }

    public static function clear() {
        setcookie(self::COOKIE, '', time() - 3600, COOKIEPATH ?: '/', COOKIE_DOMAIN);
        unset($_COOKIE[self::COOKIE]);
    }

    public static function add($product_id, $qty = 1) {
        $product_id = (int) $product_id;
        $qty = max(1, (int) $qty);
        if ( get_post_type($product_id) !== 'sanpham' ) return false;
        $items = self::get_items();
        $found = false;
        foreach ( $items as &$i ) {
            if ( $i['id'] === $product_id ) {
                $i['qty'] = min(999, $i['qty'] + $qty);
                $found = true; break;
            }
        }
        unset($i);
        if ( ! $found ) $items[] = array('id' => $product_id, 'qty' => $qty);
        self::save($items);
        return true;
    }

    public static function update($product_id, $qty) {
        $product_id = (int) $product_id;
        $qty = (int) $qty;
        $items = self::get_items();
        foreach ( $items as $k => &$i ) {
            if ( $i['id'] === $product_id ) {
                if ( $qty <= 0 ) unset($items[$k]);
                else $i['qty'] = min(999, $qty);
                self::save($items);
                return true;
            }
        }
        return false;
    }

    public static function remove($product_id) {
        return self::update($product_id, 0);
    }

    public static function count() {
        $n = 0;
        foreach ( self::get_items() as $i ) $n += $i['qty'];
        return $n;
    }

    /**
     * Detailed line items voi data product hien tai
     * Tra ve array of [id, qty, title, price, line_total, url, img, post]
     */
    public static function lines() {
        $lines = array();
        foreach ( self::get_items() as $i ) {
            $p = get_post($i['id']);
            if ( ! $p || $p->post_type !== 'sanpham' || $p->post_status !== 'publish' ) continue;
            $price = (float) get_post_meta($p->ID, '_vua_price', true);
            $lines[] = array(
                'id'         => $p->ID,
                'qty'        => $i['qty'],
                'title'      => $p->post_title,
                'price'      => $price,
                'line_total' => $price * $i['qty'],
                'url'        => get_permalink($p),
                'img'        => function_exists('vua_product_image') ? vua_product_image($p->ID) : '',
                'post'       => $p,
            );
        }
        return $lines;
    }

    public static function total() {
        $t = 0;
        foreach ( self::lines() as $l ) $t += $l['line_total'];
        return $t;
    }
}
