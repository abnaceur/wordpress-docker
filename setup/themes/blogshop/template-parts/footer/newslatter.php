<?php
/**
 * blogshop News Letter three
 */

?>

 <div class="newsletter-three">
	 <div class="container">
		 <div class="row">
			 <div class="col-md-12 text-center">
				 <div class="news-letter-three-content">
					 <h2><?php echo esc_html( get_theme_mod( 'newsletter_title' ) ); ?></h2>
					 <div class="three-news-letter-form">
						 <?php echo do_shortcode( get_theme_mod( 'form_shortcode' ) ); ?>
					 </div>
				 </div>
			 </div>
		 </div>
	 </div>
 </div>
