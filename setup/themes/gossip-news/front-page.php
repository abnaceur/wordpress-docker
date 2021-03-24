<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ample_magazine
 */

get_header();
$ample_magazine_hide_front_page_content = ample_magazine_get_option('ample_magazine_front_page_hide_option');

?>


	<section class="right-post no-padding">
<?php
		$ample_magazine_design_layout = ample_magazine_get_option('ample_magazine_design_layout_option');
		if($ample_magazine_design_layout== 'full-width'){?>
		<div class="container-full-width">
			<?php } else{
			?>
			<div class="container">
				<?php
				}
				?>
			<div class="row">


                <?php
$ample_magazine_banner_layout = ample_magazine_get_option('ample_magazine_banner_layout_option');
if($ample_magazine_banner_layout== 'layout1') {
    do_action('ample-magazine-feature-news-2');
	do_action('ample-magazine-feature-slider-news');


}elseif($ample_magazine_banner_layout== 'layout2'){
	do_action('ample-magazine-feature-slider-news2');
	do_action('ample-magazine-feature-news2');
}else{

	do_action('ample-magazine-feature-slider-news7');




	do_action('ample_magazine_feature_sidebar');


}
                ?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Breaking post end -->
	<?php 

if ('posts' == get_option('show_on_front')) {

	include(get_home_template());
} else {
	if (1 != $ample_magazine_hide_front_page_content) {
		include(get_page_template());


	}
}

get_footer();
