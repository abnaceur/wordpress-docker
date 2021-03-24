<?php
/**
 * Template part for displaying title and description.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

$header_textcolor = get_theme_mod('header_textcolor');
if ( is_front_page() ) : ?>

	<section class="container-header-title">
		<div class="header-name">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<div class="header-description">
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
	</section>
	
	<?php if ( get_header_image() ) : ?>
		<section class="header-custome-image">
			<?php the_custom_header_markup(); ?>
		</section>
	<?php endif; ?>
	
<?php endif; ?>