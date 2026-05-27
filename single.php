<?php
/** Single post (blog article) */
get_header();
$u = get_template_directory_uri();
while ( have_posts() ) : the_post();
$thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $u . '/assets/img/products/p0.jpg';
?>

<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <a href="<?php echo esc_url(home_url('/tin-tuc/')); ?>">Tin tức</a> <span>/</span> <b><?php the_title(); ?></b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Bài viết</span>
      <h1 class="rv" data-d="1"><?php the_title(); ?></h1>
      <p class="lp-hero-lead rv" data-d="2"><span class="post-meta-date"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;display:inline-block;vertical-align:-2px;margin-right:6px"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg><?php echo esc_html(get_the_date('d/m/Y')); ?></span></p>
    </div>
  </div>
</section>

<section class="pad lp-section-alt" style="padding-top:40px">
  <div class="wrap">
    <article class="lp-body rv">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumb"><img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>"></div>
      <?php endif; ?>
      <?php the_content(); ?>
    </article>
  </div>
</section>

<?php
$related = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'rand',
));
if ( $related->have_posts() ) : ?>
<section class="sp-related pad">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Bài viết khác</span><h2>Có thể bạn quan tâm</h2></div>
    <div class="bgrid">
      <?php while ( $related->have_posts() ) : $related->the_post();
        $rthumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $u . '/assets/img/products/p0.jpg';
      ?>
      <article class="bcard rv">
        <a class="bthumb" href="<?php the_permalink(); ?>"><img class="bimg" src="<?php echo esc_url($rthumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
        <div class="bcb">
          <span class="bdate"><?php echo esc_html(get_the_date('d.m.Y')); ?></span>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="lp-cta-banner">
  <div class="wrap">
    <h2>Cần tư vấn về bao bì?</h2>
    <p>VUA Bao Bì sẵn sàng hỗ trợ — phản hồi trong 30 phút (giờ hành chính).</p>
    <div class="lp-cta-row">
      <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Liên hệ ngay</a>
      <a href="<?php echo esc_url(home_url('/tin-tuc/')); ?>" class="btn btn-line">Xem bài viết khác</a>
    </div>
  </div>
</section>

<?php endwhile; get_footer(); ?>
