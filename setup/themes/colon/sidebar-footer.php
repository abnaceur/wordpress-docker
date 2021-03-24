<?php
/**
 *
 * @package colon
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$colon_widget_num = esc_html(get_theme_mod('colon_footer_widgets', '4'));

	if ($colon_widget_num == '3-wide') :
		$colon_col1 = 'col-md-3';
		$colon_col2 = 'col-md-3';
		$colon_col3 = 'col-md-6 align-right';
	elseif ($colon_widget_num == '4') :
		$colon_col1 = 'col-md-3';
		$colon_col2 = 'col-md-3';
		$colon_col3 = 'col-md-3';
		$colon_col4 = 'col-md-3';
	elseif ($colon_widget_num == '3') :
		$colon_col1 = 'col-md-4';
		$colon_col2 = 'col-md-4';
		$colon_col3 = 'col-md-4';
	elseif ($colon_widget_num == '2') :
		$colon_col1 = 'col-md-6';
		$colon_col2 = 'col-md-6';
	else :
		$colon_col1 = 'col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($colon_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($colon_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($colon_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($colon_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>