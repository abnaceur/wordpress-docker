<?php
/**
 * Confact Info Widget Section
 *
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
class Blog99_Contact_Info_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'blog99_contact_info_section_widget', // Base ID
			esc_html__( 'Blog99: Contact Info', 'blog99' ), //Widget Name
			array( 'description' => esc_html__( 'Display contact information', 'blog99' ), ) // Args
		);
	}

	/**
     * Widget Form Section
     */
	public function form( $instance ) {
		$defaults = array(
            'title'			        => esc_html__( 'Contact Info', 'blog99' ),
            'contact_shot_desc'     =>  '',

            'blog99_address_icon'       =>  'fa fa-map-marker',
            'blog99_address_title'      =>  esc_html__('Address ','blog99'),
            'blog99_address_value'      =>  esc_html__('Barlin','blog99'),

            'blog99_phone_icon'         =>  'fa fa-phone',
            'blog99_phone_title'        =>  esc_html__('Phone','blog99'),
            'blog99_phone_value'        =>  esc_html__('012-345-6789','blog99'),

            'blog99_email_icon'         =>  'fa fa-envelope-o',
            'blog99_email_title'        =>  esc_html__('Email ','blog99'),
            'blog99_email_value'        =>  esc_html__('example@gmail.com','blog99'),

            'blog99_mobile_icon'         =>  'fa fa-mobile',
            'blog99_mobile_title'        =>  esc_html__('Mobile ','blog99'),
            'blog99_mobile_value'        =>  esc_html__('012-345-6789','blog99'),

            'blog99_fax_icon'           =>  'fa fa-print',
            'blog99_fax_title'          =>  esc_html__('Fax ','blog99'),
            'blog99_fax_value'          =>  esc_html__('012-345-6789','blog99'),

            'blog99_website_icon'       =>  'fa fa-globe',
            'blog99_website_title'      =>  esc_html__('Website ','blog99'),
            'blog99_website_value'      =>  esc_html__('example.com','blog99'),

            'blog99_skype_icon'         =>  'fa fa-globe',
            'blog99_skype_title'        =>  esc_html__('Skype ','blog99'),
            'blog99_skype_value'        =>  esc_html__('example.com','blog99'),
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title', 'blog99' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>
  
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'contact_shot_desc' ) ); ?>"><?php esc_html_e( 'Short Desc', 'blog99' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contact_shot_desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_shot_desc' ) ); ?>" value="<?php echo esc_attr($instance['contact_shot_desc']); ?>"/>
        </p>
        
        <!-- contact address -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Address','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_address_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_address_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_address_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_address_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_address_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_address_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_address_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_address_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_address_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_address_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_address_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_address_value']); ?>"/>
            </p>

        </div>
        <!-- end contact address -->

        <!-- contact phone -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Phone','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_phone_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_phone_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_phone_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_phone_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_phone_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_phone_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_phone_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_phone_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_phone_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_phone_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_phone_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_phone_value']); ?>"/>
            </p>

        </div>
        <!-- end contact phone -->


        <!-- contact email -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Email','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_email_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_email_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_email_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_email_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_email_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_email_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_email_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_email_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_email_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_email_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_email_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_email_value']); ?>"/>
            </p>

        </div>
        <!-- end contact email -->


        <!-- contact mobile -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Mobile','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_mobile_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_mobile_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_mobile_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_mobile_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_mobile_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_mobile_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_mobile_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_mobile_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_mobile_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_mobile_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_mobile_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_mobile_value']); ?>"/>
            </p>

        </div>
        <!-- end contact mobile -->

        <!-- contact Fax -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Fax','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_fax_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_fax_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_fax_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_fax_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_fax_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_fax_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_fax_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_fax_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_fax_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_fax_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_fax_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_fax_value']); ?>"/>
            </p>

        </div>
        <!-- end contact fax -->
        

        <!-- contact Website -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Website','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_website_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_website_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_website_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_website_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_website_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_website_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_website_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_website_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_website_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_website_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_website_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_website_value']); ?>"/>
            </p>

        </div>
        <!-- end contact website -->


        <!-- contact Skype -->
        <div class="blog99-contact-info-wrapper">
            <h4><?php esc_html_e('Skype','blog99'); ?></h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_skype_icon' ) ); ?>"><?php echo esc_html__( 'Icons:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_skype_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_skype_icon' ) ); ?>" value="<?php echo esc_attr($instance['blog99_skype_icon']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_skype_title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_skype_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_skype_title' ) ); ?>" value="<?php echo esc_attr($instance['blog99_skype_title']); ?>"/>
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'blog99_skype_value' ) ); ?>"><?php echo esc_html__( 'Value:', 'blog99' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog99_skype_value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog99_skype_value' ) ); ?>" value="<?php echo esc_attr($instance['blog99_skype_value']); ?>"/>
            </p>

        </div>
        <!-- end contact skype -->


	<?php

	}

    /**
     * Post Update
     */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'contact_shot_desc' ]        = sanitize_text_field( $new_instance[ 'contact_shot_desc' ] );
        
        $instance[ 'blog99_address_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_address_icon' ] );
        $instance[ 'blog99_address_title' ]        = sanitize_text_field( $new_instance[ 'blog99_address_title' ] );
        $instance[ 'blog99_address_value' ]        = sanitize_text_field( $new_instance[ 'blog99_address_value' ] );
        
        $instance[ 'blog99_phone_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_phone_icon' ] );
        $instance[ 'blog99_phone_title' ]        = sanitize_text_field( $new_instance[ 'blog99_phone_title' ] );
        $instance[ 'blog99_phone_value' ]        = sanitize_text_field( $new_instance[ 'blog99_phone_value' ] );

        $instance[ 'blog99_email_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_email_icon' ] );
        $instance[ 'blog99_email_title' ]        = sanitize_text_field( $new_instance[ 'blog99_email_title' ] );
        $instance[ 'blog99_email_value' ]        = sanitize_text_field( $new_instance[ 'blog99_email_value' ] );
        
        $instance[ 'blog99_mobile_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_mobile_icon' ] );
        $instance[ 'blog99_mobile_title' ]        = sanitize_text_field( $new_instance[ 'blog99_mobile_title' ] );
        $instance[ 'blog99_mobile_value' ]        = sanitize_text_field( $new_instance[ 'blog99_mobile_value' ] );

        $instance[ 'blog99_fax_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_fax_icon' ] );
        $instance[ 'blog99_fax_title' ]        = sanitize_text_field( $new_instance[ 'blog99_fax_title' ] );
        $instance[ 'blog99_fax_value' ]        = sanitize_text_field( $new_instance[ 'blog99_fax_value' ] );

        $instance[ 'blog99_website_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_website_icon' ] );
        $instance[ 'blog99_website_title' ]        = sanitize_text_field( $new_instance[ 'blog99_website_title' ] );
        $instance[ 'blog99_website_value' ]        = sanitize_text_field( $new_instance[ 'blog99_website_value' ] );
      
        $instance[ 'blog99_skype_icon' ]        = sanitize_text_field( $new_instance[ 'blog99_skype_icon' ] );
        $instance[ 'blog99_skype_title' ]        = sanitize_text_field( $new_instance[ 'blog99_skype_title' ] );
        $instance[ 'blog99_skype_value' ]        = sanitize_text_field( $new_instance[ 'blog99_skype_value' ] );
      
		return $instance;
	}


    /**
     * Front End Display
     */
	public function widget( $args, $instance ) {
		extract( $args );

        //blog99 author info
		$title              = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__('About Author','blog99');	
        $home_blog_title    = apply_filters( 'widget_title', $title , $instance, $this->id_base );
        $contact_shot_desc              = ( ! empty( $instance['contact_shot_desc'] ) ) ? sanitize_text_field( $instance['contact_shot_desc'] ) : '';	

        //address
        $blog99_address_icon                = ( ! empty( $instance['blog99_address_icon'] ) ) ? sanitize_text_field( $instance['blog99_address_icon'] ) : '';	
        $blog99_address_title               = ( ! empty( $instance['blog99_address_title'] ) ) ? sanitize_text_field( $instance['blog99_address_title'] ) : '';	
        $blog99_address_value               = ( ! empty( $instance['blog99_address_value'] ) ) ? sanitize_text_field( $instance['blog99_address_value'] ) : '';	
        
        //phone
        $blog99_phone_icon                = ( ! empty( $instance['blog99_phone_icon'] ) ) ? sanitize_text_field( $instance['blog99_phone_icon'] ) : '';	
        $blog99_phone_title               = ( ! empty( $instance['blog99_phone_title'] ) ) ? sanitize_text_field( $instance['blog99_phone_title'] ) : '';	
        $blog99_phone_value               = ( ! empty( $instance['blog99_phone_value'] ) ) ? sanitize_text_field( $instance['blog99_phone_value'] ) : '';	

        //email
        $blog99_email_icon                = ( ! empty( $instance['blog99_email_icon'] ) ) ? sanitize_text_field( $instance['blog99_email_icon'] ) : '';	
        $blog99_email_title               = ( ! empty( $instance['blog99_email_title'] ) ) ? sanitize_text_field( $instance['blog99_email_title'] ) : '';	
        $blog99_email_value               = ( ! empty( $instance['blog99_email_value'] ) ) ? sanitize_text_field( $instance['blog99_email_value'] ) : '';	

        //mobile
        $blog99_mobile_icon                = ( ! empty( $instance['blog99_mobile_icon'] ) ) ? sanitize_text_field( $instance['blog99_mobile_icon'] ) : '';	
        $blog99_mobile_title               = ( ! empty( $instance['blog99_mobile_title'] ) ) ? sanitize_text_field( $instance['blog99_mobile_title'] ) : '';	
        $blog99_mobile_value               = ( ! empty( $instance['blog99_mobile_value'] ) ) ? sanitize_text_field( $instance['blog99_mobile_value'] ) : '';	

        //fax
        $blog99_fax_icon                = ( ! empty( $instance['blog99_fax_icon'] ) ) ? sanitize_text_field( $instance['blog99_fax_icon'] ) : '';	
        $blog99_fax_title               = ( ! empty( $instance['blog99_fax_title'] ) ) ? sanitize_text_field( $instance['blog99_fax_title'] ) : '';	
        $blog99_fax_value               = ( ! empty( $instance['blog99_fax_value'] ) ) ? sanitize_text_field( $instance['blog99_fax_value'] ) : '';	

        //website
        $blog99_website_icon                = ( ! empty( $instance['blog99_website_icon'] ) ) ? sanitize_text_field( $instance['blog99_website_icon'] ) : '';	
        $blog99_website_title               = ( ! empty( $instance['blog99_website_title'] ) ) ? sanitize_text_field( $instance['blog99_website_title'] ) : '';	
        $blog99_website_value               = ( ! empty( $instance['blog99_website_value'] ) ) ? sanitize_text_field( $instance['blog99_website_value'] ) : '';	


        //skpye
        $blog99_skype_icon                = ( ! empty( $instance['blog99_skype_icon'] ) ) ? sanitize_text_field( $instance['blog99_skype_icon'] ) : '';	
        $blog99_skype_title               = ( ! empty( $instance['blog99_skype_title'] ) ) ? sanitize_text_field( $instance['blog99_skype_title'] ) : '';	
        $blog99_skype_value               = ( ! empty( $instance['blog99_skype_value'] ) ) ? sanitize_text_field( $instance['blog99_skype_value'] ) : '';	


		// Latest Posts
		echo wp_kses_post( $before_widget );
	?>
        <div class="blog99-footer-contact-info">
            <?php if( $home_blog_title ): ?>
                <h2 class="widget-title"><?php echo esc_html( $home_blog_title ); ?><span class="effect"></span></h2>
            <?php endif; ?>

            <?php if(  $contact_shot_desc ): ?>
                <div class="blog99-contact-info-desc">
                    <?php echo esc_html( $contact_shot_desc ); ?>
                </div>
            <?php endif; ?>

            <ul class="blog99-contact-info-widget">


                <?php if( !empty( $blog99_address_icon ) ||  !empty( $blog99_address_title ) || !empty( $blog99_address_value )): ?>
                    <!-- address -->
                    <li class="address">
                        <?php if( !empty( $blog99_address_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_address_icon ); ?>"></i>
                        <?php endif; ?>

                        <span class="blog99-info-wrap">
                            <?php if(!empty( $blog99_address_title )): ?>
                                <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_address_title ); ?></span>
                            <?php endif; ?>
                             <?php if(!empty( $blog99_address_value )): ?>
                                <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_address_value ); ?></span>
                            <?php endif; ?>
                            
                        </span>
                    </li>
                    <!-- end address -->
                <?php endif; ?>

                <?php if( !empty( $blog99_phone_icon ) ||  !empty( $blog99_phone_title ) || !empty( $blog99_phone_value )): ?>
                    <!-- phone -->
                    <li class="phone">
                        <?php if( !empty( $blog99_phone_icon )): ?>
                            <i class="<?php echo esc_attr( $blog99_phone_icon ); ?>"></i>
                        <?php endif; ?>
                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_phone_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_phone_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_phone_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_phone_value ); ?></span>
                            <?php endif; ?>

                        </span>
                    </li>
                    <!-- end phone -->
                <?php endif; ?>


                <?php if( !empty( $blog99_email_icon ) ||  !empty( $blog99_email_title ) || !empty( $blog99_email_value )): ?>
                    <!-- email -->
                    <li class="email">
                        <?php if( !empty( $blog99_email_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_email_icon ); ?>"></i>
                        <?php endif; ?>
                        
                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_email_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_email_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_email_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_email_value ); ?></span>
                            <?php endif; ?>
                        </span>
                    </li>
                    <!-- end email -->
                <?php endif; ?>


                <?php if( !empty( $blog99_mobile_icon ) ||  !empty( $blog99_mobile_title ) || !empty( $blog99_mobile_value )): ?>
                    <!-- mobile -->
                    <li class="mobile">
                        <?php if( !empty( $blog99_mobile_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_mobile_icon ); ?>"></i>
                        <?php endif; ?>
                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_mobile_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_mobile_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_mobile_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_mobile_value ); ?></span>
                            <?php endif; ?>
                        </span>
                    </li>
                    <!-- end mobile -->
                <?php endif; ?>


                <?php if( !empty( $blog99_fax_icon ) ||  !empty( $blog99_fax_title ) || !empty( $blog99_fax_value )): ?>
                    <!-- fax -->
                    <li class="fax">
                        <?php if( !empty( $blog99_fax_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_fax_icon ); ?>"></i>
                        <?php endif; ?>

                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_fax_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_fax_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_fax_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_fax_value ); ?></span>
                            <?php endif; ?>
                        </span>
                    </li>
                    <!-- end fax -->
                <?php endif; ?>


                <?php if( !empty( $blog99_website_icon ) ||  !empty( $blog99_website_title ) || !empty( $blog99_website_value )): ?>
                    <!-- website -->
                    <li class="website">
                        <?php if( !empty( $blog99_website_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_website_icon ); ?>"></i>
                        <?php endif; ?>

                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_website_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_website_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_website_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_website_value ); ?></span>
                            <?php endif; ?>
                        </span>
                    </li>
                    <!-- end website -->
                <?php endif; ?>

                <?php if( !empty( $blog99_skype_icon ) ||  !empty( $blog99_skype_title ) || !empty( $blog99_skype_value )): ?>
                    <!-- skype -->
                    <li class="skype">
                        <?php if( !empty( $blog99_skype_icon )): ?>
                        <i class="<?php echo esc_attr( $blog99_skype_icon ); ?>"></i>
                        <?php endif; ?>
                        <span class="blog99-info-wrap">
                            <?php if( !empty( $blog99_skype_title )): ?>
                            <span class="blog99-contact-title d-block"><?php echo esc_html( $blog99_skype_title ); ?></span>
                            <?php endif; ?>
                            <?php if( !empty( $blog99_skype_value )): ?>
                            <span class="blog99-contact-text d-block"><?php echo esc_html( $blog99_skype_value ); ?></span>
                            <?php endif; ?>
                        </span>
                    </li>
                    <!-- end skype -->
                <?php endif; ?>

            </ul>
        </div>
	<?php
		echo wp_kses_post( $after_widget );
	}
}
// Register The Category Posts
function blog99_contact_info_widget_config() {
    register_widget( 'Blog99_Contact_Info_Widget' );
}
add_action( 'widgets_init', 'blog99_contact_info_widget_config' );