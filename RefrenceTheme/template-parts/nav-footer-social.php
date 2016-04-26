<?php
/**
 * Template part for displaying the footer social navigation (mobile too).
 *
 * @since   1.0.0
 * @package olevia
 */

?>
<?php if ( has_nav_menu( 'footer-social' ) ) : ?>

  <nav class="c-nav-footer-social">
    <?php if ( has_nav_menu( 'footer-social' ) ) : ?>
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'footer-social',
          'menu_id'         => 'footer-social-menu',
          'container'       => false,
          'menu_class'      => 'c-menu-footer-social o-menu o-menu--row',
          'depth'           => 1
        ) );
      ?>
    <?php endif; ?>
  </nav><!-- c-nav-footer -->

<?php endif; // if has nav menu footer-social ?>