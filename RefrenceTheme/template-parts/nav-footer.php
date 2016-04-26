<?php
/**
 * Template part for displaying the footer navigation (mobile too).
 *
 * @since   1.0.0
 * @package olevia
 */

?>
<?php if ( has_nav_menu( 'footer' ) ) : ?>

  <nav class="c-nav-footer">
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'footer',
          'menu_id'         => 'footer-menu',
          'container'       => false,
          'menu_class'      => 'c-menu-footer o-menu o-menu--row',
          'depth'           => 1
        ) );
      ?>
    <?php endif; ?>
  </nav><!-- c-nav-footer -->

<?php endif; // if has nav menu footer ?>