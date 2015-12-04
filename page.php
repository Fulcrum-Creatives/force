<?php get_header(); ?>
<div class="inner">
  <section id="page-id-<?php the_ID(); ?>" <?php post_class('content__wrapper'); ?> aria-labelledby="page-heading-<?php the_ID(); ?>">
    <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; 
    wp_reset_postdata();
    ?>
  </section>
</div>
<?php get_footer(); ?>