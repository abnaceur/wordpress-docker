<?php
/**
 * Masonry grid post layout.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'everse_settings_blog_columns', 'col-lg-12' );
$image_size = ( 'col-lg-12' == $columns ) ? 'everse_featured_medium' : 'everse_featured_medium';
?>

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">

		<?php if ( get_theme_mod( 'everse_settings_meta_category_show', true ) ) : ?>
			<?php everse_meta_category(); ?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">',
			esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

		<?php if ( get_theme_mod( 'everse_settings_meta_date_show', true ) || get_theme_mod( 'everse_settings_meta_author_show', true ) || get_theme_mod( 'everse_settings_meta_comments_show', true ) ) : ?>
			
			<div class="entry__meta">

				<?php if ( get_theme_mod( 'everse_settings_meta_date_show', true ) ) : ?>
					<?php everse_meta_date(); ?>
				<?php endif; ?>		

				<?php if ( get_theme_mod( 'everse_settings_meta_author_show', true ) ) : ?>
					<?php everse_meta_author(); ?>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'everse_settings_meta_comments_show', true ) ) : ?>
					<?php echo everse_meta_comments(); ?>
				<?php endif; ?>

			</div>
			
		<?php endif; ?>
		
	</header>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Post thumb -->
		<figure class="entry__img-holder">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'entry__img' ) ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="entry__body">

		<?php if ( get_the_excerpt() ) : ?>
			<!-- Excerpt -->
			<div class="entry__excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<?php everse_read_more(); ?>

	</div> <!-- .entry__body -->

</article><!-- #post-## -->