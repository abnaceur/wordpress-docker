<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @param null
 * @return null
 *
 * @since Grip 1.1.0
 *
 */
if (!function_exists('grip_front_page')) :

    function grip_front_page()
    {
        ?>
        <?php
        if (is_active_sidebar('grip-home-widget-area')) {
            dynamic_sidebar('grip-home-widget-area');
        }
        global $grip_theme_options;
        $grip_front_page_content = $grip_theme_options['grip-front-page-content'];
        if (false === $grip_front_page_content) {
            if ('posts' == get_option('show_on_front')) {
                ?>
                <div class="ct-post-list">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());
                        endwhile;
                        /**
                         * grip_post_navigation hook
                         * @since Grip 1.0.0
                         *
                         * @hooked grip_posts_navigation -  10
                         */
                        do_action('grip_action_navigation');

                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                </div> <!-- .ct-post-list -->
                <?php
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile; // End of the loop.
            }
        }
    }

    ?>
<?php
endif;
add_action('grip_action_front_page', 'grip_front_page', 10);


/**
 * Header elements.
 *
 * @package grip
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Function to list categories of a post
 *
 * @param int $post_id
 * @return void Lists of categories with its link
 *
 * @since 1.0.0
 *
 */
if (!function_exists('grip_list_category')) :
    function grip_list_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            if (isset($post->ID)) {
                $post_id = $post->ID;
            }
        }
        if (0 == $post_id) {
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if ($categories) {
            $output .= '<span class="cat-name"><i class="fa fa-folder-open"></i>';
            foreach ($categories as $category) {
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;
            }
            $output .= '</span>';
            echo trim($output, $separator);
        }

    }
endif;


/**
 * Function to modify tag clouds font size
 *
 * @param none
 * @return array $args
 *
 * @since 1.0.0
 *
 */
if (!function_exists('grip_tag_cloud_widget')) :
    function grip_tag_cloud_widget($args)
    {
        $args['largest'] = 12; //largest tag
        $args['smallest'] = 12; //smallest tag
        $args['unit'] = 'px'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'grip_tag_cloud_widget');


/**
 * Callback functions for comments
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('grip_commment_list')) :

    function grip_commment_list($comment, $args, $depth)
    {
        $args['avatar_size'] = apply_filters('grip_comment_avatar_size', 50);

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php _e('Pingback:', 'grip'); // WPCS: XSS OK. ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'grip'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>"
                     class="comment-body" <?php grip_do_microdata('comment-body'); ?>>
                <footer class="comment-meta">
                    <?php
                    if (0 != $args['avatar_size']) {
                        echo get_avatar($comment, $args['avatar_size']);
                    }
                    ?>
                    <div class="comment-author-info">
                        <div class="comment-author vcard" <?php grip_do_microdata('comment-author'); ?>>
                            <?php printf('<span itemprop="name" class="fn"><strong>%s</strong></span>', get_comment_author_link()); ?>
                        </div><!-- .comment-author -->

                        <div class="entry-meta comment-metadata">
                            <span><i class="fa fa-calendar"></i><a
                                        href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <time datetime="<?php comment_time('c'); ?>" itemprop="datePublished">
                                    <?php printf( // WPCS: XSS OK.
                                    /* translators: 1: date, 2: time */
                                        _x('%1$s at %2$s', '1: date, 2: time', 'grip'),
                                        get_comment_date(),
                                        get_comment_time()
                                    ); ?>s
                                </time>
                            </a></span>
                            <?php edit_comment_link(__('Edit', 'grip'), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'); ?>
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'add_below' => 'div-comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'before' => '<span class="reply"><i class="fa fa-comment-o"></i> ',
                                'after' => '</span>',
                            )));
                            ?>
                        </div><!-- .comment-metadata -->
                    </div><!-- .comment-author-info -->

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'grip'); // WPCS: XSS OK. ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content" itemprop="text">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
            </article><!-- .comment-body -->
        <?php
        endif;
    }
endif;

/**
 * Add sidebar class in body
 *
 * @since 1.0.0
 *
 */
if (!function_exists('grip_custom_body_class')) :
    function grip_custom_body_class($classes)
    {
        global $grip_theme_options;
        $grip_sidebar = $grip_theme_options['grip-sidebar-archive-page'];
        if (is_singular()) {
            $grip_sidebar = $grip_theme_options['grip-sidebar-blog-page'];
        }
        if (is_front_page()) {
            $grip_sidebar = $grip_theme_options['grip-sidebar-front-page'];
        }
        $grip_sticky_sidebar = $grip_theme_options['grip-enable-sticky-sidebar'];
        $grip_site_layout = $grip_theme_options['grip-site-layout-options'];
        $body_background = esc_attr(get_background_color());
        if ($body_background != 'fff' && $body_background != 'ffffff') {
            $classes[] = 'ct-bg';
        }
        if ($grip_site_layout == 'boxed') {
            $classes[] = 'ct-boxed';
        } else {
            $classes[] = 'ct-full-layout';
        }
        if ($grip_sticky_sidebar == 1) {
            $classes[] = 'ct-sticky-sidebar';
        }
        if ($grip_sidebar == 'no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($grip_sidebar == 'left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($grip_sidebar == 'middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'right-sidebar';
        }
        return $classes;
    }
endif;

add_filter('body_class', 'grip_custom_body_class');

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 *
 */
if (!function_exists('grip_excerpt_more')) :
    function grip_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'grip_excerpt_more');


