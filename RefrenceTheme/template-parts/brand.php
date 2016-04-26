<?php
/**
 * Template part for displaying the site's branding.
 *
 * @since   1.0.0
 * @package olevia
 */

?>


<div class="c-brand">

   <?php if ( has_custom_logo() ) : ?>

    <div class="c-brand__logo">
      <?php if ( is_front_page() && is_home() ) : ?>
        <h1 class="u-screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
      <?php else : ?>
        <h2 class="u-screen-reader-text"><?php bloginfo( 'name' ); ?></h2>
      <?php endif; ?>
      <span class="u-screen-reader-text"><?php bloginfo( 'description' ); ?></span>
      <?php the_custom_logo(); ?>
    </div><!-- .c-brand__logo -->

  <?php elseif ( get_header_image() ) : ?>

    <div class="c-brand__logo-image">
      <?php if ( is_front_page() && is_home() ) : ?>
        <h1 class="u-screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
      <?php else : ?>
        <h2 class="u-screen-reader-text"><?php bloginfo( 'name' ); ?></h2>
      <?php endif; ?>
      <span class="u-screen-reader-text"><?php bloginfo( 'description' ); ?></span>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
      </a>
    </div>

  <?php else : ?>

    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="c-brand__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <span><?php bloginfo( 'name' ); ?></span>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="c-brand__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <span><?php bloginfo( 'name' ); ?></span>
        </a>
      </h2>
    <?php endif; ?>
    <p class="c-brand__tagline u-screen-reader-text"><?php bloginfo( 'description' ); ?></p>

  <?php endif; ?>

</div><!-- .site-branding -->
