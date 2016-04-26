<?php
/**
 * Template part for displaying the primary navigation (mobile too).
 *
 * @since   1.0.0
 * @package olevia
 */


$theme_options = olevia_get_options();
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
<nav id="site-navigation" class="c-nav-primary" role="navigation">

    <div class="c-nav-primary__mobile">
      <div class="c-nav-primary__mobile-overlay"></div>
      <div class="c-nav-primary__mobile-toggle"><i class="fa fa-bars"></i></div>


      <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'menu_id'         => 'c-menu-primary-mobile',
          'container'       => 'div',
          'container_class' => 'c-menu-primary-mobile-ct',
          'menu_class'      => 'c-menu-primary-mobile o-menu o-menu--stacked'
        ) );
      ?>
    </div><!-- .c-nav-primary__mobile -->


    <div class="c-nav-primary__desktop">
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'menu_id'         => 'c-menu-primary-mobile',
          'container'       => false,
          'menu_class'      => 'c-menu-primary o-menu o-menu--row',
        ) );
      ?>
    </div><!-- .c-nav-primary__desktop -->


    <?php if ( $theme_options['header_display_c-nav-primary-search'] ) : ?>
    <div class="c-nav-primary__search">
      <i class="o-icon fa fa-search"></i>
      <?php get_search_form(); ?>
    </div>
    <?php endif; ?>

</nav><!-- c-nav-primary -->
<?php endif; // if has nav menu primary ?>