/**
 * Add class in post list
 *
 * @since 1.0.0
 *
 */
add_filter('post_class', 'grip_post_column_class');
function grip_post_column_class($classes)
{
    global $grip_theme_options;
    if (!is_singular()) {
        $classes[] = esc_attr($grip_theme_options['grip-column-blog-page']);
    }
    return $classes;
}

/**
 * Google Fonts
 *
 * @since Grip 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('grip_google_fonts') ) :
    function grip_google_fonts() {
        $grip_google_fonts =  array(
            'ABeeZee:400,400italic' => 'ABeeZee',
            'Abel' => 'Abel',
            'Abril+Fatface' => 'Abril Fatface',
            'Aldrich' => 'Aldrich',
            'Alegreya:400,400italic,700,900' => 'Alegreya',
            'Alex+Brush' => 'Alex Brush',
            'Alfa+Slab+One' => 'Alfa Slab One',
            'Amaranth:400,400italic,700' => 'Amaranth',
            'Andada' => 'Andada',
            'Anton' => 'Anton',
            'Archivo+Black' => 'Archivo Black',
            'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
            'Arimo:400,400italic,700' => 'Arimo',
            'Arvo:400,400italic,700' => 'Arvo',
            'Asap:400,400italic,700' => 'Asap',
            'Bangers' => 'Bangers',
            'BenchNine:400,700' => 'BenchNine',
            'Bevan' => 'Bevan',
            'Bitter:400,400italic,700' => 'Bitter',
            'Bree+Serif' => 'Bree Serif',
            'Cabin:400,400italic,500,600,700' => 'Cabin',
            'Cabin+Condensed:400,500,600,700' => 'Cabin Condensed',
            'Cantarell:400,400italic,700' => 'Cantarell',
            'Carme' => 'Carme',
            'Cherry+Cream+Soda' => 'Cherry Cream Soda',
            'Cinzel:400,700,900' => 'Cinzel',
            'Comfortaa:400,300,700' => 'Comfortaa',
            'Cookie' => 'Cookie',
            'Covered+By+Your+Grace' => 'Covered By Your Grace',
            'Crete+Round:400,400italic' => 'Crete Round',
            'Crimson+Text:400,400italic,600,700' => 'Crimson Text',
            'Cuprum:400,400italic' => 'Cuprum',
            'Dancing+Script:400,700' => 'Dancing Script',
            'Didact+Gothic' => 'Didact Gothic',
            'Droid+Sans:400,700' => 'Droid Sans',
            'Domine' => 'Domine',
            'Dosis:400,300,600,800' => 'Dosis',
            'Droid+Serif:400,400italic,700' => 'Droid Serif',
            'Economica:400,700,400italic' => 'Economica',
            'EB+Garamond' => 'EB Garamond',
            'Exo:400,300,400italic,600,800' => 'Exo',
            'Exo +2:400,300,400italic,600,700,900' => 'Exo 2',
            'Fira+Sans:400,500' => 'Fira Sans',
            'Fjalla+One' => 'Fjalla One',
            'Francois+One' => 'Francois One',
            'Fredericka+the+Great' => 'Fredericka the Great',
            'Fredoka+One' => 'Fredoka One',
            'Fugaz+One' => 'Fugaz One',
            'Great+Vibes' => 'Great Vibes',
            'Handlee' => 'Handlee',
            'Hammersmith+One' => 'Hammersmith One',
            'Hind:400,300,600,700' => 'Hind',
            'Inconsolata:400,700' => 'Inconsolata',
            'Indie+Flower' => 'Indie Flower',
            'Istok+Web:400,400italic,700' => 'Istok Web',
            'Josefin+Sans:400,600,700,400italic' => 'Josefin Sans',
            'Josefin+Slab:400,400italic,700,600' => 'Josefin Slab',
            'Jura:400,300,500,600' => 'Jura',
            'Karla:400,400italic,700' => 'Karla',
            'Kaushan+Script' => 'Kaushan Script',
            'Kreon:400,300,700' => 'Kreon',
            'Lateef' => 'Lateef',
            'Lato:400,300,400italic,900,700' => 'Lato',
            'Libre+Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Limelight' => 'Limelight',
            'Lobster' => 'Lobster',
            'Lobster+Two:400,700,700italic' => 'Lobster Two',
            'Lora:400,400i' => 'Lora',
            'Maven+Pro:400,500,700,900' => 'Maven Pro',
            'Merriweather:400,400italic,300,900,700' => 'Merriweather',
            'Merriweather+Sans:400,400italic,700,800' => 'Merriweather Sans',
            'Monda:400,700' => 'Monda',
            'Montserrat:400,700' => 'Montserrat',
            'Muli:400,300italic,300' => 'Muli',
            'News+Cycle:400,700' => 'News Cycle',
            'Noticia+Text:400,400italic,700' => 'Noticia Text',
            'Noto+Sans:400,400italic,700' => 'Noto Sans',
            'Noto+Serif:400,400italic,700' => 'Noto Serif',
            'Nunito:400,300,700' => 'Nunito',
            'Old+Standard +TT:400,400italic,700' => 'Old Standard TT',
            'Open+Sans:400,400italic,600,700' => 'Open Sans',
            'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed',
            'Oswald:400,300,700' => 'Oswald',
            'Oxygen:400,300,700' => 'Oxygen',
            'Pacifico' => 'Pacifico',
            'Passion+One:400,700,900' => 'Passion One',
            'Pathway+Gothic+One' => 'Pathway Gothic One',
            'Patua+One' => 'Patua One',
            'Poiret+One' => 'Poiret One',
            'Pontano+Sans' => 'Pontano Sans',
            'Play:400,700' => 'Play',
            'Playball' => 'Playball',
            'Playfair+Display:400,400italic,700,900' => 'Playfair Display',
            'PT+Sans:400,400italic,700' => 'PT Sans',
            'PT+Sans+Caption:400,700' => 'PT Sans Caption',
            'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
            'PT+Serif:400,400italic,700' => 'PT Serif',
            'Quattrocento+Sans:400,700,400italic' => 'Quattrocento Sans',
            'Questrial' => 'Questrial',
            'Quicksand:400,700' => 'Quicksand',
            'Raleway:400,300,500,600,700,900' => 'Raleway',
            'Righteous' => 'Righteous',
            'Roboto:400,500,300,700,400italic' => 'Roboto',
            'Roboto+Condensed:400,300,400italic,700' => 'Roboto Condensed',
            'Roboto+Slab:400,300,700' => 'Roboto Slab',
            'Rokkitt:400,700' => 'Rokkitt',
            'Ropa+Sans:400,400italic' => 'Ropa Sans',
            'Russo+One' => 'Russo One',
            'Sanchez:400,400italic' => 'Sanchez',
            'Satisfy' => 'Satisfy',
            'Shadows+Into+Light' => 'Shadows Into Light',
            'Sigmar+One' => 'Sigmar One',
            'Signika:400,300,700' => 'Signika',
            'Six+Caps' => 'Six Caps',
            'Slabo+27px' => 'Slabo 27px',
            'Source+Sans+Pro:400,400italic,600,900,300' => 'Source Sans Pro',
            'Squada+One' => 'Squada One',
            'Tangerine:400,700' => 'Tangerine',
            'Tinos:400,400italic,700' => 'Tinos',
            'Titillium+Web:400,300,400italic,700,900' => 'Titillium Web',
            'Ubuntu:400,400italic,500,700' => 'Ubuntu',
            'Ubuntu+Condensed' => 'Ubuntu Condensed',
            'Varela+Round' => 'Varela Round',
            'Vollkorn:400,400italic,700' => 'Vollkorn',
            'Voltaire' => 'Voltaire',
            'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz'
        );
        return apply_filters( 'grip_google_fonts', $grip_google_fonts );
    }
endif;


/**
 * Enqueue the list of fonts.
 */
