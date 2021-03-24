<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colon
 */
?>

    <?php $cb_values= explode(",",esc_html(get_theme_mod( 'colon_blog_post_meta_pill_checkbox','author,date,comments,readmore,image' ))) ; ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog" >
        <div class="blog-post">
            <div class="row">
                <?php
                    if ( has_post_thumbnail() && in_array("image", $cb_values) ) : 
                        ?>
                             <div class="col-md-5">
                                <div class="image">
                                    <?php
                                        the_post_thumbnail('full',array( 'itemprop' => 'image' ));
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                        <?php
                    else:
                        ?>
                            <div class="col-md-12">
                        <?php
                    endif;
                ?>
                
                    <div class="content">
                        <h2 class="entry-title" itemprop="headline">
                            <?php
                                if ( is_sticky() && is_home() ) :
                                    echo "<i class='la la-thumbtack'></i>";
                                endif;
                            ?>
                            <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                        <div class="meta">
                            <ul class="meta-list">
                                <?php
                                    if(in_array("author", $cb_values)) :
                                        ?>
                                            <li class="author-meta">
                                                <span class="author-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path fill="#626262" d="M8 0C2.4 0 5.1 7.3 5.1 7.3c.6 1 1.4.8 1.4 1.5c0 .6-.7.8-1.4.9C4 9.7 3 9.5 2 11.3c-.6 1.1-.9 4.7-.9 4.7h13.7s-.3-3.6-.8-4.7c-1-1.9-2-1.6-3.1-1.7c-.7-.1-1.4-.3-1.4-.9s.8-.4 1.4-1.5C10.9 7.3 13.6 0 8 0z"/><rect x="0" y="0" width="16" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
                                                </span>
                                                <span class="byline" itemprop="author" itemscope="" itemtype="https://schema.org/Person"> 
                                                    <span itemprop="name"><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" itemprop="url"><?php the_author() ?></a></span>
                                                </span>
                                            </li>
                                        <?php
                                    endif;
                                    if(in_array("date", $cb_values)) :
                                        ?>
                                            <li class="date-meta">
                                                <span class="post-day-icon">
                                                    <span class="post-day-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path fill="#626262" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8s8-3.6 8-8s-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6s6 2.7 6 6s-2.7 6-6 6z"/><path fill="#626262" d="M8 3H7v6h5V8H8z"/><rect x="0" y="0" width="16" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
                                                </span>
                                                <?php colon_posted_on(); ?>
                                            </li>
                                        <?php
                                    endif;
                                    if(in_array("comments", $cb_values)) :
                                        ?>
                                            <li class="comments-meta">
                                                <span class="comments-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path fill="#626262" d="M14.2 14c.6-.5 1.8-1.6 1.8-3.2c0-1.4-1.2-2.6-2.8-3.3c.5-.6.8-1.5.8-2.4C14 2.3 11.1 0 7.4 0C3.9 0 0 2.1 0 5.1c0 2.1 1.6 3.6 2.3 4.2c-.1 1.2-.6 1.7-.6 1.7L.5 12H2c1.2 0 2.2-.3 3-.7c.3 1.9 2.5 3.4 5.3 3.4h.5c.6.5 1.8 1.3 3.5 1.3h1.4l-1.1-.9s-.3-.3-.4-1.1zm-3.9-.3C8 13.7 6 12.4 6 10.9v-.2c.2-.2.4-.3.5-.5h.7c2.1 0 4-.7 5.2-1.9c1.5.5 2.6 1.5 2.6 2.5s-.9 2-1.7 2.5l-.3.2v.3c0 .5.2.8.3 1.1c-1-.2-1.7-.7-1.9-1l-.1-.2h-1zM7.4 1C10.5 1 13 2.9 13 5.1s-2.6 4.1-5.8 4.1H6.1l-.1.2c-.3.4-1.5 1.2-3.1 1.5c.1-.4.1-1 .1-1.8v-.3C2 8 .9 6.6.9 5.2C.9 3 4.1 1 7.4 1z"/><rect x="0" y="0" width="16" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
                                                </span>
                                                <span itemprop="commentCount"><a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?> <?php esc_html_e('Comments','colon'); ?></a></span>
                                            </li>
                                        <?php
                                    endif;
                                ?>
                            </ul>
                        </div>
                        <div class="blog-excerpt">
                            <div class="entry-content" itemprop="text">
                                <?php the_excerpt(); ?>
                            </div>
                            <?php
                                if(in_array("readmore", $cb_values)) :
                                    ?>
                                        <div class="read-more">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('READ MORE','colon'); ?></a>
                                        </div>
                                    <?php
                                endif;
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </article>
    