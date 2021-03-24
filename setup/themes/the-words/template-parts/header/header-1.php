<?php
/**
 * Customizer Header Layout One
 *
 * @package The_Words
**/

$ed_header_search = get_theme_mod('ed_header_search',1);
$ed_header_social_icon = get_theme_mod('ed_header_social_icon',1);
$header_class  = '';
if( !$ed_header_search ){
	$header_class = 'ta-no-search';
}
?>

<?php if( has_nav_menu('the-words-top-menu') || $ed_header_social_icon ){ ?>

	<div class="ta-top-header top-header-1 <?php if( !has_nav_menu('the-words-top-menu') ){ echo 'no-menu'; }?>">

		<div class="ta-container clearfix">

			<?php if( has_nav_menu('the-words-top-menu') ){ ?>

				<div class="ta-top-menu">
					<nav id="top-site-navigation" class="top-navigation">

						<?php
						wp_nav_menu( array(
							'theme_location' => 'the-words-top-menu',
							'menu_id'        => 'top-menu',
							'depth'        => 1,
						) );
						?>

					</nav><!-- #site-navigation -->
				</div>

			<?php } ?>

			<?php 
			
			if( $ed_header_social_icon ){
				do_action('the_words_social_icon_action');
			} ?>

		</div>

	</div>

<?php } ?>

<header id="masthead" class="site-header ta-header-1 <?php echo esc_attr( $header_class ); ?>" >

	<?php
	if( $ed_header_search ){ ?>

		<div class="ta-header-search">
			<div class="ta-container clearfix">

				<a href="javascript:void(0)" class="nav-focus-close"></a>

            	<?php get_search_form(); ?>

            	<div class="ta-header-search-close">
		            <a id="ta-search-close" href="javascript:void(0)"><span class="ta-search-close"></span></a>
		        </div>

	        </div>
        </div>

    <?php } ?>

    <div class="ta-header-main clearfix">

    	<div class="ta-container clearfix">

			<?php the_words_site_identity(); ?>

			<nav id="site-navigation" class="main-navigation">

				<button class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<a href="javascript:void(0)" class="nav-focus-menu-last"></a>

				<button class="menu-toggle-close">
					<span></span>
					<span></span>
				</button>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'the-words-primary-menu',
					'menu_id'        => 'primary-menu',
					'show_toggles' => true,
				) );
				?>

				<a href="javascript:void(0)" class="nav-focus-menu-close"></a>
				
			</nav><!-- #site-navigation -->

			<?php if( $ed_header_search ){ ?>

				<div class="ta-header-search-main <?php if( !$ed_header_social_icon ){ echo 'ta-no-social-icon'; } ?>">
					<a class="ta-search-toggle" href="javascript:void(0)">
						<span class="ta-search-hidden"></span>
					</a>
				</div>

			<?php } ?>

		</div>

	</div>
	
</header><!-- #masthead -->