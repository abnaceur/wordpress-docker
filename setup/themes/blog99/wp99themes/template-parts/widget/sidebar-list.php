<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
?>
 <div class="right-bottom-single-section clearfix">
    <div class="row">
        <?php if( has_post_thumbnail() ): ?>
            <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                <div class="right-bottom-image">
                    <?php blog99_get_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-7 blog99-margin-none">
        <?php else: ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 blog99-margin-none">
        <?php endif; ?>
            <div class="image-details">
                <div class="blog99-date-time-metabox ">
                    <?php get_blog99_post_timedate(); ?>
                </div>
                <div class="title-sec">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
            </div>	
        </div>
    </div>
</div>