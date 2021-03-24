<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Smallbiz Startup
 */
?>
<div id="footer">
	<div class="container">
    <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
    <?php endif; // end footer widget area ?>
              
    <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
    <?php endif; // end footer widget area ?>
  
    <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
    <?php endif; // end footer widget area ?>
    
    <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
    <?php endif; // end footer widget area ?>
    <div class="clear"></div>
  </div>
  <div class="copywrap text-center">
  	<div class="container">
      <a href="<?php echo esc_url(SMALLBIZ_STARTUP_FOOTER_LINK); ?>" target="_blank"><?php echo esc_html(get_theme_mod('smallbiz_startup_copyright_line',__('Startup WordPress Theme','smallbiz-startup'))); ?></a>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>