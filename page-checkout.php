<?php
/** Template Name: Thanh toán */
get_header();
$lines = Vua_Cart::lines();
$total = Vua_Cart::total();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <a href="<?php echo esc_url(vua_cart_url()); ?>">Giỏ hàng</a> <span>/</span> <b>Thanh toán</b></nav>
    <div class="shead"><span class="kick">Hoàn tất đơn hàng</span><h1>Thông tin đặt hàng</h1></div>
  </div>
</section>

<section class="checkout-wrap pad" style="padding-top:0">
  <div class="wrap">
    <?php if ( empty($lines) ) : ?>
      <div class="cart-empty">
        <h3>Giỏ hàng đang trống</h3>
        <a href="<?php echo esc_url(get_post_type_archive_link('sanpham')); ?>" class="btn btn-gold">Xem sản phẩm</a>
      </div>
    <?php else : ?>
      <div class="checkout-grid">
        <form class="checkout-form" id="checkoutForm">
          <h3>Thông tin khách hàng</h3>
          <div class="fg"><label>Họ và tên <i>*</i></label><input type="text" name="name" required></div>
          <div class="fg"><label>Số điện thoại <i>*</i></label><input type="tel" name="phone" required placeholder="0xxx xxx xxx"></div>
          <div class="fg"><label>Email</label><input type="email" name="email" placeholder="optional@example.com"></div>
          <div class="fg"><label>Địa chỉ giao hàng <i>*</i></label><input type="text" name="address" required placeholder="Số nhà, đường, phường, quận, tỉnh/thành"></div>
          <div class="fg"><label>Ghi chú</label><textarea name="notes" rows="3" placeholder="Yêu cầu đặc biệt cho đơn hàng (nếu có)"></textarea></div>
          <div class="checkout-msg" id="checkoutMsg"></div>
          <button type="submit" class="btn btn-gold checkout-submit">Đặt hàng ngay</button>
          <p class="checkout-note">Nhân viên sẽ liên hệ xác nhận đơn hàng trong vòng 30 phút (giờ hành chính). Thanh toán COD hoặc chuyển khoản sau khi xác nhận.</p>
        </form>
        <aside class="checkout-summary">
          <h3>Đơn hàng</h3>
          <ul class="checkout-lines">
            <?php foreach ( $lines as $l ) : ?>
              <li>
                <span class="cl-title"><?php echo esc_html($l['title']); ?> <em>× <?php echo intval($l['qty']); ?></em></span>
                <span class="cl-total"><?php echo esc_html(vua_format_price($l['line_total'])); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="cart-sum-row total"><span>Tổng cộng</span><b><?php echo esc_html(vua_format_price($total)); ?></b></div>
          <a href="<?php echo esc_url(vua_cart_url()); ?>" class="cart-continue">← Sửa giỏ hàng</a>
        </aside>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
