<?php
/**
 * The template for displaying all single posts.
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>

  <div class="o-container">

    <div id="primary" class="b-content-area">
      <main id="main" class="b-site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'single' ); ?>

          <?php olevia_print_post_author(); ?>

          <?php olevia_print_post_nav(); ?>

          <hr class="o-sep">

          <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php endwhile; // End of the loop. ?>

      </main><!-- .b-site-main -->
    </div><!-- .b-content-area -->

    <?php get_sidebar(); ?>

  </div><!-- .o-container -->

<?php get_footer(); ?>
