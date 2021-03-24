<?php 
if( !function_exists('blogtay_slider_content')) :
	function blogtay_slider_content( $options ){
		$hero_slider = array();

		$options = get_theme_mod( 'theme_options' );
		$number_of_slides = isset($options['hero_slider_number']) ? $options['hero_slider_number'] : 2;

		for( $i=1; $i <=$number_of_slides; $i++ ) {
			$page_id = get_theme_mod( 'hero_slider_page_' . $i );
			if ( ! empty( $page_id ) ) {
				global $post;
				$post = get_post( $page_id );
				setup_postdata($post);
				$hero_slider[] = array(		
					'image' => get_the_post_thumbnail_url( get_the_ID(), 'full'),	
					'title' => get_the_title(get_the_ID()),
					'subtitle' => get_the_excerpt(get_the_ID()),
					'button_url' =>  get_permalink(get_the_ID())
				);
			}
		}
		wp_reset_postdata();		
		// return $hero_slider;
		?>




		<div class="hero-slider">
			<?php 
			if ( count( $hero_slider ) > 0 ) {

				foreach( $hero_slider as $hero):				
					?>
					<div class="hero-slider-item" style="background-image: url('<?php echo esc_url($hero['image']); ?>')">
						<div class="container">
							<div class="hero-caption">							
								<h1><?php echo esc_html($hero['title']); ?></h1>
								<p><?php echo esc_html($hero['subtitle']); ?></p>
								<a href="<?php echo esc_url($hero['button_url']); ?>" title="<?php echo esc_attr(get_theme_mod('hero_slider_button',__('Read More','blogtay'))); ?>" class="btn btn-primary">
									<?php echo esc_html(get_theme_mod('hero_slider_button',__('Read More','blogtay')));?>					
								</a>							
							</div>						
						</div>					
					</div>
					<?php
				endforeach; 
			} else { ?>

				<div class="hero-slider-item" style="background-image: url('<?php echo esc_url(get_header_image()); ?>')">
					<div class="container">
						<div class="hero-caption">							
							<h1><?php echo esc_html('Home', 'blogtay'); ?></h1>
													
						</div>						
					</div>					
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
endif;
add_action('blogtay_slider_action', 'blogtay_slider_content');