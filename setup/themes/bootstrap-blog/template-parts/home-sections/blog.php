<?php $sidebar_position = get_theme_mod( 'blog_post_layout', 'sidebar-right' ); ?>
<?php
$width_class = 'col-sm-12';
if ( $sidebar_position == 'no-sidebar' ) {
	$width_class = 'col-sm-12';
}
?>
<div class="container">
  <div class="row">
    <div class="<?php echo esc_attr( $width_class ); ?>">
			<?php get_template_part( 'template-parts/home-sections/slider', '' ); ?>
			<?php get_template_part( 'template-parts/home-sections/pages', '' ); ?>
			<?php get_template_part( 'template-parts/home-sections/archive', '' ); ?>
    </div>
  </div>
</div>
