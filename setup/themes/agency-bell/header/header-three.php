<?php $bannerslider = get_theme_mod('construction_light_banner_slider_section', 'enable'); ?>
<header id="childmasthead" class="site-header headerthree <?php if(is_home() || is_front_page()){ echo esc_attr( $bannerslider ); } ?>">
    <div class="nav-classic">
	    <div class="container">
            <div class="header-middle-inner">
                <div class="site-branding">
                    
                    <div class="brandinglogo-wrap">
                        <?php the_custom_logo(); ?>

                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php 
                            $construction_light_description = get_bloginfo( 'description', 'display' );
                            if ( $construction_light_description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo $construction_light_description; /* WPCS: xss ok. */ ?></p>
                        <?php endif; ?>
                    </div>

                    <?php do_action('construction_light_menu_toggle'); ?>
					<!-- Mobile navbar toggler  --> 

                </div> <!-- .site-branding -->
                <div class="nav-menu">
                    <nav class="box-header-nav main-menu-wapper" aria-label="<?php esc_attr_e( 'Main Menu', 'agencybell' ); ?>" role="navigation">
                        <?php
                            wp_nav_menu( array(
                                    'theme_location'  => 'menu-1',
                                    'menu'            => 'primary-menu',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'main-menu',
                                )
                            );
                        ?>
                    </nav>

                    <div class="extralmenu-wrap">
                        <ul>
                            <li class="menu-item-search"><a class="searchicon" href="javascript:void(0)"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
	    </div><!-- .container end -->
	</div>
</header><!-- #masthead -->