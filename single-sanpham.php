<?php
/** Single template: Sản phẩm */
get_header();
$u = get_template_directory_uri();
while ( have_posts() ) : the_post();
$img = vua_product_image();
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <a href="<?php echo esc_url(get_post_type_archive_link('sanpham')); ?>">Sản phẩm</a> <span>/</span> <b><?php the_title(); ?></b></nav>
    <div class="sp-head">
      <div class="sp-img rv">
        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
      </div>
      <div class="sp-meta rv" data-d="1">
        <span class="kick">Sản phẩm chính</span>
        <h1><?php the_title(); ?></h1>
        <p class="lead"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php $price = (float) get_post_meta(get_the_ID(), '_vua_price', true); ?>
        <div class="sp-price"><?php echo $price > 0 ? esc_html(vua_format_price($price)) : '<em>Liên hệ báo giá</em>'; ?></div>
        <div class="sp-buy">
          <div class="qty-wrap">
            <button type="button" class="qty-dec" aria-label="Giảm">−</button>
            <input type="number" class="qty-input" id="spQty" value="1" min="1" max="999" inputmode="numeric">
            <button type="button" class="qty-inc" aria-label="Tăng">+</button>
          </div>
          <button type="button" class="btn btn-gold add-to-cart" data-id="<?php echo intval(get_the_ID()); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>Thêm vào giỏ</button>
        </div>
        <div class="sp-cta">
          <a href="<?php echo esc_url(home_url('/#quote')); ?>" class="btn btn-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/></svg>Nhận báo giá</a>
          <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-call"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg><?php echo esc_html(vua_opt('phone')); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sp-body pad">
  <div class="wrap">
    <div class="sp-content rv"><?php the_content(); ?></div>
  </div>
</section>

<?php
$related = new WP_Query(array(
    'post_type'      => 'sanpham',
    'posts_per_page' => 4,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'rand',
));
if ( $related->have_posts() ) : ?>
<section class="sp-related pad">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Có thể bạn quan tâm</span><h2>Sản phẩm liên quan</h2></div>
    <div class="pgrid">
      <?php while ( $related->have_posts() ) : $related->the_post(); $rimg = vua_product_image(); ?>
      <article class="pcard rv">
        <div class="pb"><img class="pimg" src="<?php echo esc_url($rimg); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></div>
        <div class="pcb">
          <h3><?php the_title(); ?></h3>
          <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
          <a href="<?php the_permalink(); ?>">Xem chi tiết <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php endwhile; get_footer(); ?>
