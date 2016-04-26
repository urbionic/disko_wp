<?php
/**
 * Template Name: Full Width
 *
 * Page template for displaying full width page with no sidebars.
 *
 * @since   1.0.0
 * @package olevia
 */

$featured_classes = 'c-featured';
$image_size       = 'olevia-featured-full';

get_header(); ?>

  <div id="primary" class="b-content-area b-content-area--full-width">
    <main id="main" class="b-site-main" role="main">

      <header class="c-page-header">
        <?php the_title( '<h2 class="c-page-header__title">', '</h2>' ); ?>
      </header><!-- .c-post__header -->

      <div class="o-container">
        <div class="c-page-content">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php olevia_print_post_thumbnail( $image_size, $featured_classes ); ?>

          <div class="o-container__content-full-width">

            <?php get_template_part( 'template-parts/content', 'full-width' ); ?>

            <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;
            ?>
          </div><!-- .o-container__content-full-width -->

        <?php endwhile; // End of the loop. ?>

        </div><!-- .c-page-content -->
      </div><!-- .o-container -->

    </main><!-- .b-site-main -->
  </div><!-- .b-content-area -->

<?php get_footer(); ?>
