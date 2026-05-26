<?php
/** Taxonomy archive: sanpham_cat — list san pham con cua danh muc */
get_header();
$term = get_queried_object();
$cat_img = vua_category_image($term->term_id);
?>

<section class="sp-hero pad">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <a href="<?php echo esc_url(home_url('/#products')); ?>">Danh mục sản phẩm</a> <span>/</span> <b><?php echo esc_html($term->name); ?></b></nav>
    <div class="sp-head">
      <div class="sp-img rv">
        <img src="<?php echo esc_url($cat_img); ?>" alt="<?php echo esc_attr($term->name); ?>" loading="lazy">
      </div>
      <div class="sp-meta rv" data-d="1">
        <span class="kick">Danh mục sản phẩm</span>
        <h1><?php echo esc_html($term->name); ?></h1>
        <?php if ( ! empty($term->description) ) : ?>
          <p class="lead"><?php echo esc_html(wp_strip_all_tags(wp_trim_words($term->description, 40))); ?></p>
        <?php endif; ?>
        <div class="sp-cta">
          <a href="<?php echo esc_url(home_url('/#quote')); ?>" class="btn btn-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/></svg>Nhận báo giá</a>
          <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="btn btn-call"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg><?php echo esc_html(vua_opt('phone')); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sp-related pad">
  <div class="wrap">
    <div class="shead rv"><span class="kick">Sản phẩm trong danh mục</span><h2>Các sản phẩm <?php echo esc_html($term->name); ?></h2></div>

    <?php if ( have_posts() ) : ?>
      <div class="pgrid">
        <?php while ( have_posts() ) : the_post();
          $rimg  = vua_product_image();
          $price = (float) get_post_meta(get_the_ID(), '_vua_price', true);
        ?>
        <article class="pcard rv">
          <a class="pb" href="<?php the_permalink(); ?>"><img class="pimg" src="<?php echo esc_url($rimg); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
          <div class="pcb">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
            <div class="pcard-foot">
              <div class="pcard-price"><?php echo $price > 0 ? esc_html(vua_format_price($price)) : '<em>Liên hệ</em>'; ?></div>
              <?php if ( $price > 0 ) : ?>
                <button type="button" class="pcard-add add-to-cart" data-id="<?php echo intval(get_the_ID()); ?>" aria-label="Thêm vào giỏ"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></button>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <?php endwhile; ?>
      </div>
      <?php
      // Pagination
      the_posts_pagination(array(
          'prev_text' => '← Trước',
          'next_text' => 'Tiếp →',
          'class'     => 'sp-pagination',
      ));
      ?>
    <?php else : ?>
      <div class="cart-empty">
        <h3>Chưa có sản phẩm</h3>
        <p>Danh mục này hiện chưa có sản phẩm. Vui lòng quay lại sau hoặc liên hệ để được tư vấn.</p>
        <a href="<?php echo esc_url(home_url('/#quote')); ?>" class="btn btn-gold">Nhận báo giá</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
