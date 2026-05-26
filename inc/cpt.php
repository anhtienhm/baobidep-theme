<?php
if ( ! defined('ABSPATH') ) exit;

/** CPT luu yeu cau bao gia (Lead) */
add_action('init', function () {
    register_post_type('vua_lead', array(
        'labels' => array(
            'name'          => 'Yêu cầu báo giá',
            'singular_name' => 'Yêu cầu báo giá',
            'menu_name'     => 'Báo giá (Leads)',
            'all_items'     => 'Tất cả yêu cầu',
        ),
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-email-alt',
        'menu_position' => 26,
        'supports'      => array('title'),
        'capability_type' => 'post',
    ));
});

add_filter('manage_vua_lead_posts_columns', function ( $cols ) {
    return array(
        'cb'     => isset($cols['cb']) ? $cols['cb'] : '',
        'title'  => 'Tên',
        'vphone' => 'SĐT',
        'vemail' => 'Email',
        'vneed'  => 'Nhu cầu',
        'date'   => 'Ngày gửi',
    );
});
add_action('manage_vua_lead_posts_custom_column', function ( $col, $id ) {
    if ( in_array($col, array('vphone','vemail','vneed'), true) ) {
        echo esc_html( get_post_meta($id, '_' . substr($col, 1), true) );
    }
}, 10, 2);