function grip_customizer_fonts() {
    wp_enqueue_style( 'grip_customizer_fonts', 'https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abril+Fatface|Aldrich|Alegreya|Alex+Brush|Alfa+Slab+One|Amaranth|Andada|Anton|Archivo+Black|Archivo+Narrow|Arimo|Arimo|Arvo|Asap|Bangers|BenchNine|Bevan|Bitter|Bree+Serif|Cabin|Cabin+Condensed|Cantarell|Carme|Cherry+Cream+Soda|Cinzel|Comfortaa|Cookie|Covered+By+Your+Grace|Crete+Round|Crimson+Text|Cuprum|Dancing+Script|Didact+Gothic|Droid+Sans|Domine|Dosis|Droid+Serif|Economica|EB+Garamond|Exo|Exo|Fira+Sans|Fjalla+One|Francois+One|Fredericka+the+Great|Fredoka+One|Fugaz+One|Great+Vibes|Handlee|Hammersmith+One|Hind|Inconsolata|Indie+Flower|Istok+Web|Josefin+Sans|Josefin+Slab|Jura|Karla|Kaushan+Script|Kreon|Lateef|Lato|Lato|Libre+Baskerville|Limelight|Lobster|Lobster+Two|Lora|Maven+Pro|Merriweather|Merriweather+Sans|Monda|Montserrat|Muli|News+Cycle|Noticia+Text|Noto+Sans|Noto+Serif|Nunito|Old+Standard +TT|Open+Sans|Open+Sans+Condensed|Oswald|Oxygen|Pacifico|Passion+One|Passion One|Pathway+Gothic+One|Patua+One|Poiret+One|Pontano+Sans|Play|Playball|Playfair+Display|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Quattrocento+Sans|Questrial|Quicksand|Raleway|Righteous|Roboto|Roboto+Condensed|Roboto+Slab|Rokkitt|Ropa+Sans|Russo+One|Sanchez|Satisfy|Shadows+Into+Light|Sigmar+One|Signika|Six+Caps|Slabo+27px|Source+Sans+Pro|Squada+One|Tangerine|Tinos|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Voltaire|Yanone+Kaffeesatz', array(), null );
}
add_action( 'customize_controls_print_styles', 'grip_customizer_fonts' );
add_action( 'customize_preview_init', 'grip_customizer_fonts' );

