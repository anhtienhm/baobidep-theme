<?php get_header(); ?>
<section class="pad"><div class="wrap" style="max-width:860px">
  <?php while ( have_posts() ): the_post(); ?>
    <h1 style="text-transform:uppercase;color:var(--navy-deep);font-size:2rem;margin-bottom:18px"><?php the_title(); ?></h1>
    <div class="vua-content" style="line-height:1.8"><?php the_content(); ?></div>
  <?php endwhile; ?>
</div></section>
<?php get_footer(); ?>
