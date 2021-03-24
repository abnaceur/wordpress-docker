<?php

if (!class_exists('WP_Customize_Control'))
    return NULL;

/**
 * A class to create a dropdown for all categories in your WordPress site
 */
class Opus_Blog_Customize_Category_Dropdown_Control extends WP_Customize_Control
{
    
    /**
     * Render the control's content.
     *
     * @return void
     * @since 1.0.0
     */
    public function render_content()
    {
        $opus_blog_dropdown = wp_dropdown_categories(
            array(
                'name' => 'customize-dropdown-categories' . $this->id,
                'echo' => 0,
                'show_option_none' => esc_html__('&mdash; Select Category &mdash;', 'opus-blog'),
                'option_none_value' => '0',
                'selected' => $this->value(),
            )
        );
        
        // Hackily add in the data link parameter.
        $opus_blog_dropdown = str_replace('<select', '<select ' . $this->get_link(), $opus_blog_dropdown);
        
        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
            $this->label,
            $this->description,
            $opus_blog_dropdown
        );
    }
}