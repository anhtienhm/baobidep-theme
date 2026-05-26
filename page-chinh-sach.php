<?php
/** Template Name: Chính sách */
get_header();
$policies = array(
    'chinh-sach-doi-tra'    => 'Chính sách đổi trả',
    'chinh-sach-bao-mat'    => 'Chính sách bảo mật',
    'chinh-sach-thanh-toan' => 'Chính sách thanh toán',
    'chinh-sach-khuyen-mai' => 'Chính sách khuyến mãi',
    'chinh-sach-van-chuyen' => 'Chính sách vận chuyển',
);
$current_slug = get_post_field('post_name', get_the_ID());
?>

<section class="lp-hero">
  <div class="lp-hero-bg"></div>
  <div class="wrap">
    <nav class="sp-crumbs rv lp-crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> <span>/</span> <span>Chính sách</span> <span>/</span> <b><?php the_title(); ?></b></nav>
    <div class="lp-hero-body">
      <span class="kick rv">Chính sách</span>
      <h1 class="rv" data-d="1"><?php the_title(); ?></h1>
      <p class="lp-hero-lead rv" data-d="2">Cam kết minh bạch và quyền lợi cao nhất cho khách hàng. Cập nhật mới nhất: <?php echo esc_html(get_the_modified_date('d/m/Y')); ?>.</p>
    </div>
  </div>
</section>

<section class="pad">
  <div class="wrap">
    <div class="policy-layout">
      <article class="policy-content rv">
        <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
      </article>

      <aside class="policy-aside">
        <div class="policy-aside-card rv">
          <h4>Các chính sách khác</h4>
          <ul class="policy-nav">
            <?php foreach ( $policies as $slug => $label ) :
              $active = ( $slug === $current_slug );
            ?>
              <li class="<?php echo $active ? 'active' : ''; ?>">
                <?php if ( $active ) : ?>
                  <span><?php echo esc_html($label); ?></span>
                <?php else : ?>
                  <a href="<?php echo esc_url(home_url('/'.$slug.'/')); ?>"><?php echo esc_html($label); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 6l6 6-6 6"/></svg></a>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="policy-aside-card policy-aside-contact rv" data-d="1">
          <div class="policy-contact-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg></div>
          <h4>Cần hỗ trợ?</h4>
          <p>Liên hệ để được tư vấn chi tiết về chính sách áp dụng cho đơn hàng của bạn.</p>
          <a href="tel:<?php echo esc_attr(vua_tel()); ?>" class="policy-aside-phone"><?php echo esc_html(vua_opt('phone')); ?></a>
          <a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="btn btn-gold">Gửi yêu cầu</a>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>
