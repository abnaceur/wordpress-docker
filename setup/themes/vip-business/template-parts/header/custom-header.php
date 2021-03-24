<?php
/**
 * Displays header site branding
 *
 * @package Vip_Business
 */

$vip_business_enable = vip_business_gtm( 'vip_business_header_image_visibility' );

if ( vip_business_display_section( $vip_business_enable ) ) : ?>
<div id="custom-header">
	<?php is_header_video_active() && has_header_video() ? the_custom_header_markup() : ''; ?>

	<div class="custom-header-content">
		<div class="container">
			<?php vip_business_header_title(); ?>
		</div> <!-- .container -->
	</div>  <!-- .custom-header-content -->
</div>
<?php
endif;
