<?php

/**
 * The main footer template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>

<?php 
$footer_bottom_text = get_theme_mod( 'everse_settings_footer_bottom_text', esc_html__( 'Copyright &copy; [current_year]. All Rights Reserved.', 'everse' ) );
?>

<?php 

if ( get_theme_mod( 'everse_settings_footer_show', true ) ) {
    ?>

	<!-- Footer -->
	<footer class="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">

		<div class="container">

			<?php 
    
    if ( is_active_sidebar( 'everse-footer-col-1' ) || is_active_sidebar( 'everse-footer-col-2' ) || is_active_sidebar( 'everse-footer-col-3' ) || is_active_sidebar( 'everse-footer-col-4' ) ) {
        ?>
				<?php 
        
        if ( get_theme_mod( 'everse_settings_footer_widgets_show', true ) ) {
            ?>

					<div class="footer__widgets">
						<div class="row">

							<?php 
            ?>

								<!-- 4 Columns -->           
								<?php 
            
            if ( get_theme_mod( 'everse_settings_footer_columns', 'footer-col-4' ) == 'footer-col-4' ) {
                ?>                

									<?php 
                
                if ( is_active_sidebar( 'everse-footer-col-1' ) ) {
                    ?>
										<div class="col-lg-3 col-md-6 footer__col-1">
											<?php 
                    dynamic_sidebar( 'everse-footer-col-1' );
                    ?>
										</div>
									<?php 
                }
                
                ?>

									<?php 
                
                if ( is_active_sidebar( 'everse-footer-col-2' ) ) {
                    ?>
										<div class="col-lg-3 col-md-6 footer__col-2">
											<?php 
                    dynamic_sidebar( 'everse-footer-col-2' );
                    ?>
										</div>
									<?php 
                }
                
                ?>

									<?php 
                
                if ( is_active_sidebar( 'everse-footer-col-3' ) ) {
                    ?>
										<div class="col-lg-3 col-md-6 footer__col-3">
											<?php 
                    dynamic_sidebar( 'everse-footer-col-3' );
                    ?>
										</div>
									<?php 
                }
                
                ?>

									<?php 
                
                if ( is_active_sidebar( 'everse-footer-col-4' ) ) {
                    ?>
										<div class="col-lg-3 col-md-6 footer__col-4">
											<?php 
                    dynamic_sidebar( 'everse-footer-col-4' );
                    ?>
										</div>
									<?php 
                }
                
                ?>

								<?php 
            }
            
            ?>
								
							<?php 
            ?>							

							<?php 
            ?>

						</div>
					</div> <!-- end footer widgets -->
				<?php 
        }
        
        ?>
			<?php 
    }
    
    ?> <!-- if widgets are empty -->				
		</div> <!-- end container -->

		<?php 
    
    if ( get_theme_mod( 'everse_settings_footer_bottom_show', true ) ) {
        ?>
			<div class="footer__bottom">
				<div class="container">
					<div class="row">						
					
						<?php 
        
        if ( $footer_bottom_text ) {
            ?>
							<div class="col-md-6">
								<div class="footer__bottom-copyright">									
									<span class="copyright">
										<?php 
            everse_footer_bottom_text();
            ?>
									</span>
								</div>
							</div>
						<?php 
        }
        
        ?>						

						<?php 
        
        if ( has_nav_menu( 'footer-bottom-menu' ) && get_theme_mod( 'everse_settings_footer_bottom_menu_show', true ) ) {
            ?>
							<div class="col-md-6">
								<nav class="footer__nav-menu-container" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="<?php 
            echo  esc_attr__( 'Secondary menu', 'everse' ) ;
            ?>">
									<?php 
            wp_nav_menu( array(
                'theme_location' => 'footer-bottom-menu',
                'menu_class'     => 'footer__nav-menu',
                'container'      => false,
                'depth'          => 1,
            ) );
            ?>
								</nav>
							</div>
						<?php 
        }
        
        ?>

					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .footer__bottom -->
		<?php 
    }
    
    ?> <!-- if footer bottom show -->

	</footer>

<?php 
}

?>	