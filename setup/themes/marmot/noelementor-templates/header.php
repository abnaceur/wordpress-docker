<?php
$site_name = get_bloginfo('name');
$tagline = get_bloginfo('description', 'display');
?>
<header class="site-header" role="banner" style="background: no-repeat center center url('<?php echo esc_url(header_image()); ?>')">

    <div class="site-branding">
        <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } elseif ($site_name) {
            ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e('Home', 'marmot'); ?>" rel="home">
                    <?php echo esc_html($site_name); ?>
                </a>
            </h1>
            <p class="site-description">
                <?php
                if ($tagline) {
                    echo esc_html($tagline);
                }
                ?>
            </p>
        <?php } ?>
    </div>
    <nav class="site-navigation" role="navigation">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'primary-menu'));
        } else {
            echo '<a href="' . esc_attr(admin_url('nav-menus.php')) . '">' . esc_html__('Create and attach menu', 'marmot') . '</a>';
        }
        ?>
    </nav>
</header>
