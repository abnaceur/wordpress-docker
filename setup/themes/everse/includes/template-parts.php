<?php
/**
 * Template parts.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */


add_action( 'everse_header', 'everse_header_markup' );
add_action( 'everse_masthead', 'everse_masthead_template' );
add_action( 'everse_menu_after', 'everse_last_menu_item' );
add_action( 'everse_last_menu_item_after', 'everse_last_menu_item_mobile' );
add_action( 'everse_footer', 'everse_footer_template' );
add_action( 'everse_comments', 'everse_comments_template' );
add_action( 'everse_page_title_after', 'everse_breadcrumbs' );
add_action( 'everse_entry_section_before', 'everse_breadcrumbs' );
add_action( 'everse_entry_featured_image', 'everse_featured_image_markup' );


/**
 * Get site Header
 */
if ( ! function_exists( 'everse_header_markup' ) ) {
	function everse_header_markup() {
		if ( ! get_theme_mod( 'everse_settings_header_show', true ) ) {
			return;
		}
		$header_classes = array( 'everse-header', 'nav' );
		$header_sticky = ( get_theme_mod( 'everse_settings_sticky_header_show', true ) ) ? 'nav--sticky ' : '';
		$header_layout = get_theme_mod( 'everse_settings_header_layout', 'header-layout-1' );

		if ( get_theme_mod( 'everse_settings_onepage_header', false ) ) {
			$header_classes[] = 'nav--onepage';
		}

		switch ( $header_layout ) {
			case 'header-layout-1':
				$header_classes[] = 'everse-header-layout-1';
				break;

			case 'header-layout-2':
				$header_classes[] = 'everse-header-layout-2';
				break;

			case 'header-layout-3':
				$header_classes[] = 'everse-header-layout-3';
				break;
		}

		$header_classes = implode( ' ', $header_classes );
		?>	

		<header class="<?php echo esc_attr( $header_classes ); ?>" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
			<div class="nav__holder <?php echo esc_attr( $header_sticky ); ?>">
				<div class="nav__container container">
					<div class="nav__flex-parent flex-parent">

						<?php everse_masthead(); ?>

					</div> <!-- .flex-parent -->
				</div> <!-- .nav__container -->
			</div> <!-- .nav__holder -->
		</header> <!-- .everse-header -->		
		
		<?php
	}
}


/**
 * Header main template
 */
if ( ! function_exists( 'everse_masthead_template' ) ) {
	function everse_masthead_template() {
		get_template_part( 'template-parts/header/header-main-template' );
	}
}


/**
 * Header last item in menu
 */
if ( ! function_exists( 'everse_last_menu_item' ) ) {
	function everse_last_menu_item( $is_mobile = false ) {
		$button_text = get_theme_mod( 'everse_settings_header_last_menu_item_button_text', esc_html__( 'Button', 'everse' ) );
		$button_link_rel = ( ! empty( get_theme_mod( 'everse_settings_header_last_menu_item_button_link_rel', '' ) ) ? 'rel="' . esc_attr( get_theme_mod( 'everse_settings_header_last_menu_item_button_link_rel', '' ) ) . '"' : '' );
		$button_target = ( get_theme_mod( 'everse_settings_header_last_menu_item_button_new_tab', false ) ) ? '_blank' : '_self';
		$button_url = get_theme_mod( 'everse_settings_header_last_menu_item_button_url', '#' );
		$text_html = get_theme_mod( 'everse_settings_header_last_menu_item_text_html' );
		$hide_on_mobile = get_theme_mod( 'everse_settings_header_last_menu_item_hide', false );
		$outside_menu = get_theme_mod( 'everse_settings_header_last_menu_item_button_outside_menu', false );

		$search = get_theme_mod( 'everse_settings_header_last_menu_item_search', false );
		$cart = get_theme_mod( 'everse_settings_header_last_menu_item_shopping_cart', false );
		$button = get_theme_mod( 'everse_settings_header_last_menu_item_button', false );		
		$html = get_theme_mod( 'everse_settings_header_last_menu_item_html', false );

		if ( $hide_on_mobile && $is_mobile ) {
			return;
		}

		if ( false === $search && false === $cart && false === $button &&	false === $html ) {
			return;
		}

		if ( ! $is_mobile ) {
			echo '<div class="nav__right d-lg-flex d-none">';
		}		

			if ( $search ) { ?>
				<div class="nav__right-item">
					<div class="everse-menu-search">
						<button type="button" class="everse-menu-search__trigger" title="<?php echo esc_attr__( 'Open Search', 'everse' ); ?>">
							<i class="everse-icon-search everse-menu-search__icon" aria-hidden="true"></i>
						</button>
						<div class="everse-menu-search-modal" tabindex="-1" aria-hidden="true" aria-label="<?php echo esc_attr( 'Search Modal', 'everse' ); ?>">
							<div class="everse-menu-search-modal__inner">
								<div class="container">
									<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
										<label>
											<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'everse' ); ?></span>
											<input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'everse' ); ?>" value="<?php the_search_query(); ?>" name="s" />
										</label>
										<button type="button" class="everse-menu-search-modal__close" aria-label="<?php echo esc_attr( 'Close Search', 'everse' ); ?>">
											<span aria-hidden="true">
												<i class="everse-icon-close everse-menu-search-modal__close-icon"></i>
											</span>
										</button>	
									</form>
								</div>				
							</div>
						</div>
					</div>
				</div>				
				<?php
			}			

			if ( $cart && everse_is_woocommerce_activated() ) {
				echo '<div class="nav__right-item">';
					everse_woo_cart_icon();
				echo '</div>';
			}

			if ( $button ) {
				
				if ( ! $is_mobile || $outside_menu ) { ?>

					<div class="nav__right-item">
						<div class="nav__right-btn-holder">			
							<a href="<?php echo esc_url( $button_url ); ?>" <?php echo esc_html( $button_link_rel ); ?> class="nav__right-btn btn btn--color btn--md" target="<?php echo esc_attr( $button_target ); ?>">
								<?php	echo esc_html( $button_text ); ?>
							</a>
						</div>
					</div>

				<?php }		
				
			}

			if ( $html ) {
				echo '<div class="nav__right-item">';
					// We don't escape output here, so user can enter any HTML
					echo do_shortcode( $text_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</div>';
			}

		if ( ! $is_mobile ) {
			echo '</div>';
		}

	}
}



