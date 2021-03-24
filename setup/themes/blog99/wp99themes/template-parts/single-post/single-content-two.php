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