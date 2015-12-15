<?php
/*
Template Name: Home
*/
get_header();
?>
<?php 
$force_home_header_main          = fcwp_get_field( 'force_home_header_main' );
$force_home_sub_header_main      = fcwp_get_field( 'force_home_sub_header_main' );
$force_home_into                 = fcwp_get_field( 'force_home_into' );
$force_home_intern_app_link_text = fcwp_get_field( 'force_home_intern_app_link_text' );
$force_home_intern_app_link      = fcwp_get_field( 'force_home_intern_app_link' );
$force_home_client_app_link_text = fcwp_get_field( 'force_home_client_app_link_text' );
$force_home_client_app_link      = fcwp_get_field( 'force_home_client_app_link' );
$force_home_header_intern        = fcwp_get_field( 'force_home_header_intern' );
$force_home_sub_header_intern    = fcwp_get_field( 'force_home_sub_header_intern' );
$force_home_internship_copy      = fcwp_get_field( 'force_home_internship_copy' );
$froce_home_intern_breaker_text  = fcwp_get_field( 'froce_home_intern_breaker_text' );
$force_home_header_client        = fcwp_get_field( 'force_home_header_client' );
$force_home_sub_header_client    = fcwp_get_field( 'force_home_sub_header_client' );
$force_home_client_copy          = fcwp_get_field( 'force_home_client_copy' );
$froce_home_client_breaker_text  = fcwp_get_field( 'froce_home_client_breaker_text' );
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
    
    <div class="content__wrapper">
      <div class="heading__bg-main">
        <h1 class="entry__title header__bg" id="section-heading-<?php the_ID(); ?>">
          <img src="<?php echo $force_home_header_main['url']; ?>" alt="<?php echo $force_home_header_main['alt']; ?>" />
        </h1>
      </div>
      <div class="content__wrapper">
        <h2 class="entry__title-sub uppercase avenir-demi-italic">
          <?php echo $force_home_sub_header_main ?>
        </h2>
        <div class="inner entry__body">
          <?php echo $force_home_into; ?>
        </div>
      </div>
    </div>

    <div class="divider avenir-bold">
      <a href="#client" class="bg__green">
        <?php echo $force_home_client_app_link_text; ?>
      </a>
    </div>

    <div class="divider avenir-bold">
      <a href="#intern" class="bg__yellow">
        <?php echo $force_home_intern_app_link_text; ?>
      </a>
    </div>

    <div id="client" class="wrapper__client">
      <div class="heading__bg-main">
        <h1 class="entry__title header__bg" id="section-heading-<?php the_ID(); ?>">
          <img src="<?php echo $force_home_header_client['url']; ?>" alt="<?php echo $force_home_header_client['alt']; ?>" />
        </h1>
      </div>
      <div class="content__wrapper">
        <!-- <h2 class="entry__title-sub uppercase avenir-demi-italic">
          <?php echo $force_home_sub_header_client ?>
        </h2> -->
        <div class="inner entry__body">
          <?php echo $force_home_client_copy; ?>
        </div>
      </div>
      <div class="divider avenir-bold">
        <a href="<?php echo $force_home_client_app_link; ?>" class="bg__grey">
          <?php echo $froce_home_client_breaker_text; ?>
        </a>
      </div>
    </div>

    <div id="intern" class="wrapper__intern">
      <div class="heading__bg-main">
        <h1 class="entry__title header__bg" id="section-heading-<?php the_ID(); ?>">
          <img src="<?php echo $force_home_header_intern['url']; ?>" alt="<?php echo $force_home_header_intern['alt']; ?>" />
        </h1>
      </div>
      <div class="content__wrapper">
        <!-- <h2 class="entry__title-sub uppercase avenir-demi-italic">
          <?php echo $force_home_sub_header_intern ?>
        </h2> -->
        <div class="inner entry__body">
          <?php echo $force_home_internship_copy; ?>
        </div>
      </div>
      <div class="divider avenir-bold">
        <a href="<?php echo $force_home_intern_app_link; ?>" class="bg__grey">
          <?php echo $froce_home_intern_breaker_text; ?>
        </a>
      </div>
    </div>

  </article>
<?php get_footer(); ?>