<?php
if ( ! defined('ABSPATH') ) exit;

function vua_handle_lead() {
    check_ajax_referer('vua_lead', 'nonce');

    $name  = isset($_POST['name'])  ? sanitize_text_field( wp_unslash($_POST['name']) )  : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field( wp_unslash($_POST['phone']) ) : '';
    $email = isset($_POST['email']) ? sanitize_email( wp_unslash($_POST['email']) )       : '';
    $need  = isset($_POST['prod'])  ? sanitize_text_field( wp_unslash($_POST['prod']) )   : '';

    if ( $name === '' || $phone === '' ) {
        wp_send_json_error(array('msg' => 'Vui lòng nhập họ tên và số điện thoại.'));
    }

    $id = wp_insert_post(array(
        'post_type'   => 'vua_lead',
        'post_status' => 'publish',
        'post_title'  => $name . ' — ' . $phone,
    ), true);

    if ( ! is_wp_error($id) ) {
        update_post_meta($id, '_phone', $phone);
        update_post_meta($id, '_email', $email);
        update_post_meta($id, '_need',  $need);
    }

    $to   = get_option('admin_email');
    $body = "Yêu cầu báo giá mới từ website:\n\n"
          . "Họ tên: {$name}\n"
          . "Số điện thoại: {$phone}\n"
          . "Email: {$email}\n"
          . "Nhu cầu / Loại sản phẩm: {$need}\n";
    @wp_mail($to, '[VUA Bao Bì] Yêu cầu báo giá: ' . $name, $body);

    wp_send_json_success(array('msg' => 'Đã nhận yêu cầu.'));
}
add_action('wp_ajax_vua_lead', 'vua_handle_lead');
add_action('wp_ajax_nopriv_vua_lead', 'vua_handle_lead');
