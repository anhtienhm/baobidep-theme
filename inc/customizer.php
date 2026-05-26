<?php
if ( ! defined('ABSPATH') ) exit;
add_action('customize_register', function( $wp ) {
    $wp->add_section('vua_info', array(
        'title'    => 'VUA — Thông tin & Hero',
        'priority' => 30,
    ));
    $fields = array(
        'vua_phone'   => array('Số điện thoại', '0377 662 830', 'text'),
        'vua_email'   => array('Email', 'vua.baobi@gmail.com', 'text'),
        'vua_address' => array('Địa chỉ', '45/12 Lê Văn Lương, P. Tân Phong, Quận 7, TP.HCM', 'textarea'),
        'vua_hero_t1' => array('Hero — dòng 1', 'Vua của ngành', 'text'),
        'vua_hero_t2' => array('Hero — dòng 2 (chữ vàng)', 'bao bì công nghiệp', 'text'),
    );
    foreach ( $fields as $id => $f ) {
        $wp->add_setting($id, array(
            'default'           => $f[1],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));
        $wp->add_control($id, array(
            'label'   => $f[0],
            'section' => 'vua_info',
            'type'    => $f[2],
        ));
    }
});
