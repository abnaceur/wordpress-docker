<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Buzz_Magazine
 */

get_header();
?>
    <div class="container">

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="post-item-wrapper">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'buzz-magazine' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'buzz-magazine' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

            if (get_theme_mod('toggle_related_posts',true) == true) :
                get_template_part( 'template-parts/content', 'related-posts' );
            endif;


        endwhile; // End of the loop.
		?>
            </div>
        </main>
    </div>
        <?php get_sidebar()?>
    </div>

<?php
get_footer();
