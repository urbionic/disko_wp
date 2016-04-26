<?php
/**
 * Template Name: Blog Posts
 *
 * Custom page template for displaying blog posts.
 *
 * @since   1.0.0
 * @package olevia
 */


// Custom query
if ( is_front_page() ) {
  $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
} else {
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}
$args  = array(
  'post_type'      => 'post',
  'posts_per_page' => get_option( 'posts_per_page' ),
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
        <div class="c-page-content">

          <?php if ( $query->have_posts() ) : ?>

            <div class="c-posts">

              <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

              <?php endwhile; ?>

            </div><!-- .c-posts -->

            <?php olevia_print_posts_nav( $query->max_num_pages ); ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; wp_reset_postdata(); ?>

        </div><!-- .c-page-content -->
      </div><!-- .o-container -->

    </main><!-- .b-site-main -->
  </div><!-- .b-content-area -->

<?php get_footer(); ?>