/**
 * Last menu item mobile
 */
if ( ! function_exists( 'everse_last_menu_item_mobile' ) ) {
	function everse_last_menu_item_mobile() {

		if ( ! get_theme_mod( 'everse_settings_header_last_menu_item_button', false ) ) {
			return;
		}

		if ( get_theme_mod( 'everse_settings_header_last_menu_item_hide', false ) ) {
			return;
		}

		if ( get_theme_mod( 'everse_settings_header_last_menu_item_button_outside_menu', false ) ) {
			return;
		}

		$button_text = get_theme_mod( 'everse_settings_header_last_menu_item_button_text', esc_html__( 'Button', 'everse' ) );
		$button_link_rel = ( ! empty( get_theme_mod( 'everse_settings_header_last_menu_item_button_link_rel', '' ) ) ? 'rel="' . esc_attr( get_theme_mod( 'everse_settings_header_last_menu_item_button_link_rel', '' ) ) . '"' : '' );
		$button_target = ( get_theme_mod( 'everse_settings_header_last_menu_item_button_new_tab', false ) ) ? '_blank' : '_self';
		$button_url = get_theme_mod( 'everse_settings_header_last_menu_item_button_url', '#' );
		?>
		<div class="nav__last-item-mobile d-lg-none">
			<a href="<?php echo esc_url( $button_url ); ?>" <?php echo esc_html( $button_link_rel ); ?> class="nav__right-btn btn btn--color btn--md" target="<?php echo esc_attr( $button_target ); ?>">
				<?php	echo esc_html( $button_text ); ?>
			</a>
		</div>
		<?php
	}
}



/**
 * Mobile menu
 */
if ( ! function_exists( 'everse_menu_mobile' ) ) {
	function everse_menu_mobile() { ?>
		<div class="nav__mobile d-lg-none">

			<?php everse_last_menu_item( true ); ?>

			<?php if ( has_nav_menu('primary-menu') ) : ?>
				<!-- Mobile toggle -->
				<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
					<span class="visually-hidden"><?php esc_html_e( 'Toggle navigation', 'everse' ); ?></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
				</button>
			<?php endif; ?>

		</div>
		<?php
	}
}


/**
 * Footer main template
 */
if ( ! function_exists( 'everse_footer_template' ) ) {
	function everse_footer_template() {
		get_template_part( 'template-parts/footer/footer-main-template' );
	}
}


/**
 * Comments template
 */
if ( ! function_exists( 'everse_comments_template' ) ) {
	function everse_comments_template() {
	
		if ( comments_open() || get_comments_number() ) : ?>
			<!-- Comments -->
			<?php if ( everse_is_elementor_page() ) : ?>
				<div class="container">
			<?php else: ?>
				<div class="comments-wrap">
			<?php endif; ?>
				<?php comments_template(); ?>
			</div>
		<?php endif;
	}
}


/**
 * Preloader
 */
if ( ! function_exists( 'everse_preloader' ) ) {
	function everse_preloader() {
		if ( get_theme_mod( 'everse_settings_preloader_show', false ) ) : ?>
			<div class="loader-mask">
				<div class="loader">
					<div></div>
				</div>
			</div>
		<?php endif;
	}
}

/**
 * Back to top
 */
