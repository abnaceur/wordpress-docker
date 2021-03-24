<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ft_directory_listing
 */

$ft_directory_listing_options = ft_directory_listing_theme_options();

$show_prefooter = $ft_directory_listing_options['show_prefooter'];

?>


<footer id="colophon" class="site-footer">


	<?php if ($show_prefooter== 1){ ?>
	    <section class="footer-sec">
	        <div class="container">
	            <div class="row">
	                <?php if (is_active_sidebar('ft_directory_listing_footer_1')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('ft_directory_listing_footer_1') ?>
	                    </div>
	                    <?php
	                else: ft_directory_listing_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('ft_directory_listing_footer_2')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('ft_directory_listing_footer_2') ?>
	                    </div>
	                    <?php
	                else: ft_directory_listing_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('ft_directory_listing_footer_3')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('ft_directory_listing_footer_3') ?>
	                    </div>
	                    <?php
	                else: ft_directory_listing_blank_widget();
	                endif; ?>
	               	<?php if (is_active_sidebar('ft_directory_listing_footer_4')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('ft_directory_listing_footer_4') ?>
	                    </div>
	                    <?php
	                else: ft_directory_listing_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	    </section>
	<?php } ?>

		<div class="site-info">
		 <p><?php esc_html_e('Powered By WordPress', 'ft-directory-listing');
                    esc_html_e(' | ', 'ft-directory-listing') ?>
                    <span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://flawlessthemes.com/theme/ft-directory-listing-best-directory-listing-theme/'); ?>"><?php esc_html_e('FT Directory Listing' , 'ft-directory-listing'); ?></a></span>
                </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
