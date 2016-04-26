<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since   1.0.0
 * @package olevia
 */


get_header(); ?>

  <div class="o-container">

    <div id="primary" class="b-content-area">
      <main id="main" class="b-site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'page' ); ?>

          <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php endwhile; ?>

      </main><!-- .b-site-main -->
    </div><!-- .b-content-area -->

    <?php get_sidebar(); ?>

  </div><!-- .o-container -->

<?php get_footer(); ?>
