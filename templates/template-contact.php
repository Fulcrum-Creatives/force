<?php
/*
Template Name: Contact
*/
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
  $force_forms_heading          = fcwp_get_field( 'force_forms_heading' );
  $force_forms_sub_heading      = fcwp_get_field( 'force_forms_sub_heading' );
  ?>
  <div class="content__wrapper">
    <div class="heading__bg-main">
      <h1 class="entry__title header__bg" id="section-heading-<?php the_ID(); ?>">
        <img src="<?php echo $force_forms_heading['url']; ?>" alt="<?php echo $force_forms_heading['alt']; ?>" />
      </h1>
    </div>
    <h2 class="entry__title-sub uppercase avenir-demi-italic">
      <?php echo $force_forms_sub_heading ?>
    </h2>
  </div>
  <div class="entry__body forms">
    <?php the_content(); ?>
  </div>
  <?php 
endwhile; endif; wp_reset_postdata();
get_footer(); ?>