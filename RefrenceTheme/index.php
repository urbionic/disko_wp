<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see http://codex.wordpress.org/Template_Hierarchy
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>

  <div class="o-container">

    <div id="primary" class="b-content-area">
      <main id="main" class="b-site-main" role="main">

        <?php if ( have_posts() ) : ?>

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
