<?php
if (!class_exists('Gossip_News_One_Column_Post_Widget')) {
    class Gossip_News_One_Column_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('Hot News', 'gossip-news'),
                'post_number' => 5,
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'gossip-news-post-widget',
                esc_html__('AT: Layout 5', 'gossip-news'),
                array('description' => esc_html__('One column News Post Section', 'gossip-news'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $title = esc_attr($instance['title']);
            $post_number = absint($instance['post_number']);


            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'gossip-news'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $title; ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'gossip-news'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
                    <?php esc_html_e('Select Category', 'gossip-news'); ?>
                </label><br/>
                <?php
                $ample_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'gossip-news'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id')),
                    'id' => esc_attr($this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($ample_con_dropown_cat);
                ?>
            </p>
            <hr>
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['post_number'] = absint( $new_instance['post_number'] );

            return $instance;

        }

        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $catid = absint($instance['cat_id']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $post_number = absint($instance['post_number']);


                ?>


                <div class="latest-news block ">
                    <?php if (!empty($title)) { ?>
                        <h3 class="head-title"><span>
                            
                                <?php echo esc_html($title);

                                ?></span></h3>
                    <?php } ?>
                    <div id="latest" class=" latest">

                        <?php
                        $i = 0;
                        $sticky = get_option('sticky_posts');
                        if ($catid != -1) {
                            $home_two_column_section = array(
                                'ignore_sticky_posts' => true,
                                'post__not_in' => $sticky,
                                'cat' => $catid,
                                'posts_per_page' => $post_number,
                                'order' => 'DESC'
                            );
                        } else {
                            $home_two_column_section = array(
                                'ignore_sticky_posts' => true,
                                'post__not_in' => $sticky,
                                'post_type' => 'post',
                                'posts_per_page' => $post_number,
                                'order' => 'DESC'
                            );
                        }

                        $home_two_column_section_query = new WP_Query($home_two_column_section);

                        if ($home_two_column_section_query->have_posts()) {
                            while ($home_two_column_section_query->have_posts()) {
                                $home_two_column_section_query->the_post(); ?>

                                <div class="item slide">
                                    <ul class="list-post">


                                        <li class="clearfix">
                                            <div class="ample-block-style clearfix">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <div class="img-post ">
                                                        <?php
                                                        ample_magazine_post_formats(get_the_ID());

                                                        $image_id = get_post_thumbnail_id();
                                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                                        ?>
                                                        <a href="<?php the_permalink(); ?>"><img class="img-responsive"
                                                                                                 src="<?php echo esc_url($image_url[0]); ?>"
                                                                                                 alt="<?php the_title_attribute();?>"/></a>

                                                    </div>

                                                <?php }
                                                ?>
                                                <?php
                                                if (has_post_thumbnail()) {?>
                                                    <div class="post-cat"><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                <?php } ?>
                                                <div class="ample-content">
                                                    <h2 class="post-title title-medium">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                    <div class="post-meta">

                                                        <span class="post-date black"><?php ample_magazine_posted_on_theme(); ?></span>


                                                    </div>
                                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 25)); ?></p>

                                                    <a href="<?php the_permalink();?>" class="continue-link"><?php esc_html_e('Read More', 'gossip-news'); ?></a>
                                                </div><!-- Post content end -->
                                            </div><!-- Post Block style end -->
                                        </li><!-- Li end -->


                                    </ul><!-- List post 1 end -->

                                </div><!-- Item 1 end -->


                                <?php
                                $i++;
                            }
                            wp_reset_postdata();
                        } ?>


                    </div><!-- Latest News owl carousel end-->
                </div><!--- Latest news end -->


                <?php
                echo $args['after_widget'];
            }
        }

    }
}

add_action('widgets_init', 'Gossip_News_One_post_widget');
function Gossip_News_One_post_widget()
{
    register_widget('Gossip_News_One_Column_Post_Widget');

}
