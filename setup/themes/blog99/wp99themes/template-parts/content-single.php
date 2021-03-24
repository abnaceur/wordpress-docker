<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       blog99 1.0.0
 * */

blog99_entry_before(); ?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope"  id="post-<?php the_ID(); ?>" <?php post_class('  wow fadeInUp '); ?>>
	<?php blog99_entry_top(); ?>
		
		<?php if(get_theme_mod('blog99_single_page_layout','blog99-single-one') != 'blog99-single-two'){ ?>

			<div class="blog99-main-slider1">
				<div class="item">
				    <div class="blog99-theme-thumbnail">
				        <?php  blog99_get_post_thumbnail(); ?>
				    </div>
				    
				    <div class="blog99-article-content p-lg-4 p-md-4 p-2">
				        
				        <?php if( get_theme_mod('blog99_single_meta_disable',true) == true  ): ?>
				            <div class="blog99-category-list">
				                <?php the_category();?>
				            </div>
				        <?php endif; ?><!--end blog99 category -->

				        <div class="blog99-title">
				            <h2 class="blog99-title-heading">
				                <a><?php the_title(); ?></a>
				            </h2>
				        </div>

				        <?php if( get_theme_mod('blog99_single_meta_disable',true) == true ): ?>
				            <div class="row">
				                <div class="blog99-metabox col-md-8 col-lg-9 col-12 align-self-center">
				                    <ul class="blog99-meta-file-wrapper">
				                        <li>
				                            <i class="fa fa-clock-o" aria-hidden="true"></i>
				                            <?php echo esc_html(get_the_date()); ?>
				                        </li>
				                        <?php
				                            $query_post = get_post(get_the_ID());
				                            $num = $query_post->comment_count;
				                                if( $num == 0 || $num > 1 ) : $num = $num.' Comment'; // change the plural for your language
				                                else : $num = $num.' Comments'; // change the singular for your language
				                                endif;
				                            $permalink = get_permalink(get_the_ID());
				                        ?>
				                        <?php if( $num ): ?>
				                            <li class="blog99-item-meta-item">
				                                <a href="<?php echo esc_url($permalink . '#comments'); ?>">
				                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
				                                    <span><?php echo esc_html( $num ); ?></span>
				                                </a>
				                            </li>
				                        <?php endif; ?><!-- end blog99 comment section -->
				                    </ul>
				                </div>
				            </div>
				        <?php endif; ?>
				    </div>
				</div>
			</div>

		<?php } ?>

		<div class="entry-content">

			<?php blog99_entry_content_before(); ?>

			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog99' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			
			?>
			<?php blog99_entry_content_after(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog99' ),
					'after'  => '</div>',
				) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php blog99_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php 
			the_post_navigation(array(
				'prev_text'  => wp_kses_post( '<span>'.esc_html__('Previous article','blog99').'</span> %title','blog99' ),
				'next_text'  => wp_kses_post( '<span>'.esc_html__('Next article','blog99').'</span> %title','blog99' ),
			));
		?>
	<?php blog99_entry_bottom(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php blog99_entry_after(); ?>