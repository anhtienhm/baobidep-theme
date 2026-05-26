<?php
/** Template Name: Giới thiệu */
get_header();
?>

<!-- HERO -->
<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Giới thiệu</b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Về chúng tôi</span>
      <h1 class="rv" data-d="1">Công ty Cổ phần<br><span class="gtext">VUA Đóng Gói Việt Nam</span></h1>
      <p class="lp-hero-lead rv" data-d="2">Hơn 25 năm kinh nghiệm sản xuất bao bì công nghiệp — đồng hành cùng hàng nghìn doanh nghiệp Việt Nam vươn ra thế giới.</p>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<section class="pad" style="padding-top:48px;padding-bottom:20px">
  <div class="wrap">
    <div class="lp-stats-bar">
      <div class="lp-stat-card lp-stat-card--gold rv">
        <div class="lp-stat-num"><b data-c="25" data-s="+">0</b></div>
        <div class="lp-stat-label">Năm kinh nghiệm</div>
      </div>
      <div class="lp-stat-card rv" data-d="1">
        <div class="lp-stat-num"><b data-c="500" data-s="+">0</b></div>
        <div class="lp-stat-label">Khách hàng</div>
      </div>
      <div class="lp-stat-card rv" data-d="2">
        <div class="lp-stat-num"><b data-c="10" data-s="+">0</b></div>
        <div class="lp-stat-label">Quốc gia xuất khẩu</div>
      </div>
      <div class="lp-stat-card lp-stat-card--alt rv" data-d="3">
        <div class="lp-stat-num"><b data-c="500" data-s="+">0</b></div>
        <div class="lp-stat-label">Tấn sản phẩm/tháng</div>
      </div>
    </div>
  </div>
</section>

<!-- BODY CONTENT (editable in WP Admin) -->
<?php if ( get_the_content() ) : ?>
<section class="pad lp-section-alt" style="padding-top:40px">
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
    <h2>Sẵn sàng hợp tác với VUA?</h2>
    <p>Nhận tư vấn miễn phí và báo giá nhanh trong 24h cho đơn hàng của bạn.</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Liên hệ ngay</a>
      <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-line">Gọi <?php echo esc_html(vua_opt('phone')); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
