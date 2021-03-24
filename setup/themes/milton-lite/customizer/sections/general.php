<?php

function academiathemes_customizer_define_general_sections( $sections ) {
    $panel           = 'academiathemes' . '_general';
    $general_sections = array();

    $theme_sidebar_states = array(
        'left' => esc_html__('Left', 'milton-lite'),
        'right' => esc_html__('Right', 'milton-lite'),
        'hidden' => esc_html__('Hidden', 'milton-lite')
    );

    $general_sections['general'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'General', 'milton-lite' ),
        'priority' => 4000,
        'options' => array(

            'theme-sidebar-primary'     => array(
                'setting' => array(
                    'default' => 'left',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control' => array(
                    'label' => esc_html__( 'Primary Sidebar', 'milton-lite' ),
                    'description' => esc_html__( 'By default this sidebar appears to the left of the main content.', 'milton-lite' ),
                    'type'  => 'radio',
                    'choices' => $theme_sidebar_states
                ),
            ),

            'theme-display-post-featured-image'    => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display Featured Images in Posts and Pages', 'milton-lite' ),
                    'type'              => 'checkbox'
                )
            ),

        ),
    );


    // PANEL SECTION: HEADER

    $theme_header_style = array(
        'default'   => esc_html__('Default', 'milton-lite'),
        'centered'  => esc_html__('Centered', 'milton-lite')
    );

    $general_sections['header'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Header', 'milton-lite' ),
        'priority' => 4800,
        'options' => array(

            'theme-header-style'     => array(
                'setting' => array(
                    'default' => 'default',
                    'sanitize_callback' => 'academiathemes_sanitize_text'
                ),
                'control' => array(
                    'label' => esc_html__( 'Header Layout', 'milton-lite' ),
                    'type'  => 'radio',
                    'choices' => $theme_header_style
                ),
            ),

        ),
    );

    // PANEL SECTION: HOMEPAGE

    $general_sections['homepage'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Homepage', 'milton-lite' ),
        'priority' => 5000,
        'options' => array(

            'theme-homepage-posts-heading' => array(
                'setting' => array(
                    'default'           => __('Recent Posts','milton-lite'),
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                'control' => array(
                    'label'             => esc_html__( 'Blog Section Heading', 'milton-lite' ),
                    'type'              => 'text',
                ),
            ),

            'theme-milton-display-pages'    => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => '1'
                ),
                'control'               => array(
                    'label'             => __( 'Display Featured Pages on Homepage', 'milton-lite' ),
                    'type'              => 'checkbox'
                )
            ),

            'theme-milton-featured-page-1'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'milton_lite_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Featured Page #1', 'milton-lite' ),
                    'description'       => sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Pages</a>.', 'milton-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php?post_type=page' ) ) ),
                    'type'              => 'select',
                    'choices'           => milton_lite_get_pages()
                ),
            ),

            'theme-milton-featured-page-2'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'milton_lite_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Featured Page #2', 'milton-lite' ),
                    'type'              => 'select',
                    'choices'           => milton_lite_get_pages()
                ),
            ),

            'theme-milton-featured-page-3'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'milton_lite_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Featured Page #3', 'milton-lite' ),
                    'type'              => 'select',
                    'choices'           => milton_lite_get_pages()
                ),
            ),

            'theme-milton-featured-page-4'  => array(
                'setting'               => array(
                    'default'           => 'none',
                    'sanitize_callback' => 'milton_lite_sanitize_pages'
                ),
                'control'               => array(
                    'label'             => esc_html__( 'Featured Page #4', 'milton-lite' ),
                    'type'              => 'select',
                    'choices'           => milton_lite_get_pages()
                ),
            ),

            'theme-milton-display-pages-excerpt'    => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => '1'
                ),
                'control'               => array(
                    'label'             => __( 'Display Excerpts of Featured Pages on Homepage', 'milton-lite' ),
                    'type'              => 'checkbox'
                )
            ),

        ),
    );

    // PANEL SECTION: FOOTER

    $general_sections['footer'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Footer', 'milton-lite' ),
        'priority' => 4900,
        'options' => array(

            'milton_lite_copyright_text' => array(
                'setting' => array(
                    'default'           => __('Copyright &copy; ','milton-lite') . date("Y",time()) . ' ' . get_bloginfo('name'),
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                'control' => array(
                    'label'             => esc_html__( 'Copyright Text', 'milton-lite' ),
                    'type'              => 'text',
                ),
            ),

            'theme-display-footer-credit' => array(
                'setting'               => array(
                    'sanitize_callback' => 'absint',
                    'default'           => 1
                ),
                'control'               => array(
                    'label'             => __( 'Display "Theme by AcademiaThemes"', 'milton-lite' ),
                    'type'              => 'checkbox'
                )
            ),

        ),
    );

    // PANEL SECTION: POSTS

    $general_sections['posts'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Posts', 'milton-lite' ),
        'priority' => 5000,
        'options' => array(

            'theme-hide-post-dates' => array(
                'setting' => array(
                    'sanitize_callback' => 'absint',
                    'default' => 0
                ),
                'control' => array(
                    'label' => __( 'Hide Dates', 'milton-lite' ),
                    'type'  => 'checkbox'
                )
            ),

            'theme-hide-post-categories' => array(
                'setting' => array(
                    'sanitize_callback' => 'absint',
                    'default' => 0
                ),
                'control' => array(
                    'label' => __( 'Hide Categories', 'milton-lite' ),
                    'type'  => 'checkbox'
                )
            ),

            'theme-hide-post-tags' => array(
                'setting' => array(
                    'sanitize_callback' => 'absint',
                    'default' => 0
                ),
                'control' => array(
                    'label' => __( 'Hide Tags', 'milton-lite' ),
                    'type'  => 'checkbox'
                )
            ),

            'theme-hide-post-authorbio' => array(
                'setting' => array(
                    'sanitize_callback' => 'absint',
                    'default' => 0
                ),
                'control' => array(
                    'label' => __( 'Hide Author Bios', 'milton-lite' ),
                    'type'  => 'checkbox'
                )
            ),

        ),
    );

    return array_merge( $sections, $general_sections );
}

add_filter( 'academiathemes_customizer_sections', 'academiathemes_customizer_define_general_sections' );
