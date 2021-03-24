<?php
/**
 * Functions for Blog99 Theme.
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog99 Display the post format images,
 * 
 * @package Blog99
 * @since 1.0.0
 */
function blog99_postformat_icon() {
    /**
	 *get the posformat icons
	 *@since 1.0.0 
	*/
	$postformat = get_post_format();

	//select the icon for post format
	if( $postformat == 'gallery' ){

		$postformat_icons = 'fa fa-image';

	}elseif( $postformat == 'image' ){

		$postformat_icons = 'fa fa-image';

	}elseif( $postformat == 'link' ){

		$postformat_icons = 'fa fa-link';

	}elseif( $postformat == 'quote' ){

		$postformat_icons = 'fa fa-quote-right';

	}elseif( $postformat == 'video' ){

		$postformat_icons = 'fa fa-play';

	}elseif( $postformat == 'audio' ){

		$postformat_icons = 'fa fa-volume-up';

	}elseif( $postformat == 'status' ){

		$postformat_icons = 'fa fa-pencil';

	}elseif( $postformat == 'aside' ){

		$postformat_icons = 'fa fa-plus';

	}else{

		$postformat_icons = '';
	}


	if( $postformat_icons  != '' ){
		echo wp_kses_post( '<div class="blog99-post-format"><i class="'.esc_attr( $postformat_icons ).'"></i></div>');
	}
	
}
add_action( 'blog99_post_format_icon','blog99_postformat_icon' );//Register


/**
 * Blog99 
 * 
 * @since 1.0.0
 */
function get_blog99_post_timedate(){
	/**
	 * get the post date
	 * 
	 */
	echo "<span>";

			the_time(get_option('date_format')); 

	echo "</span>"; 
}

if ( ! function_exists( 'blog99_author_image_style' ) ) {

	function blog99_author_image_style($avatar_url){

		if( !$avatar_url) return; ?>
		
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="213" height="233" viewBox="0 0 213 233">
				<defs>
					<filter id="a" width="146.7%" height="141.6%" x="-23.3%" y="-19.7%" filterUnits="objectBoundingBox">
						<feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"/>
						<feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="12.5"/>
						<feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"/>
							<feMergeNode in="SourceGraphic"/>
						</feMerge>
					</filter>
					<g>
					<clipPath id="hex-mask">
						<path id="b" d="M45.307 184.035C88.334 189.695 145.13 162.37 158 99 170.87 35.63 168.53.695 115.084.695 61.639.695 10.604 42.66 3.334 94.896c-7.27 52.237-1.055 83.479 41.973 89.14z"/>
					</clipPath>
				</g>
				</defs>
				<g fill="none" fill-rule="evenodd">
					<path fill="#E3E3E3" d="M94.5 194c47.773 0 86.5-38.727 86.5-86.5S142.273 21 94.5 21s-81.738 34.738-81.738 86.5S46.727 194 94.5 194z"/>
					<path fill="#D5D5D5" d="M115.209 211.215c55.326-11.035 76.922-52.505 76.922-100.278 0-47.772-35.497-90.513-83.27-90.513C61.09 20.424 28 69.727 28 117.5c0 47.773 31.883 104.75 87.209 93.715z"/>
					<use fill="" filter="url(#a)" transform="translate(24 22)" xlink:href="#b"/>
				</g>

				<a xlink:href="#" transform="">
					<image class="author_image_style" clip-path="url(#hex-mask)" xlink:href="<?php echo esc_url($avatar_url); ?>" transform="translate(24 22)" preserveAspectRatio="xMidYMin slice"></image>
				</a>
			</svg>
		<?php
	}
}