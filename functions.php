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
    wp_enqueue_style('vua-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('vua-style', get_stylesheet_uri(), array('vua-fonts'), VUA_VER);

    $logo = get_template_directory_uri() . '/assets/img/logo.png';
    if ( has_custom_logo() ) {
        $cid = get_theme_mod('custom_logo');
        $src = $cid ? wp_get_attachment_image_url($cid, 'full') : '';
        if ( $src ) $logo = $src;
    }
    wp_add_inline_style('vua-style', ':root{--logo:url("' . esc_url($logo) . '")}');

    wp_enqueue_script('vua-main', get_template_directory_uri() . '/assets/js/main.js', array(), VUA_VER, true);
    wp_localize_script('vua-main', 'vuaAjax', array(
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vua_lead'),
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
        'hero_t2' => 'bao bì công nghiệp',
    );
    return get_theme_mod('vua_' . $key, isset($d[$key]) ? $d[$key] : '');
}
function vua_tel() { return preg_replace('/[^0-9+]/', '', vua_opt('phone')); }

/** Menu mac dinh khi chua tao menu trong wp-admin */
function vua_menu_fallback() {
    $items = array(
        '#'         => 'Trang chủ',
        '#about'    => 'Giới thiệu',
        '#products' => 'Sản phẩm',
        '#why'      => 'Sản xuất',
        '#process'  => 'Quy trình',
        '#blog'     => 'Tin tức',
        '#quote'    => 'Liên hệ',
    );
    echo '<ul id="menu" class="menu">';
    $first = true;
    foreach ( $items as $href => $label ) {
        printf('<li><a href="%s"%s>%s</a></li>', esc_attr($href), $first ? ' class="active"' : '', esc_html($label));
        $first = false;
    }
    echo '</ul>';
}
