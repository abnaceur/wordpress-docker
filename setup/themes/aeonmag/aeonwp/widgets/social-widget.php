<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * AeonMag Social Icons menu widget
 *
 * @since 1.0.0
 */

if (!class_exists('AeonMag_Social_Widget')) :

    /**
     * Social widget class.
     */
    class AeonMag_Social_Widget extends WP_Widget
    {
         private function defaults()
        {
            $defaults = array(
                'title'    => esc_html__( 'Follow Us', 'aeonmag' ),
           );
            return $defaults;
        }

        /**
         * Constructor.
         */
        public function __construct()
        {
            $opts = array(
                'classname' => 'aeonmag-menu-social',
                'description' => esc_html__('Social Menu Widget', 'aeonmag'),
            );
            parent::__construct('aeonmag-social-icons', esc_html__('AeonMag Social', 'aeonmag'), $opts);
        }

        /**
         * Widget content.
         */
        public function widget($args, $instance)
        {
            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            echo $args['before_widget'];

            if (!empty($title)) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }

            if (has_nav_menu('social')) {
                wp_nav_menu(array('theme_location' => 'social', 'menu_class' => 'social-menu'));
            }

            echo $args['after_widget'];

        }

        /**
         * Update
         */
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            return $instance;
        }

        /**
         * Form
         */
        public function form($instance)
        {
             $instance  = wp_parse_args( (array )$instance, $this->defaults() );

            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'aeonmag'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <?php if (!has_nav_menu('social')) : ?>
            <p>
                <?php esc_html_e('Go to Appearance > Customize > Menus and create a menu and assign to Social.', 'aeonmag'); ?>
            </p>
        <?php endif; ?>
        <?php
        }
    }

endif;