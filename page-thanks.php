<?php
/** Template Name: Cảm ơn */
get_header();
$order_id = isset($_GET['order']) ? (int) $_GET['order'] : 0;
$order = $order_id ? get_post($order_id) : null;
$valid = $order && $order->post_type === 'vua_order';
?>

<section class="sp-hero pad">
  <div class="wrap">
    <div class="thanks-box">
      <div class="thanks-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
      </div>
      <h1>Cảm ơn quý khách!</h1>
      <?php if ( $valid ) :
        $name  = get_post_meta($order_id, '_vua_customer_name', true);
        $phone = get_post_meta($order_id, '_vua_customer_phone', true);
        $items = get_post_meta($order_id, '_vua_items', true);
        $total = get_post_meta($order_id, '_vua_total', true);
      ?>
        <p class="thanks-lead">Đơn hàng <b>#<?php echo intval($order_id); ?></b> đã được ghi nhận. Nhân viên sẽ liên hệ với quý khách <b><?php echo esc_html($name); ?></b> qua số <b><?php echo esc_html($phone); ?></b> trong vòng 30 phút để xác nhận.</p>

        <div class="thanks-summary">
          <h3>Chi tiết đơn hàng</h3>
          <ul class="checkout-lines">
            <?php if ( is_array($items) ) foreach ( $items as $it ) : ?>
              <li>
                <span class="cl-title"><?php echo esc_html($it['title']); ?> <em>× <?php echo intval($it['qty']); ?></em></span>
                <span class="cl-total"><?php echo esc_html(vua_format_price($it['price'] * $it['qty'])); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="cart-sum-row total"><span>Tổng cộng</span><b><?php echo esc_html(vua_format_price($total)); ?></b></div>
        </div>
      <?php else : ?>
        <p class="thanks-lead">Yêu cầu của bạn đã được ghi nhận.</p>
      <?php endif; ?>

      <div class="thanks-cta">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold">Về trang chủ</a>
        <a href="<?php echo esc_url(get_post_type_archive_link('sanpham')); ?>" class="btn btn-call">Tiếp tục mua sắm</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
