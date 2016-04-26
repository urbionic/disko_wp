<?php
/**
 * The template for displaying all single Portfolio Project.
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>
  <div class="o-container">
    <div id="primary" class="b-content-area b-content-area--full-width">
      <main id="main" class="b-site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'single-portfolio' ); ?>

          <?php olevia_print_post_author(); ?>

          <?php olevia_print_post_nav(); ?>

        <?php endwhile; // End of the loop. ?>

      </main><!-- .b-site-main -->
    </div><!-- .b-content-area -->
  </div>
<?php get_footer(); ?>
