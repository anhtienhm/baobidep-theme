<?php
/** Template Name: Giỏ hàng */
get_header();
$lines = Vua_Cart::lines();
$total = Vua_Cart::total();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Giỏ hàng</b></nav>
    <div class="shead"><span class="kick">Đơn hàng của bạn</span><h1>Giỏ hàng</h1></div>
  </div>
</section>

<section class="cart-wrap pad" style="padding-top:0">
  <div class="wrap">
    <?php if ( empty($lines) ) : ?>
      <div class="cart-empty">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
        <h3>Giỏ hàng đang trống</h3>
        <p>Bạn chưa thêm sản phẩm nào. Khám phá danh mục để chọn sản phẩm phù hợp.</p>
        <a href="<?php echo esc_url(get_post_type_archive_link('sanpham')); ?>" class="btn btn-gold">Xem sản phẩm</a>
      </div>
    <?php else : ?>
      <div class="cart-grid">
        <div class="cart-items">
          <?php foreach ( $lines as $l ) : ?>
            <div class="cart-row" data-id="<?php echo intval($l['id']); ?>">
              <a href="<?php echo esc_url($l['url']); ?>" class="cart-thumb"><img src="<?php echo esc_url($l['img']); ?>" alt="<?php echo esc_attr($l['title']); ?>" loading="lazy"></a>
              <div class="cart-info">
                <a href="<?php echo esc_url($l['url']); ?>" class="cart-title"><?php echo esc_html($l['title']); ?></a>
                <div class="cart-price"><?php echo $l['price'] > 0 ? esc_html(vua_format_price($l['price'])) : '<em>Liên hệ</em>'; ?></div>
              </div>
              <div class="cart-qty">
                <button type="button" class="qty-dec" aria-label="Giảm">−</button>
                <input type="number" class="qty-input" value="<?php echo intval($l['qty']); ?>" min="1" max="999" inputmode="numeric">
                <button type="button" class="qty-inc" aria-label="Tăng">+</button>
              </div>
              <div class="cart-line-total"><?php echo esc_html(vua_format_price($l['line_total'])); ?></div>
              <button type="button" class="cart-remove" aria-label="Xóa">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
              </button>
            </div>
          <?php endforeach; ?>
        </div>
        <aside class="cart-summary">
          <h3>Tóm tắt đơn</h3>
          <div class="cart-sum-row"><span>Số sản phẩm</span><b id="cartSumCount"><?php echo Vua_Cart::count(); ?></b></div>
          <div class="cart-sum-row total"><span>Tổng cộng</span><b id="cartSumTotal"><?php echo esc_html(vua_format_price($total)); ?></b></div>
          <a href="<?php echo esc_url(vua_checkout_url()); ?>" class="btn btn-gold cart-checkout-btn">Tiến hành đặt hàng</a>
          <a href="<?php echo esc_url(get_post_type_archive_link('sanpham')); ?>" class="cart-continue">← Tiếp tục mua sắm</a>
        </aside>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
