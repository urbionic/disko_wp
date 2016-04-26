<?php
/**
 * Template Name: Portfolio
 *
 * Custom Home page template.
 *
 * @since   1.0.0
 * @package olevia
 */


$theme_options = olevia_get_options();

// Custom query for custom post type Portfolio loop
if ( is_front_page() ) {
  $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
} else {
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}
$args  = array(
  'post_type'      => 'portfolio',
  'posts_per_page' => $theme_options['portfolio_projects_num'],
  'paged'          => $paged
);
$query = new WP_Query( $args );

get_header(); ?>

  <div id="primary" class="b-content-area b-content-area--full-width">
    <main id="main" class="b-site-main" role="main">

      <header class="c-page-header">
        <?php the_title( '<h2 class="c-page-header__title">', '</h2>' ); ?>
      </header><!-- .c-post__header -->

      <div class="o-container">
        <div class="c-page-content c-page-content--home">

          <?php if ( $query->have_posts() ) : ?>

            <div class="c-portfolio-items">

              <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

              <?php endwhile; ?>

            </div><!-- .c-portfolio-items -->

            <?php olevia_print_posts_nav( $query->max_num_pages ); ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; wp_reset_postdata(); ?>

        </div><!-- .c-page-content -->
      </div><!-- .o-container -->

    </main><!-- .b-site-main -->
  </div><!-- .b-content-area -->

<?php get_footer(); ?>
