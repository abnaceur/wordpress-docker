<?php
/**
 * Grip Social Icons menu widget
 *
 * @since 1.0.0
 */

if (!class_exists('Grip_Social_Widget')) :

    /**
     * Social widget class.
     */
    class Grip_Social_Widget extends WP_Widget
    {

        /**
         * Constructor.
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'grip-menu-social',
                'description' => esc_html__('Social Menu Widget', 'grip'),
            );
            parent::__construct('grip-social-icons', esc_html__('Grip Social Icons', 'grip'), $opts);
        }

        /**
         * Echo the widget content.
         */
        function widget($args, $instance)
        {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            echo $args['before_widget'];

            if (!empty($title)) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }

            if (has_nav_menu('social-menu')) {
                wp_nav_menu(array('theme_location' => 'social-menu', 'menu_class' => 'social-menu'));
            }

            echo $args['after_widget'];

        }

        /**
         * Update widget instance.
         */
        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            return $instance;
        }

        /**
         * Output the settings update form.
         */
        function form($instance)
        {

            $instance = wp_parse_args((array)$instance, array(
                'title' => esc_html__('Follow Us', 'grip'),
            ));
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'grip'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <?php if (!has_nav_menu('social-menu')) : ?>
            <p>
                <?php esc_html_e('Please create menu and assign it.', 'grip'); ?>
            </p>
        <?php endif; ?>
        <?php
        }
    }

endif;