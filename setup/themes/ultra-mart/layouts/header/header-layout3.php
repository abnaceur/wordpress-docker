<header class="site-header ultra-mart-header">

    <div class="top-header top-bar">
        <div class="container">
                <div class="top-header-items-wrapp first-items">
                    <?php
                    $top_header = get_theme_mod('opstore_top_header_show','show');
                    $top_header_type = get_theme_mod('opstore_topheader_type','info');
                    $noti_text = get_theme_mod('top_notification_text');
                    $top_email = get_theme_mod('top_email');
                    $top_phone = get_theme_mod('top_phone');
                    if($top_header_type == 'info'){?>
                        <div class="top-left">
                            <ul>
                                <?php if($top_email){?>
                                <li class="phone"><a href="mailto:<?php echo esc_attr($top_email);?>"><i class="fa fa-envelope"></i><?php echo esc_html($top_email);?></a></li>
                                <?php } if($top_phone){?>
                                <li class="email"><a href="tel:<?php echo esc_attr($top_phone);?>"><i class="fa fa-phone"></i><?php echo esc_html($top_phone);?></a></li>
                                <?php }?>
                            </ul>
                        </div>
                    <?php }else{?>
                        <div class="header-message">
                            <?php echo wp_kses_post($noti_text); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="top-header-items-wrapp last-items">
                    <div class="top-menus">
                        <?php 
                        $args1 = array(
                            'theme_location' => 'top',
                            'menu_class' => 'nav top-menu',

                        );
                        $args2 = array(
                            'theme_location' => 'currency-menu',
                            'menu_class' => 'nav currency-menu',
                        );
                        $args3 = array(
                            'theme_location' => 'language-menu',
                            'menu_class' => 'nav language-menu',
                        );
                        if( has_nav_menu( 'top' ) ):
                            wp_nav_menu( $args1 );
                        endif;
                        if( has_nav_menu( 'currency-menu' ) ):
                            wp_nav_menu( $args2 );
                        endif;
                        if( has_nav_menu( 'language-menu' ) ):
                            wp_nav_menu( $args3 );
                        endif;
                        ?>
                    </div>
                </div>
        </div>
    </div>
    <div class="container">
    <?php opstore_mobile_nav(); ?>
    </div>
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <?php opstore_site_brandings(); ?>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="header-widget-area">
                    <?php 
                    if(is_active_sidebar('header-area')){
                        dynamic_sidebar('header-area');
                    }
                    ?>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="header-icons">
                        <?php 
                        $minicart_style = get_theme_mod('opstore_minicart_layout','offcanvas');
                        ?>
                        <ul class="site-header-cart menu on-hover">
                            <?php 
                            $show_wishlist = get_theme_mod('opstore_wishlist_enable','show');
                            if( function_exists( 'WC' ) && function_exists('yith_wishlist_constructor') && $show_wishlist == 'show' ):
                                $wishlist_page = get_option('yith_wcwl_wishlist_page_id');
                                $link = '#';
                                if( $wishlist_page ) {
                                    $link = get_permalink( $wishlist_page );
                                }
                                $wishlist_count = YITH_WCWL()->count_products();
                                ?>
                                <li class="wishlist-icon">
                                    <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr__('wishlist','ultra-mart'); ?>">
                                        <?php  ?>
                                        <span class="wishlist-count wishlist-rounded"><?php echo (int)$wishlist_count; ?></span>
                                        <span class="lnr lnr-heart icon"></span>
                                    </a>
                                </li>
                                <?php
                            endif; 
                            $show_cart = get_theme_mod('opstore_cart_enable','show');
                            if( function_exists( 'WC' ) && $show_cart == 'show' ): ?>
                                <li class="cart-icon dropdown">
                                    <a href="javascript:void(0);" title="<?php echo esc_attr__('cart','ultra-mart'); ?>">
                                        <span class="count rounded-crcl"><?php echo absint(WC()->cart->get_cart_contents_count()) ; ?></span>
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                    <?php if( $minicart_style == 'dropdown' ){?>
                                    <div class="dropdown-menu widget woocommerce widget_shopping_cart">
                                        <button type="button" class="close">
                                            <span>&times;</span>
                                        </button>
                                        <!--close-->
                                        <h6 class="title"><?php echo esc_html__('Your Cart Items','ultra-mart'); ?>
                                            (<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'ultra-mart' ), WC()->cart->get_cart_contents_count() ); ?>)
                                        </h6>
                                        <div class="widget_shopping_cart_content">
                                            <?php woocommerce_mini_cart(); ?>
                                        </div>
                                    </div>
                                    <?php }?>
                                </li>
                            <?php endif; ?>
                            <!--cart-->
                            <?php 
                            $show_login = get_theme_mod('opstore_login_enable','show');
                            if($show_login == 'show'): 
                            if( ! is_user_logged_in() && function_exists( 'WC' ) ){ ?>

                                <li> 
                                    <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="btn-login">
                                        <span class="lnr lnr-user"></span>
                                        <?php _e('Login/Register','ultra-mart');?>
                                    </a>
                                </li>
                                <?php
                            } else{ ?>

                                <?php if( function_exists( 'WC' ) ): ?>
                                    <li>
                                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                            <span class="lnr lnr-user lrm-login"></span>
                                            <?php _e('My Account','ultra-mart');?>
                                        </a> 
                                    </li>
                                <?php endif;
                            } 
                            endif;

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="main-menu-wrap row">
                <div class="cat-dropdown col-sm-2 col-md-2 col-xs-12">
                    <?php
                    if(function_exists( 'WC' )){
                    $display_type = 'collapsed';
                    $show_cat_image = 'yes';
                    echo '<div class="toggle-wrap"><a href="javascript:void(0)">';
                    echo '<span class="lnr lnr-list"></span>';
                    echo esc_html__('Categories','ultra-mart');
                    echo '</a></div>';
                    $obj = get_queried_object();
                    $args = array(
                              'taxonomy' => 'product_cat',
                              'hide_empty' => false,
                              'parent'   => 0
                    );
                    $product_cat = get_terms( $args );
                    echo '<ul class="main-cat '.esc_attr($display_type).'">';
                    foreach ($product_cat as $parent_product_cat){
                        $thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true ); 
                        $cat_image = esc_url(wp_get_attachment_url( $thumbnail_id )); 
                        if(isset($obj->term_id)){
                            if($obj->term_id == $parent_product_cat->term_id){
                                $class = 'active';
                            }else{
                                $class = '';
                            }
                        }else{
                            $class = '';
                        }
                        echo '<li class="cats '.$class.'"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'">';
                        if($thumbnail_id && $show_cat_image == 'yes'){
                            echo "<img src='{$cat_image}' height='20px' width='20px'/>";
                        }
                        echo esc_html($parent_product_cat->name);
                        echo '</a>';
                        $child_args = array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent'   => $parent_product_cat->term_id
                        );
                        $child_product_cats = get_terms( $child_args );
                        if($child_product_cats){
                            echo '<ul class="sub-cat">';
                        foreach ($child_product_cats as $child_product_cat){
                            $thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true ); 
                            $cat_image = esc_url(wp_get_attachment_url( $thumbnail_id )); 
                            if(isset($obj->term_id)){
                                if($obj->term_id == $child_product_cat->term_id){
                                    $class = 'active';
                                }else{
                                    $class = '';
                                }
                            }
                            echo '<li class="sub-cats '.$class.'"><a href="'.esc_url(get_term_link($child_product_cat->term_id)).'">';
                            if($thumbnail_id && $show_cat_image == 'yes'){
                                echo "<img src='{$cat_image}' height='20px' width='20px'/>";
                            }
                            echo esc_html($child_product_cat->name);
                            echo '</a></li>';
                        }
                        echo '</ul>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                    }
                    ?>
                </div>
                <div class="collapse navbar-collapse col-sm-10 col-md-10 col-xs-12">
                    <?php 
                    $args = array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav navbar-nav'
                    );

                    if( has_nav_menu( 'primary' ) ):
                        wp_nav_menu( $args );
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

