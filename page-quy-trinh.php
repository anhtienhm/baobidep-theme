<?php
/** Template Name: Quy trình */
get_header();
?>

<!-- HERO -->
<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Quy trình</b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Quy trình đặt hàng</span>
      <h1 class="rv" data-d="1">Đặt hàng chỉ với<br><span class="gtext">4 bước đơn giản</span></h1>
      <p class="lp-hero-lead rv" data-d="2">Quy trình tinh gọn, minh bạch từ tư vấn đến giao hàng — đảm bảo trải nghiệm tốt nhất cho khách hàng.</p>
    </div>
  </div>
</section>

<!-- 4 STEPS QUICK GRID (visual summary) -->
<section class="pad">
  <div class="wrap">
    <div class="steps">
      <div class="step rv">
        <div class="scircle"><span class="n">1</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
        <h3>Tư vấn</h3>
        <p>Tiếp nhận yêu cầu, tư vấn giải pháp phù hợp.</p>
      </div>
      <div class="step rv" data-d="1">
        <div class="scircle"><span class="n">2</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8"/></svg></div>
        <h3>Báo giá</h3>
        <p>Gửi báo giá chi tiết, cạnh tranh trong 24h.</p>
      </div>
      <div class="step rv" data-d="2">
        <div class="scircle"><span class="n">3</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><path d="M3 21h18M3 7l9-4 9 4M5 7v14M19 7v14"/></svg></div>
        <h3>Sản xuất</h3>
        <p>Sản xuất kiểm phẩm chất lượng cao, đúng tiến độ.</p>
      </div>
      <div class="step rv" data-d="3">
        <div class="scircle"><span class="n">4</span><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke="currentColor"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        <h3>Giao hàng</h3>
        <p>Đóng gói cẩn thận, giao toàn quốc đúng hẹn.</p>
      </div>
    </div>
  </div>
</section>

<!-- BODY CONTENT (editable in WP Admin) -->
<?php if ( get_the_content() ) : ?>
<section class="pad lp-section-alt" style="padding-top:60px">
  <div class="wrap">
    <div class="lp-body rv">
      <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="lp-cta-banner">
  <div class="wrap">
    <h2>Bắt đầu đặt hàng ngay</h2>
    <p>Gửi yêu cầu báo giá — nhận phản hồi trong 30 phút (giờ hành chính).</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Gửi yêu cầu báo giá</a>
      <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-line">Gọi <?php echo esc_html(vua_opt('phone')); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
