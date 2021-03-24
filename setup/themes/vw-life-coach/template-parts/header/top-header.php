<?php
/**
 * The template part for top header
 *
 * @package VW Life Coach
 * @subpackage vw-life-coach
 * @since vw-life-coach 1.0
 */
?>

<div class="top-bar text-center">
  <div class="container">
    <?php if( get_theme_mod('vw_life_coach_top_bar_text') != ''){ ?>
      <p class="py-2 py-lg-3 py-md-3 mb-0"><?php echo esc_html(get_theme_mod('vw_life_coach_top_bar_text',''));?></p>
    <?php } ?>
  </div>
</div>