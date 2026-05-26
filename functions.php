<?php
if ( ! defined('ABSPATH') ) exit;
define('VUA_VER', '1.0.0');

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/ajax.php';

function vua_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form','gallery','caption','style','script'));
    add_theme_support('custom-logo', array('height'=>96,'width'=>96,'flex-height'=>true,'flex-width'=>true));
    register_nav_menus(array('primary' => 'Menu chính (Header)'));
}
add_action('after_setup_theme', 'vua_setup');

function vua_assets() {
    $css_path = get_template_directory() . '/style.css';
    $js_path  = get_template_directory() . '/assets/js/main.js';
    $css_ver  = file_exists($css_path) ? filemtime($css_path) : VUA_VER;
    $js_ver   = file_exists($js_path) ? filemtime($js_path) : VUA_VER;

    wp_enqueue_style('vua-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('vua-style', get_stylesheet_uri(), array('vua-fonts'), $css_ver);

    $logo = get_template_directory_uri() . '/assets/img/logo.png';
    if ( has_custom_logo() ) {
        $cid = get_theme_mod('custom_logo');
        $src = $cid ? wp_get_attachment_image_url($cid, 'full') : '';
        if ( $src ) $logo = $src;
    }
    $logo_footer = 'https://baobidep.webngon.net/wp-content/uploads/2026/05/logo-footer.png';
    wp_add_inline_style('vua-style', ':root{--logo:url("' . esc_url($logo) . '");--logo-footer:url("' . esc_url($logo_footer) . '")}');

    wp_enqueue_script('vua-main', get_template_directory_uri() . '/assets/js/main.js', array(), $js_ver, true);
    wp_localize_script('vua-main', 'vuaAjax', array(
        'url'       => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('vua_lead'),
        'cartNonce' => wp_create_nonce('vua_cart'),
        'cartUrl'   => vua_cart_url(),
    ));
}
add_action('wp_enqueue_scripts', 'vua_assets');

/** Lay tuy chon (Customizer) kem gia tri mac dinh */
function vua_opt($key) {
    $d = array(
        'phone'   => '0377 662 830',
        'email'   => 'vua.baobi@gmail.com',
        'address' => '45/12 Lê Văn Lương, P. Tân Phong, Quận 7, TP.HCM',
        'hero_t1' => 'Vua của ngành',
        'hero_t2' => 'bao bì đóng gói',
    );
    return get_theme_mod('vua_' . $key, isset($d[$key]) ? $d[$key] : '');
}
function vua_tel() { return preg_replace('/[^0-9+]/', '', vua_opt('phone')); }

/** Custom commerce — cart su dung cookie JSON */
require get_template_directory() . '/inc/cart.php';

/** URL cua 3 trang commerce */
function vua_cart_url() { return home_url('/cart/'); }
function vua_checkout_url() { return home_url('/checkout/'); }
function vua_thanks_url($order_id = 0) {
    $url = home_url('/cam-on/');
    return $order_id ? add_query_arg('order', $order_id, $url) : $url;
}

/** Cart count tu cart custom */
function vua_cart_count() {
    return Vua_Cart::count();
}

/** Format gia VND: 25000 -> 25.000 ₫ */
function vua_format_price($n) {
    return number_format((float) $n, 0, ',', '.') . ' ₫';
}

/** Auto tao 3 trang commerce neu chua co */
add_action('init', function () {
    if ( get_option('vua_pages_seeded') ) return;
    $pages = array(
        'cart'   => array('Giỏ hàng', 'page-cart.php'),
        'checkout' => array('Thanh toán', 'page-checkout.php'),
        'cam-on' => array('Cảm ơn', 'page-thanks.php'),
    );
    foreach ( $pages as $slug => $info ) {
        if ( get_page_by_path($slug) ) continue;
        $pid = wp_insert_post(array(
            'post_type'   => 'page',
            'post_status' => 'publish',
            'post_title'  => $info[0],
            'post_name'   => $slug,
            'post_content' => '',
        ));
        if ( $pid && ! is_wp_error($pid) ) {
            update_post_meta($pid, '_wp_page_template', $info[1]);
        }
    }
    update_option('vua_pages_seeded', 1);
}, 30);

/** Auto tao cac page tuong ung menu */
add_action('init', function () {
    if ( get_option('vua_menu_pages_seeded_v1') ) return;
    $pages = array(
        'gioi-thieu' => array('Giới thiệu', 'page-gioi-thieu.php'),
        'san-xuat'   => array('Sản xuất', 'page-san-xuat.php'),
        'quy-trinh'  => array('Quy trình', 'page-quy-trinh.php'),
        'tin-tuc'    => array('Tin tức', 'page-tin-tuc.php'),
        'lien-he'    => array('Liên hệ', 'page-lien-he.php'),
    );
    foreach ( $pages as $slug => $info ) {
        if ( get_page_by_path($slug) ) continue;
        $pid = wp_insert_post(array(
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_title'   => $info[0],
            'post_name'    => $slug,
            'post_content' => '',
        ));
        if ( $pid && ! is_wp_error($pid) ) {
            update_post_meta($pid, '_wp_page_template', $info[1]);
        }
    }
    update_option('vua_menu_pages_seeded_v1', 1);
}, 32);

/** Menu mac dinh khi chua tao menu trong wp-admin */
function vua_menu_fallback() {
    $items = array(
        home_url('/')             => 'Trang chủ',
        home_url('/gioi-thieu/')  => 'Giới thiệu',
        home_url('/san-pham/')    => 'Sản phẩm',
        home_url('/san-xuat/')    => 'Sản xuất',
        home_url('/quy-trinh/')   => 'Quy trình',
        home_url('/tin-tuc/')     => 'Tin tức',
        home_url('/lien-he/')     => 'Liên hệ',
    );
    $current = trim( $_SERVER['REQUEST_URI'] ?? '', '/' );
    if ( $current === '' ) $current = home_url('/');
    echo '<ul id="menu" class="menu">';
    foreach ( $items as $href => $label ) {
        $href_path = trim( wp_parse_url($href, PHP_URL_PATH) ?: '', '/' );
        $is_active = false;
        if ( $href === home_url('/') ) {
            $is_active = is_front_page();
        } elseif ( $href_path !== '' ) {
            $is_active = strpos($current, $href_path) === 0;
        }
        printf('<li><a href="%s"%s>%s</a></li>', esc_url($href), $is_active ? ' class="active"' : '', esc_html($label));
    }
    echo '</ul>';
}
