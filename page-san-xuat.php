<?php
/** Template Name: Sản xuất */
get_header();
?>

<!-- HERO -->
<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Sản xuất</b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Năng lực sản xuất</span>
      <h1 class="rv" data-d="1">Nhà máy sản xuất<br><span class="gtext">bao bì VUA</span></h1>
      <p class="lp-hero-lead rv" data-d="2">Hệ thống nhà xưởng hiện đại, dây chuyền tự động hóa cao — đảm bảo chất lượng và sản lượng cho mọi đơn hàng lớn nhỏ.</p>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<section class="pad" style="padding-top:48px;padding-bottom:20px">
  <div class="wrap">
    <div class="lp-stats-bar">
      <div class="lp-stat-card lp-stat-card--gold rv">
        <div class="lp-stat-num"><b>5.000<small>m²</small></b></div>
        <div class="lp-stat-label">Diện tích nhà máy</div>
      </div>
      <div class="lp-stat-card rv" data-d="1">
        <div class="lp-stat-num"><b data-c="500" data-s="">0</b></div>
        <div class="lp-stat-label">Tấn / tháng</div>
      </div>
      <div class="lp-stat-card rv" data-d="2">
        <div class="lp-stat-num"><b data-c="100" data-s="%">0</b></div>
        <div class="lp-stat-label">Kiểm phẩm thành phẩm</div>
      </div>
      <div class="lp-stat-card lp-stat-card--alt rv" data-d="3">
        <div class="lp-stat-num"><b>ISO</b></div>
        <div class="lp-stat-label">9001:2015 Certified</div>
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
    <h2>Tham quan nhà máy của chúng tôi</h2>
    <p>Liên hệ đặt lịch tham quan để chứng kiến quy trình sản xuất chuyên nghiệp.</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Đặt lịch tham quan</a>
      <a href="<?php echo esc_url(home_url('/quy-trinh/')); ?>" class="btn btn-line">Xem quy trình đặt hàng</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
