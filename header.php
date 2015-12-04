<?php get_template_part( 'template-parts/head' ); ?>
<header class="header" role="banner">
	<div class="content__wrapper">
    <div class="header__logo">
      <a href="<?php echo home_url(); ?>">
        <?php 
        $force_white_logo      = fcwp_get_field( 'force_white_logo', true );
        $force_white_logo_svg  = fcwp_get_field( 'force_white_logo_svg', true );
        $force_green_logo      = fcwp_get_field( 'force_green_logo', true );
        $force_green_logo_svg  = fcwp_get_field( 'force_green_logo_svg', true );
        $force_yellow_logo     = fcwp_get_field( 'force_yellow_logo', true );
        $force_yellow_logo_svg = fcwp_get_field( 'force_yellow_logo_svg', true );
        if( is_page( 'client' ) ) {
          $logo_paths = array(
            'image'  => $force_green_logo['sizes']['logo'],
            'retina' => $force_green_logo['sizes']['logo@2'],
            'svg'    => $force_green_logo_svg['url']
          );
          fcwp_svg( $logo_paths, $force_green_logo['alt'], 'logo', 'svg logo__svg logo__green' );
        } elseif( is_page( 'internship' ) ) {
          $logo_paths = array(
            'image'  => $force_yellow_logo['sizes']['logo'],
            'retina' => $force_yellow_logo['sizes']['logo@2'],
            'svg'    => $force_yellow_logo_svg['url']
          );
          fcwp_svg( $logo_paths, $force_yellow_logo['alt'], 'logo', 'svg logo__svg logo__yellow' );
        } else {
          $logo_paths = array(
            'image'  => $force_white_logo['sizes']['logo'],
            'retina' => $force_white_logo['sizes']['logo@2'],
            'svg'    => $force_white_logo_svg['url']
          );
          
          fcwp_svg( $logo_paths, $force_white_logo['alt'], 'logo', 'svg logo__svg logo__white' );
        }
        ?>
      </a>
    </div>
	</div>
</header>
<?php
$color = '';
$form_bg = '';
if( is_page( 'client' ) ) {
  $color = '#7dc6b4';
} elseif( is_page( 'internship' ) ) {
  $color = '#f5aa40';
} elseif( is_page( 'contact' ) ) {
  $color = '#333132';
} else {
  $color = '#fff';
}
?>
<main id="main" class="main" style="background-color:<?php echo $color; ?>"role="main">