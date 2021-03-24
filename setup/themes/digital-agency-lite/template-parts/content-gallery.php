<?php
/**
 * The template part for displaying post
 *
 * @package Digital Agency Lite 
 * @subpackage digital-agency-lite
 * @since digital-agency-lite 1.0
 */
?>
<?php 
  $digital_agency_lite_archive_year  = get_the_time('Y'); 
  $digital_agency_lite_archive_month = get_the_time('m'); 
  $digital_agency_lite_archive_day   = get_the_time('d'); 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box ">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <article class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'digital_agency_lite_toggle_postdate',true) != '' || get_theme_mod( 'digital_agency_lite_toggle_author',true) != '' || get_theme_mod( 'digital_agency_lite_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('digital_agency_lite_toggle_postdate',true)==1){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('digital_agency_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i> <span class="entry-date"><a href="<?php echo esc_url( get_day_link( $digital_agency_lite_archive_year, $digital_agency_lite_archive_month, $digital_agency_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('digital_agency_lite_toggle_author',true)==1){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('digital_agency_lite_toggle_author_icon','far fa-user')); ?>"></i> <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('digital_agency_lite_toggle_comments',true)==1){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('digital_agency_lite_toggle_comments_icon','fas fa-comments')); ?>"></i> <span class="entry-comments"><?php comments_number( __('0 Comment', 'digital-agency-lite'), __('0 Comments', 'digital-agency-lite'), __('% Comments', 'digital-agency-lite') ); ?></span>
          <?php } ?>
        </div>
      <?php } ?>
      <p>
        <?php $digital_agency_lite_theme_lay = get_theme_mod( 'digital_agency_lite_excerpt_settings','Excerpt');
        if($digital_agency_lite_theme_lay == 'Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if($digital_agency_lite_theme_lay == 'Excerpt'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <?php $excerpt = get_the_excerpt(); echo esc_html( digital_agency_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('digital_agency_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('digital_agency_lite_excerpt_suffix',''));?>
          <?php }?>
        <?php }?>
      </p>
      <?php if( get_theme_mod('digital_agency_lite_button_text','READ MORE') != ''){ ?>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('digital_agency_lite_button_text',__('READ MORE','digital-agency-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('digital_agency_lite_button_text',__('READ MORE','digital-agency-lite')));?></span></a>
        </div>
      <?php } ?>
    </article>
  </div>
</div>