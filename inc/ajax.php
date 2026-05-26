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

/** Cart AJAX endpoints */
function vua_cart_ajax_response() {
    wp_send_json_success(array(
        'count' => Vua_Cart::count(),
        'total' => Vua_Cart::total(),
        'total_fmt' => vua_format_price(Vua_Cart::total()),
    ));
}

add_action('wp_ajax_vua_cart_add', 'vua_cart_add');
add_action('wp_ajax_nopriv_vua_cart_add', 'vua_cart_add');
function vua_cart_add() {
    check_ajax_referer('vua_cart', 'nonce');
    $id  = isset($_POST['id'])  ? (int) $_POST['id']  : 0;
    $qty = isset($_POST['qty']) ? (int) $_POST['qty'] : 1;
    if ( ! Vua_Cart::add($id, $qty) ) wp_send_json_error(array('msg' => 'Sản phẩm không hợp lệ.'));
    vua_cart_ajax_response();
}

add_action('wp_ajax_vua_cart_update', 'vua_cart_update_ajax');
add_action('wp_ajax_nopriv_vua_cart_update', 'vua_cart_update_ajax');
function vua_cart_update_ajax() {
    check_ajax_referer('vua_cart', 'nonce');
    $id  = isset($_POST['id'])  ? (int) $_POST['id']  : 0;
    $qty = isset($_POST['qty']) ? (int) $_POST['qty'] : 0;
    Vua_Cart::update($id, $qty);
    vua_cart_ajax_response();
}

add_action('wp_ajax_vua_cart_remove', 'vua_cart_remove_ajax');
add_action('wp_ajax_nopriv_vua_cart_remove', 'vua_cart_remove_ajax');
function vua_cart_remove_ajax() {
    check_ajax_referer('vua_cart', 'nonce');
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    Vua_Cart::remove($id);
    vua_cart_ajax_response();
}

/** Checkout — tao don hang */
add_action('wp_ajax_vua_checkout', 'vua_handle_checkout');
add_action('wp_ajax_nopriv_vua_checkout', 'vua_handle_checkout');
function vua_handle_checkout() {
    check_ajax_referer('vua_cart', 'nonce');

    $name    = isset($_POST['name'])    ? sanitize_text_field( wp_unslash($_POST['name']) )    : '';
    $phone   = isset($_POST['phone'])   ? sanitize_text_field( wp_unslash($_POST['phone']) )   : '';
    $email   = isset($_POST['email'])   ? sanitize_email( wp_unslash($_POST['email']) )         : '';
    $address = isset($_POST['address']) ? sanitize_text_field( wp_unslash($_POST['address']) ) : '';
    $notes   = isset($_POST['notes'])   ? sanitize_textarea_field( wp_unslash($_POST['notes']) ) : '';

    if ( $name === '' || $phone === '' || $address === '' ) {
        wp_send_json_error(array('msg' => 'Vui lòng nhập đầy đủ Họ tên, SĐT, Địa chỉ.'));
    }

    $lines = Vua_Cart::lines();
    if ( empty($lines) ) {
        wp_send_json_error(array('msg' => 'Giỏ hàng đang trống.'));
    }

    $items = array();
    $total = 0;
    foreach ( $lines as $l ) {
        $items[] = array(
            'id'    => $l['id'],
            'title' => $l['title'],
            'qty'   => $l['qty'],
            'price' => $l['price'],
        );
        $total += $l['line_total'];
    }

    $order_id = wp_insert_post(array(
        'post_type'    => 'vua_order',
        'post_status'  => 'publish',
        'post_title'   => sprintf('Đơn #%s — %s', date('ymdHis'), $name),
        'post_content' => $notes,
    ), true);

    if ( is_wp_error($order_id) ) {
        wp_send_json_error(array('msg' => 'Không thể tạo đơn hàng.'));
    }

    update_post_meta($order_id, '_vua_customer_name', $name);
    update_post_meta($order_id, '_vua_customer_phone', $phone);
    update_post_meta($order_id, '_vua_customer_email', $email);
    update_post_meta($order_id, '_vua_customer_address', $address);
    update_post_meta($order_id, '_vua_items', $items);
    update_post_meta($order_id, '_vua_total', $total);
    update_post_meta($order_id, '_vua_status', 'pending');

    // Email admin
    $admin_to = get_option('admin_email');
    $rows = '';
    foreach ( $items as $it ) {
        $rows .= sprintf("- %s × %d (%s/sp)\n", $it['title'], $it['qty'], vua_format_price($it['price']));
    }
    $body = "Đơn hàng mới #{$order_id}\n\n"
          . "Khách hàng: {$name}\n"
          . "SĐT: {$phone}\n"
          . "Email: {$email}\n"
          . "Địa chỉ: {$address}\n"
          . "Ghi chú: " . ($notes ?: '(không có)') . "\n\n"
          . "Sản phẩm:\n{$rows}\n"
          . "Tổng cộng: " . vua_format_price($total) . "\n";
    @wp_mail($admin_to, "[VUA Bao Bì] Đơn hàng mới #{$order_id}", $body);

    Vua_Cart::clear();

    wp_send_json_success(array(
        'order_id'    => $order_id,
        'redirect'    => add_query_arg('order', $order_id, home_url('/cam-on/')),
    ));
}
