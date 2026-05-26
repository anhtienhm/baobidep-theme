<?php
/** Template Name: Tin tức */
get_header();
$u = get_template_directory_uri();
$paged = max(1, get_query_var('paged') ?: get_query_var('page'));
$q = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
));
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Tin tức</b></nav>
    <div class="shead rv" style="text-align:left;max-width:none">
      <span class="kick">Tin tức & Blog</span>
      <h1>Kiến thức ngành bao bì</h1>
      <p>Cập nhật tin tức ngành, kiến thức về vật liệu, xu hướng đóng gói và mẹo chọn bao bì phù hợp cho doanh nghiệp.</p>
    </div>
  </div>
</section>

<?php if ( get_the_content() ) : ?>
<section class="lp-intro pad" style="padding-bottom:0">
  <div class="wrap">
    <div class="lp-intro-body rv">
      <?php while ( have_posts() ) : the_post(); the_content(); endwhile; rewind_posts(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="sp-related pad" style="padding-top:24px">
  <div class="wrap">
    <?php if ( $q->have_posts() ) : ?>
      <div class="bgrid">
        <?php while ( $q->have_posts() ) : $q->the_post();
          $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $u . '/assets/img/products/p0.jpg';
        ?>
        <article class="bcard rv">
          <a class="bthumb" href="<?php the_permalink(); ?>"><img class="bimg" src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
          <div class="bcb">
            <span class="bdate"><?php echo esc_html(get_the_date('d.m.Y')); ?></span>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
            <a class="bmore" href="<?php the_permalink(); ?>">Đọc tiếp <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
          </div>
        </article>
        <?php endwhile; ?>
      </div>
      <?php
      $big = 999999999;
      echo paginate_links(array(
          'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format'  => '?paged=%#%',
          'current' => $paged,
          'total'   => $q->max_num_pages,
          'prev_text' => '← Trước',
          'next_text' => 'Tiếp →',
      ));
      wp_reset_postdata();
      ?>
    <?php else : ?>
      <div class="cart-empty">
        <h3>Chưa có bài viết</h3>
        <p>Bài viết mới sẽ được cập nhật trong thời gian sớm.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold">Về trang chủ</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
