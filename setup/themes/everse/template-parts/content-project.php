<?php
/**
 * The template for displaying Project archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'everse_settings_project_columns', 'col-lg-4' );
$custom_URL = ( ! empty( get_post_meta( get_the_ID(), '_everse_project_custom_url', true ) ) ) ? get_post_meta( get_the_ID(), '_everse_project_custom_url', true ) : get_the_permalink();
$image_size = ( 'col-lg-12' == $columns ) ? 'everse_featured_large' : 'everse_featured_medium';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'project__entry' ); ?> itemscope="itemscope" itemtype="https://schema.org/Article">

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__img-holder project__img-holder hover-shine">
			<a href="<?php echo esc_url( $custom_URL ); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'entry__img project__img' ) ); ?>
			</a>
		</figure>						
	<?php endif; ?>

	<div class="project__body">

		<div class="entry__categories project__categories">
			<?php $terms = get_the_terms( get_the_ID(), 'projects_categories' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					echo '<a href="' . esc_url( get_category_link( $term->term_id ) ) . '" class="project__category entry-category">' . esc_html( $term->name ) . '</a>';
				}
			} ?>
		</div>
		
		<?php the_title( sprintf( '<h3 class="entry__title project__title"><a href="%s">',
			esc_url( $custom_URL ) ),
			'</a></h3>'
		); ?>		

		<a href="<?php echo esc_url( $custom_URL ); ?>" class="read-more project__read-more">
			<span class="project__read-more-text"><?php echo esc_html__( 'View Project', 'everse' ); ?></span>
		</a>

	</div> <!-- .project__body -->

</article>