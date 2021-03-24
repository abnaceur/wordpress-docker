<?php
/**
 * @package colon
 */

get_header();

?>
<div class="page-title">
    <?php colon_before_title_content(); ?>
    <?php colon_after_title_content(); ?>
</div>
<div class="woo-wrapper">
	<div id="primary" class="content-area">
	    <main id="main" class="site-main colon-main" role="main">
	    	<div class="container">
	    		<div class="page-content-area">
			        <?php
			            get_template_part( 'template-parts/shop/content', 'woocommerce' );           
			        ?>
		    	</div>
		    </div>
	    </main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
	get_footer();
?>