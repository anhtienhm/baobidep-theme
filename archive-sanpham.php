<?php
/** Archive: sanpham — list tat ca san pham */
get_header();
?>

<section class="sp-hero pad" style="padding-bottom:24px">
  <div class="wrap">
    <nav class="sp-crumbs rv"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <b>Sản phẩm</b></nav>
    <div class="shead rv" style="text-align:left;max-width:none">
      <span class="kick">Catalogue đầy đủ</span>
      <h1>Tất cả sản phẩm</h1>
      <p>Khám phá danh mục sản phẩm bao bì của VUA Bao Bì — đa dạng quy cách, giá tốt, sẵn hàng giao toàn quốc.</p>
    </div>

    <?php
    $cats = get_terms(array(
        'taxonomy'   => 'sanpham_cat',
        'hide_empty' => false,
        'orderby'    => 'menu_order',
    ));
    if ( ! empty($cats) && ! is_wp_error($cats) ) : ?>
    <div class="sp-filter rv" id="spFilter">
      <button type="button" class="sp-filter-pill active" data-slug="all">Tất cả</button>
      <?php foreach ( $cats as $cat ) : ?>
        <button type="button" class="sp-filter-pill" data-slug="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="sp-related pad" style="padding-top:24px">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <div class="pgrid" id="productGrid">
        <?php while ( have_posts() ) : the_post();
          $rimg  = vua_product_image();
          $price = (float) get_post_meta(get_the_ID(), '_vua_price', true);
          $terms = get_the_terms(get_the_ID(), 'sanpham_cat');
          $cat_name = ( $terms && ! is_wp_error($terms) ) ? $terms[0]->name : '';
        ?>
        <article class="pcard rv">
          <a class="pb" href="<?php the_permalink(); ?>"><img class="pimg" src="<?php echo esc_url($rimg); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
          <div class="pcb">
            <?php if ( $cat_name ) : ?><span class="pcard-cat"><?php echo esc_html($cat_name); ?></span><?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
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
      the_posts_pagination(array(
          'prev_text' => '← Trước',
          'next_text' => 'Tiếp →',
          'class'     => 'sp-pagination',
      ));
      ?>
    <?php else : ?>
      <div class="cart-empty">
        <h3>Chưa có sản phẩm</h3>
        <p>Sản phẩm sẽ được cập nhật trong thời gian sớm.</p>
        <a href="<?php echo esc_url(home_url('/#quote')); ?>" class="btn btn-gold">Nhận báo giá</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