</header>
<?php 
$sticky_menu = get_theme_mod('opstore_bottom_menu_option','show');
if($sticky_menu == 'show'){
?>
<div class="menu-toggler">
    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
	<i class="fa fa-angle-double-up" aria-hidden="true" style="display:none;"></i>

</div>
<div class="sticky-menu">
    <div class="container">
            <div class="icon-inner-wrapper">
                <div class="searchbox-wrapp">
                    <span class="searchbox-ico"><span class="lnr lnr-magnifier"></span></span>
                    <label class="title"><?php _e('Search','ultra-mart');?></label>
                </div>
            </div>
            <div class="icon-inner-wrapper">
                <?php
                if( function_exists( 'WC' )&&function_exists('yith_wishlist_constructor') ):
                    $wishlist_page = get_option('yith_wcwl_wishlist_page_id');
                    $link = '#';
                    if( $wishlist_page ) {
                        $link = get_permalink( $wishlist_page );
                    }
                    $wishlist_count = YITH_WCWL()->count_products();
                    ?>
                    <div class="wishlist-icon">
                        <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr__('wishlist','ultra-mart'); ?>">
                            <?php  ?>
                            <span class="wishlist-count wishlist-rounded"><?php echo (int)$wishlist_count; ?></span>
                            <span class="lnr lnr-heart icon"></span>
                            <label class="title">Wishlist</label>
                        </a>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <div class="icon-inner-wrapper">
                <?php if( function_exists( 'WC' ) ): ?>
                    <div class="cart-icon dropdown">
                        <a href="javascript:void(0);" title="<?php echo esc_attr__('cart','ultra-mart'); ?>">
                            <span class="count rounded-crcl"><?php echo absint(WC()->cart->get_cart_contents_count()) ; ?></span>
                            <span class="lnr lnr-cart"></span>
                            <label class="title"><?php _e('Cart','ultra-mart');?></label>
                        </a>
                    </div>
                <?php endif; ?>   
            </div>
            <div class="icon-inner-wrapper">
                <?php
                if( ! is_user_logged_in() && function_exists( 'WC' ) ){ ?>

                    <div class="cart-wrapper"> 
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="btn-login">
                            <span class="lnr lnr-user"></span>
                            <label class="title"><?php _e('Login/Register','ultra-mart');?></label>
                        </a>
                    </div>
                    <?php
                } else{ ?>

                    <?php if( function_exists( 'WC' ) ): ?>
                        <div class="cart-wrapper">
                            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                <span class="lnr lnr-user lrm-login"></span>
                                <label class="title"><?php _e('My Account','ultra-mart');?></label>
                            </a> 
                        </div>
                    <?php endif;
                } 
                ?> 
            </div>
    </div>
</div>
<?php }?>