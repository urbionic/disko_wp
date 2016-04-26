<?php
/**
 * The footer sidebar.
 *
 * @since   1.0.0
 * @package olevia
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
  return;
}
?>

<div id="secondary" class="b-sidebar-footer-area" role="complementary">
  <div class="o-container">
    <div class="c-widgets c-widgets--footer u-clearfix">
      <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div><!-- .c-widgets -->
  </div>
</div><!-- .b-widget-area -->
