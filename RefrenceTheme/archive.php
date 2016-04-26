<?php
/**
 * The template for displaying archive pages.
 *
 * @see http://codex.wordpress.org/Template_Hierarchy
 *
 * @since   1.0.0
 * @package olevia
 */

get_header(); ?>

  <div id="primary" class="b-content-area b-content-area--full-width">
    <main id="main" class="b-site-main" role="main">

      <header class="c-page-header">
        <?php the_archive_title( '<h2 class="c-page-header__title">', '</h2>' ); ?>
      </header><!-- .c-page-header -->

      <div class="o-container">
        <div class="c-page-content">

          <?php if ( have_posts() ) : ?>

            <div class="c-posts">

              <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

              <?php endwhile; ?>

            </div><!-- .c-posts -->

            <?php olevia_print_posts_nav(); ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>

        </div><!-- .c-page-content -->
      </div><!-- .o-container -->

    </main><!-- .b-site-main -->
  </div><!-- .b-content-area -->

<?php get_footer(); ?>
