<?php
/**
 * Managed the custom functions and hooks for entire theme.
 *
 * @subpackage castell
 * @since 1.0
 */

if( ! function_exists( 'castell_frontpage_manage_sections' ) ) :

	/**
	 * function to manage the sections display at frontpage
	 */

	function castell_frontpage_manage_sections() {

		get_template_part( 'template-parts/content', 'hero' );
		get_template_part( 'template-parts/content', 'about' );
		get_template_part( 'template-parts/content', 'service' );
		get_template_part( 'template-parts/content', 'portfolio' );
		get_template_part( 'template-parts/content', 'team' );
		get_template_part( 'template-parts/content', 'blog' );
		get_template_part( 'template-parts/content', 'callout' );

	}

endif;

add_action( 'castell_frontpage_sections', 'castell_frontpage_manage_sections', 10 );


/*----------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'castell_innerpage_header_start' ) ) :

	/**
	 * function to manage starting div of section
	 */

	function castell_innerpage_header_start() {
       
?>
		 <section class="page-banner">
<div class="container">
            <div class="row">
            	<div class="col-12">
            	
<?php
	}

endif;

if( ! function_exists( 'castell_innerpage_header_title' ) ) :

	function castell_innerpage_header_title() {
		if( is_single() || is_page() ) {
			the_title( '<h3>', '</h3>' );
		} elseif( is_archive() ) {
			the_archive_title( '<h3>', '</h3>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		} elseif( is_search() ) {
	?>
			<h3><?php printf(/* translators: %s: post date. */ esc_html__( 'Search Results for: %s', 'castell' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h3>
	<?php
		} elseif( is_404() ) {
			echo '<h3>'. esc_html( '404 Error', 'castell' ) .'</h3>';
		}
		elseif(is_home() || is_front_page()) { ?>						
			<h3><?php echo esc_html__('Blog', 'castell') ?></h3>
		<?php }
	}

endif;

if( !function_exists( 'castell_breadcrumb_content' ) ) :
	function castell_breadcrumb_content() {

		$castell_breadcrumb_option = get_theme_mod( 'castell_enable_breadcrumb_option', true );

		if ( false === $castell_breadcrumb_option ) {
			return;
		}

            if(!is_home() || !is_front_page()) {  					
				castell_breadcrumbs();
		}		      

	}

endif;


if( ! function_exists( 'castell_innerpage_header_end' ) ) :

	function castell_innerpage_header_end() {
?></div>
</div>
			</div>
		</div>
	</div>
</section>
<div id="content"></div>

<?php
	}
	
endif;
	

add_action( 'castell_innerpage_header', 'castell_innerpage_header_start', 5 );
add_action( 'castell_innerpage_header', 'castell_innerpage_header_title', 10 );
add_action( 'castell_innerpage_header', 'castell_breadcrumb_content', 15 );
add_action( 'castell_innerpage_header', 'castell_innerpage_header_end', 20 );