if ( ! function_exists( 'everse_back_to_top' ) ) {
	function everse_back_to_top() {
		if ( get_theme_mod( 'everse_settings_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top" aria-label="<?php echo esc_attr__( 'Back to top', 'everse' )?>"><i class="everse-icon-chevron-up" aria-hidden="true"></i></a>
			</div>
		<?php endif; 
	}
}

/**
 * Content markup top
 */
if ( ! function_exists( 'everse_primary_content_markup_top' ) ) {
	function everse_primary_content_markup_top() {
		?>
			<div class="container">
				<div class="row">
		<?php
	}
}


/**
 * Content markup bottom
 */
if ( ! function_exists( 'everse_primary_content_markup_bottom' ) ) {
	function everse_primary_content_markup_bottom() {
		?>
				</div>
			</div>
		<?php
	}
}


if ( ! function_exists( 'everse_page_title_atts' ) ) {
	/**
	* Page title attributes
	*
	* @since 1.0.0
	*/
	function everse_page_title_atts( $template, $align = 'center' ) {
		$atts = '';
		$align = get_theme_mod( 'everse_settings_' . $template . '_page_title_align', $align );
		$layout = get_theme_mod( 'everse_settings_' . $template . '_page_title_layout', 'page-title-layout-1' );
		$image = get_theme_mod( 'everse_settings_' . $template . '_page_title_image' );

		$classes = array(
			'page-title',
			'page-title--' . $align,
			$layout,
			'page-title-' . $template
		);

		if ( 'page-title-layout-2' === $layout ) {
			$classes[] = 'bg-overlay';
			$classes[] = 'bg-overlay--dark';

			if ( is_page() || is_single() && has_post_thumbnail() ) {
				$background_image = 'background-image: url(' . get_the_post_thumbnail_url() . ')';
			}

			if ( ! empty( $image ) ) {
				if ( is_home() || is_archive() || is_search() ) {
					$background_image = 'background-image: url(' . esc_url( $image ) . ')';
				}
			}
		}


		$classes = array_map( 'esc_attr', $classes );

		$classes = implode( ' ', $classes );

		$atts = 'class="' . esc_attr( $classes ) . '"';

		if ( isset( $background_image ) ) {
			$atts .= ' style="' . esc_attr( $background_image ) . '"'; 
		}		

		echo $atts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'everse_breadcrumbs' ) ) {
	/**
	* Breadcrumbs
	*
	* @since 1.0.0
	*/
	function everse_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			return;
		}

		if ( is_archive() && ! is_search() && get_theme_mod( 'everse_settings_archives_breadcrumbs_show', true ) ) {

			if ( everse_is_woocommerce_activated() ) {
				if ( is_shop() && ! get_theme_mod( 'everse_settings_shop_breadcrumbs_show', true ) ) {
					return;
				}
			}

			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}

		if ( is_search() && get_theme_mod( 'everse_settings_search_results_breadcrumbs_show', true ) ) {
			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}

		if ( is_page() || is_home() && get_theme_mod( 'everse_settings_regular_pages_breadcrumbs_show', true ) ) {
			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}
		
		if ( is_single() && get_theme_mod( 'everse_settings_single_post_breadcrumbs_show', true ) ) { ?>
			<div class="breadcrumbs-wrap">
				<div class="container">
					<?php breadcrumb_trail( array(
						'show_browse' => false,
					) ); ?>
				</div>
			</div>
			<?php
		}	
	}
}

if ( ! function_exists( 'everse_featured_image_markup' ) ) {
	/**
	* Single Entry Featured Image
	*
	* @since 1.0.0
	*/
	function everse_featured_image_markup() {
		if ( has_post_thumbnail() && get_theme_mod( 'everse_settings_single_featured_image_show', true ) ) : ?>

			<!-- Featured Image -->
			<div class="single-post__featured-img">
				<figure class="single-post__featured-img-container">
					<?php the_post_thumbnail( 'everse_featured_large', array( 'class' => 'single-post__featured-img-image' )); ?>
				</figure>
			</div>

		<?php endif;
	}
}

if ( ! function_exists( 'everse_read_more' ) ) {
	/**
	* Read more
	*
	* @since 1.0.0
	*/
	function everse_read_more() {
		$text = get_theme_mod( 'everse_settings_read_more_text', __( 'Read More', 'everse' ) );

		if ( get_theme_mod( 'everse_settings_read_more_show', true ) ) : ?>
			<!-- Read More -->
			<div class="entry__read-more">			
				<a href="<?php the_permalink(); ?>" class="read-more">
					<?php if ( $text ) : ?>
						<span class="read-more__text">							
							<?php printf( '<span class="screen-reader-text">' . get_the_title() . '</span> ' . esc_html( $text ) ); ?>
						</span>						
					<?php endif; ?>
				</a>
			</div>
		<?php endif;
	}
}



/**
 * Footer bottom text
 */
if ( ! function_exists( 'everse_footer_bottom_text' ) ) {

	/**
	 * Footer bottom text
	 *
	 * @since 1.0.0
	 */
	function everse_footer_bottom_text() {
		$output = get_theme_mod( 'everse_settings_footer_bottom_text',
			esc_html__( 'Copyright &copy; [current_year]. All Rights Reserved.' , 'everse' )
		);

		$output = str_replace( '[current_year]', date_i18n( 'Y' ), $output );

		echo do_shortcode( wp_kses_post( $output ) );
	}
}