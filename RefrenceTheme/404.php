<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>

  <div id="primary" class="b-content-area b-content-area--full-width">
    <main id="main" class="b-site-main" role="main">

      <header class="c-page-header">
        <h3 class="c-page-header__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'olevia' ); ?></h3>
      </header><!-- .c-page-header -->

      <div class="o-container">
        <div class="c-page-content c-page-content--404">
          <p>
            <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'olevia' ); ?>
          </p>

          <?php get_search_form(); ?>
        </div><!-- .page-content -->
      </div><!-- .o-container -->

    </main><!-- .b-site-main -->
  </div><!-- .b-content-area -->

<?php get_footer(); ?>
