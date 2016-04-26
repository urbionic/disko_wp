<?php
/**
 * The content sidebar.
 *
 * @since   1.0.0
 * @package olevia
 */

if ( ! is_active_sidebar( 'sidebar-content' ) ) {
  return;
}
?>

<div id="secondary" class="b-sidebar-area" role="complementary">
  <div class="c-widgets">
    <?php dynamic_sidebar( 'sidebar-content' ); ?>
  </div><!-- .c-widgets -->
</div><!-- .b-widget-area -->
