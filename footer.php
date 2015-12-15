<?php
$force_address        = fcwp_get_field( 'force_address', true );
$force_suite_apt      = fcwp_get_field( 'force_suite_apt', true );
$force_city           = fcwp_get_field( 'force_city', true );
$force_state          = fcwp_get_field( 'force_state', true );
$force_zip_code       = fcwp_get_field( 'force_zip_code', true );
$force_phone_number   = fcwp_get_field( 'force_phone_number', true );
$force_footer_text    = fcwp_get_field( 'force_footer_text', true );
$force_facebook_link  = fcwp_get_field( 'force_facebook_link', true );
$force_instagram_link = fcwp_get_field( 'force_instagram_link', true );
$force_twitter_link   = fcwp_get_field( 'force_twitter_link', true );
$force_b_corp_link    = fcwp_get_field( 'force_b_corp_link', true );
?>
</main>
<footer class="footer" role="contentinfo">
  <div class="inner">
  	<div class="col__1-3 company__info">
      <p>
        <span class="uppercase text__white"><?php _e( 'An Initiative of', 'fcwp' ); ?></span><br />
        <span class="uppercase text__fc-yellow ">
          <a href="http://fulcrumcreatives.com"><?php _e( 'Fulcrum Creatives', 'fcwp' ); ?></a>
        </span>
      </p>
      <div class="footer__social text__fc-yellow ">
        <a href="<?php echo $force_facebook_link; ?>" class="font-icons"><span class="facebook"></span></a>
        <a href="<?php echo $force_instagram_link; ?>" class="font-icons"><span class="instagram"></span></a>
        <a href="<?php echo $force_twitter_link; ?>" class="font-icons"><span class="twitter"></span></a>
        <a href="<?php echo $force_b_corp_link; ?>" class="font-icons"><span class="bcorp"></span></a>
      </div>
      <div class="footer__address text__white" itemscope itemtype="http://schema.org/PostalAddress">
        <p>
           <a href="https://www.google.com/maps/place/243+N+5th+St+%23430,+Columbus,+OH+43215" target="_blank"/>
            <span itemprop="streetAddress"><?php echo $force_address; ?><br /><?php echo $force_suite_apt; ?></span>
            <span itemprop="addressLocality"><?php echo $force_city; ?></span><br />
            <span itemprop="addressRegion"><?php echo $force_state; ?></span>
            <span itemprop="postalCode"><?php echo $force_zip_code; ?></span>
          </a>
          <a href="tel:<?php echo $force_phone_number ;?>" aria-lable="Phone Number" itemprop="telephone">
            <?php echo $force_phone_number ;?>
          </a>
        </p>
        <p>
          <span itemprop="name">&copy; <?php echo date('Y'); ?> Fulcrum Creatives</span>
        </p>
      </div>
    </div>
    <div class="col__1-3 company__caption text__white">
      <?php echo $force_footer_text; ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>