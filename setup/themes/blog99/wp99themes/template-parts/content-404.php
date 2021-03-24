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

<section class="error-404 not-found">
    <header class="page-header">
    	<h2 class="error404"><?php esc_html_e('404','blog99'); ?></h2>
        <h2 class="page-title"><?php echo  esc_html__( 'Oops! That page can&rsquo;t be found.', 'blog99' ); ?></h2>
    </header><!-- .page-header -->

    <div class="page-content">
        <p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blog99' ); ?></p>
    </div><!-- .page-content -->

    <div class="btns text-center blog99-readmore-buttom">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span><?php esc_html_e('Back To Home','blog99'); ?></span>
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>
		</a>
	</div><!-- .page-content -->

</section><!-- .error-404 -->