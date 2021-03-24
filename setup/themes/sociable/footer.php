<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

/**
 * sociable_footer_primary_content hook
 *
 * @hooked sociable_add_contact_section -  10
 *
 */
do_action( 'sociable_footer_primary_content' );

/**
 * sociable_content_end_action hook
 *
 * @hooked sociable_content_end -  10
 *
 */
do_action( 'sociable_content_end_action' );

/**
 * sociable_content_end_action hook
 *
 * @hooked sociable_footer_start -  10
 * @hooked Sociable_Footer_Widgets->add_footer_widgets -  20
 * @hooked sociable_footer_site_info -  40
 * @hooked sociable_footer_end -  100
 *
 */
do_action( 'sociable_footer' );

/**
 * sociable_page_end_action hook
 *
 * @hooked sociable_page_end -  10
 *
 */
do_action( 'sociable_page_end_action' ); 

?>

<?php wp_footer(); ?>     

</body>
</html>
