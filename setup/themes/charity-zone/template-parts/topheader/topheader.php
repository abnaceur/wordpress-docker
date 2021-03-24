<?php
/**
 * Displays top navigation
 *
 * @package Charity Zone
 */
?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="row">
				<div class="col-lg-4 col-md-6">
				    <div class="navbar-brand">
				        <?php if ( has_custom_logo() ) : ?>
		            		<div class="site-logo"><?php the_custom_logo(); ?></div>
		          		<?php endif; ?>
		          		<?php $blog_info = get_bloginfo( 'name' ); ?>
		            		<?php if ( ! empty( $blog_info ) ) : ?>
		              			<?php if ( is_front_page() && is_home() ) : ?>
		                			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		              			<?php else : ?>
		            				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		              			<?php endif; ?>
		            		<?php endif; ?>
				            <?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) :
				            ?>
		            		<p class="site-description"><?php echo esc_html($description); ?></p>
		          		<?php endif; ?>
				    </div>
			  	</div>
			  	<div class="col-lg-8 col-md-6">
			  		<div class="social-link">
				  		<?php if(get_theme_mod('charity_zone_facebook_url') != ''){ ?>
							<a href="<?php echo esc_url(get_theme_mod('charity_zone_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i></a>
						<?php }?>
						<?php if(get_theme_mod('charity_zone_twitter_url') != ''){ ?>
							<a href="<?php echo esc_url(get_theme_mod('charity_zone_twitter_url','')); ?>"><i class="fab fa-twitter"></i></a>
						<?php }?>
						<?php if(get_theme_mod('charity_zone_intagram_url') != ''){ ?>
							<a href="<?php echo esc_url(get_theme_mod('charity_zone_intagram_url','')); ?>"><i class="fab fa-instagram"></i></a>
						<?php }?>
						<?php if(get_theme_mod('charity_zone_linkedin_url') != ''){ ?>
							<a href="<?php echo esc_url(get_theme_mod('charity_zone_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i></a>
						<?php }?>
						<?php if(get_theme_mod('charity_zone_pintrest_url') != ''){ ?>
							<a href="<?php echo esc_url(get_theme_mod('charity_zone_pintrest_url','')); ?>"><i class="fab fa-pinterest-p"></i></a>
						<?php }?>
					</div>
			  	</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="top-info">
				<div class="row">
					<div class="col-lg-6 col-md-5">
						<?php if(get_theme_mod('charity_zone_phone_number_info') != ''){ ?>
						<p><i class="fas fa-phone-square"></i><?php echo esc_html(get_theme_mod('charity_zone_phone_number_info','')); ?></p>
						<?php }?>
					</div>
					<div class="col-lg-6 col-md-5">
						<?php if(get_theme_mod('charity_zone_email_info') != ''){ ?>
						<p><i class="fas fa-envelope-square"></i><?php echo esc_html(get_theme_mod('charity_zone_email_info','')); ?></p>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>