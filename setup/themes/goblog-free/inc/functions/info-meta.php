<?php 
/**
 * Add information meta.
 *
 * @package Goblog Free
 * @subpackage Goblog Free 
 * @since Goblog Free 1.0
 */

 /**
 * Add meta property information for facebook and twitter on the single page.
 */
function goblog_free_meta_sosmed_single(){
    if ( is_single() ): ?>      
        <meta property="og:url" content="<?php the_permalink(); ?>">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php the_title(); ?>">
        <meta property="og:description" content="<?php echo esc_html(goblog_free_get_excerpt()); ?>">
        <meta property="og:image" content="<?php goblog_free_content_thumbnail_sosmed(); ?>">   

        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="<?php echo esc_html(goblog_free_get_excerpt()); ?>">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:image" content="<?php goblog_free_content_thumbnail_sosmed(); ?>">
    <?php endif;
} 
add_action( 'wp_head', 'goblog_free_meta_sosmed_single' ); 

/**
 * Add information meta description to front page.
 */
function goblog_free_description_meta_front(){
    if ( is_front_page() || is_home() ):
        $description = get_bloginfo( "description" ); ?>
        <meta name="description" content="<?php echo esc_html($description); ?>">    
    <?php endif;
} 
add_action( 'wp_head', 'goblog_free_description_meta_front' ); 

/**
 * Add information meta description to archive.
 */
function goblog_free_description_meta_archive(){
    if ( is_archive() ): 
        if ( ! empty( get_the_archive_description() ) ) {
            $content = get_the_archive_description(); ?>
            <meta name="description" content="<?php echo strip_tags($content); ?>"> 
        <?php 
        } elseif ( empty( get_the_archive_description() ) ) {
            $content = __('There is no description in the archive', 'goblog-free');
            ?>
            <meta name="description" content="<?php echo esc_html($content); ?>">
        <?php }  
    endif;
} 
add_action( 'wp_head', 'goblog_free_description_meta_archive' ); 

/**
 * Add information meta description to single.
 */
function goblog_free_description_meta_single(){
    if ( is_single() ):
        if ( ! empty( get_the_excerpt() ) ) {
            $content = substr( get_the_excerpt(), 0, 158);
        } elseif ( ! empty( get_the_content() ) ) {
            $content = substr( get_the_content(), 0, 158);
        } elseif ( empty( get_the_excerpt() ) && empty( get_the_content() ) ) {
            $content = __('There are no quotes and content', 'goblog-free');
        } ?>
        <meta name="description" content="<?php echo esc_html($content); ?>">
    <?php endif;     
}
add_action( 'wp_head', 'goblog_free_description_meta_single' );