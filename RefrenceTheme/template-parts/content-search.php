<?php
/**
 * The template part for displaying results in search pages.
 *
 * @see http://codex.wordpress.org/Template_Hierarchy
 *
 * @since   1.0.0
 * @package olevia
 */

// Default
$post_classes     = 'c-post';
$featured_classes = 'c-featured';
$image_size       = 'olevia-featured';

// Full Width page template
if ( is_page_template( 'page-templates/full-width.php' ) ) {
  $post_classes = 'c-post';
  $image_size   = 'olevia-featured-full';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

  <?php olevia_print_post_thumbnail( $image_size, $featured_classes ); ?>

  <header class="c-post__header">
    <?php if ( 'post' === get_post_type() ) : ?>
      <?php olevia_print_post_meta(); ?>
    <?php endif; ?>

    <?php the_title( sprintf( '<h2 class="c-post__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </header><!-- .c-post__header -->

  <div class="c-post__summary">
    <?php olevia_print_the_content(); ?>
  </div><!-- .c-post__content -->
</article><!-- #post-## -->
