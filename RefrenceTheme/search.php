<?php
/**
 * The template for displaying search results pages.
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>

  <div class="o-container">

    <div id="primary" class="b-content-area">
      <main id="main" class="b-site-main" role="main">

        <?php if ( have_posts() ) : ?>

          <header class="c-page-header">
            <h3 class="c-page-header__title"><?php printf( esc_html__( 'Search Results for: %s', 'olevia' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
          </header><!-- .c-page-header -->

          <div class="c-posts">

            <?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

            <?php endwhile; ?>

            <?php olevia_print_posts_nav(); ?>

          </div><!-- .c-posts -->

        <?php else : ?>

          <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

      </main><!-- .b-site-main -->
    </div><!-- .b-content-area -->


    <?php get_sidebar(); ?>

  </div><!-- .o-container -->

<?php get_footer(); ?>
