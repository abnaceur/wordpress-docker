<?php
/**
 * The template for displaying the footer.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

	<?php everse_footer_before(); ?>

	<?php everse_footer(); ?>		
	
	<?php everse_footer_after(); ?>

	<?php everse_back_to_top(); ?>

	<?php everse_content_bottom(); ?>

	</div> <!-- #content -->

	<?php everse_content_after(); ?>

</div> <!-- .main-wrapper -->

<?php everse_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>