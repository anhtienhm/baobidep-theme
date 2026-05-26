<?php get_header(); ?>
<section class="pad"><div class="wrap" style="max-width:820px">
  <?php while ( have_posts() ): the_post(); ?>
    <article>
      <h1 style="text-transform:uppercase;color:var(--navy-deep);font-size:2rem"><?php the_title(); ?></h1>
      <div style="color:var(--muted);font-size:.84rem;margin:10px 0 20px"><?php echo esc_html( get_the_date('d/m/Y') ); ?></div>
      <?php if ( has_post_thumbnail() ): ?><div style="border-radius:14px;overflow:hidden;margin-bottom:22px"><?php the_post_thumbnail('large', array('style'=>'width:100%;height:auto;display:block')); ?></div><?php endif; ?>
      <div class="vua-content" style="line-height:1.8"><?php the_content(); ?></div>
    </article>
  <?php endwhile; ?>
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-line" style="margin-top:24px;border-color:var(--line);color:var(--navy)">← Về trang chủ</a>
</div></section>
<?php get_footer(); ?>
