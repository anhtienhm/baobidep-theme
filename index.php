<?php get_header(); ?>
<section class="pad"><div class="wrap" style="max-width:880px">
  <div class="shead rv" style="text-align:left"><span class="kick">Tin tức</span><h2 style="text-align:left">Kiến thức ngành bao bì</h2></div>
  <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <article style="border-bottom:1px solid var(--line);padding:18px 0 22px;margin-bottom:8px">
      <h2 style="text-transform:uppercase;font-size:1.4rem"><a href="<?php the_permalink(); ?>" style="color:var(--navy-deep)"><?php the_title(); ?></a></h2>
      <div style="color:var(--muted);font-size:.82rem;margin:6px 0 10px"><?php echo esc_html( get_the_date('d/m/Y') ); ?></div>
      <div style="color:#4a5269"><?php the_excerpt(); ?></div>
      <a href="<?php the_permalink(); ?>" class="btn btn-gold" style="margin-top:14px">Đọc tiếp</a>
    </article>
  <?php endwhile; the_posts_pagination(array('mid_size'=>1)); else: ?>
    <p>Chưa có bài viết nào.</p>
  <?php endif; ?>
</div></section>
<?php get_footer(); ?>
