<?php
/**
 * The template for displaying Service archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'everse_settings_service_columns', 'col-lg-4' );
$custom_URL = ( ! empty( get_post_meta( get_the_ID(), '_everse_service_custom_url', true ) ) ) ? get_post_meta( get_the_ID(), '_everse_service_custom_url', true ) : get_the_permalink();
$image_size = ( 'col-lg-12' == $columns ) ? 'everse_featured_medium' : 'everse_featured_medium';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'service' ); ?> itemtype="https://schema.org/Article" itemscope="itemscope">

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__img-holder service__img-holder hover-shine">
			<a href="<?php echo esc_url( $custom_URL ); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'entry__img service__img' ) ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="service__wrapper card">
		<div class="service__content">

			<?php the_title( sprintf( '<h3 class="service__title"><a href="%s">',
			esc_url( $custom_URL ) ),
			'</a></h3>' ); ?>

			<?php if ( get_the_excerpt() ) : ?>
				<!-- Excerpt -->
				<div class="service__text">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="service__footer card__footer">

			<a href="<?php echo esc_url( $custom_URL ); ?>" class="read-more service__read-more">
				<span class="service__read-more-text"><?php echo esc_html__( 'View Service', 'everse' ); ?></span>
			</a>

		</div>
	</div>	

</article><!-- #post-## -->