add_action(
    'customize_controls_print_styles',
    function() {
        ?>
        <style>
            <?php
            $arr = array( 'ABeeZee','Abel','Abril+Fatface','Aldrich','Alegreya','Alex+Brush','Alfa+Slab+One','Amaranth','Andada','Anton','Archivo+Black','Archivo+Narrow','Arimo','Arimo','Arvo','Asap','Bangers','BenchNine','Bevan','Bitter','Bree+Serif','Cabin','Cabin+Condensed','Cantarell','Carme','Cherry+Cream+Soda','Cinzel','Comfortaa','Cookie','Covered+By+Your+Grace','Crete+Round','Crimson+Text','Cuprum','Dancing+Script','Didact+Gothic','Droid+Sans','Domine','Dosis','Droid+Serif','Economica','EB+Garamond','Exo','Exo','Fira+Sans','Fjalla+One','Francois+One','Fredericka+the+Great','Fredoka+One','Fugaz+One','Great+Vibes','Handlee','Hammersmith+One','Hind','Inconsolata','Indie+Flower','Istok+Web','Josefin+Sans','Josefin+Slab','Jura','Karla','Kaushan+Script','Kreon','Lateef','Lato','Lato','Libre+Baskerville','Limelight','Lobster','Lobster+Two','Lora','Maven+Pro','Merriweather','Merriweather+Sans','Monda','Montserrat','Muli','News+Cycle','Noticia+Text','Noto+Sans','Noto+Serif','Nunito','Old+Standard +TT','Open+Sans','Open+Sans+Condensed','Oswald','Oxygen','Pacifico','Passion+One','Passion One','Pathway+Gothic+One','Patua+One','Poiret+One','Pontano+Sans','Play','Playball','Playfair+Display','PT+Sans','PT+Sans+Caption','PT+Sans+Narrow','PT+Serif','Quattrocento+Sans','Questrial','Quicksand','Raleway','Righteous','Roboto','Roboto+Condensed','Roboto+Slab','Rokkitt','Ropa+Sans','Russo+One','Sanchez','Satisfy','Shadows+Into+Light','Sigmar+One','Signika','Six+Caps','Slabo+27px','Source+Sans+Pro','Squada+One','Tangerine','Tinos','Titillium+Web','Ubuntu','Ubuntu+Condensed','Varela+Round','Vollkorn','Voltaire','Yanone+Kaffeesatz');

            foreach ( $arr as $font ) {
                $font_family = str_replace("+", " ", $font);
                echo '.customize-control select option[value*="' . $font . '"] {font-family: ' . $font_family . '; font-size: 22px;}';
            }
            ?>
        </style>
        <?php
    }
);

/**
 * WooCommerce support added and work for some default woo settings
 */
if ( class_exists( 'WooCommerce' ) ) {
    
    // Remove Cross Sells From Default Position
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    
    // Add them back UNDER the Cart Table
    add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

    // Display Cross Sells on 3 columns instead of default 4
    add_filter( 'woocommerce_cross_sells_columns', 'grip_change_cross_sells_columns' );
    
    // Change post column to 4
    function grip_change_cross_sells_columns( $columns ) {
        return 4;
    }
    // remove support for product gallery zoom
    remove_theme_support( 'wc-product-gallery-zoom' );
    
    // support product library lightbox
    add_theme_support( 'wc-product-gallery-lightbox' );
    
    // Enable product slider
    add_theme_support( 'wc-product-gallery-slider' );
}