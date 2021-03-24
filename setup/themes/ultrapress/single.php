<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UltraPress
 */
get_header();

$sidebar_layout = ultrapress_sidebar_layouts('post');

$post_layout = get_theme_mod('ultrapress_single_layout', 'layout2');

if ($post_layout == 'layout1') {
	if (has_post_thumbnail(get_the_ID())) {
		$bg = 'style="background-image: url(' . esc_url(get_the_post_thumbnail_url(get_the_ID(), "full")) . ')"';
	} else {
		$bg = '';
	}
?>
	<section class="breadcumb-section single-breadcrumb center overlay" <?php echo wp_kses_post($bg); ?>>
		<div class="container">
			<div class="title-banner-wrapper">
				<h1 class="breadcrumb-title">
					<?php echo wp_kses_post(get_the_title(get_the_ID())); ?>
				</h1>
				<?php ultrapress_breadcrumbs(); ?>
			</div>
		</div>
	</section>
<?php
}
if ($post_layout == 'layout2')  {
	$bread_show = get_theme_mod('ultrapress_breadcrumb_switch', 1);
	if ($bread_show) {
		$bread_show = ultrapress_get_page_options('show_breadcrumb', 1);
	}
	if ($bread_show) {
		ultrapress_title_banner();
	}
}
$post_layout='ultrapress-single-'.$post_layout;

if($post_layout=='ultrapress-single-layout3' || $post_layout=='ultrapress-single-layout4'){
	$sidebar_layout='no-sidebar';
}

$post_layout .= ' ' . $sidebar_layout;
?>
<main id="main" class="site-main">
	<section class="single <?php echo esc_attr($post_layout); ?>">
		<div class="container">
			<?php do_action('ultrapress_before_single'); ?>

			<div id="primary" class="post-content-wrapper">
				<?php do_action('ultrapress_before_single_content'); ?>
				<?php
				while (have_posts()) :
					the_post();

					$single_layout = get_theme_mod('ultrapress_single_layout', 'layout2');
					if($single_layout=='layout1' || $single_layout=='layout2'){
						get_template_part('template-parts/single/single', $single_layout);
					}else{
						do_action('ultrapress_single_extra_template');
					}
					
				endwhile;
				?>
				<?php do_action('ultrapress_after_single_content'); ?>
			</div>
			<?php
			if ($sidebar_layout != 'no-sidebar') {
				get_sidebar();
			}
			?>
			<?php do_action('ultrapress_after_single'); ?>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
