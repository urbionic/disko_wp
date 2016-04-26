<?php
/**
 * Template part for displaying posts.
 *
 * @since   1.0.0
 * @package olevia
 */


// Default
$post_classes     = 'c-post';
$featured_classes = 'c-featured';
$image_size       = 'olevia-featured';

// Grid layout
if ( is_archive() || is_home() ) {
  $post_classes     .= ' c-post--grid';
  $featured_classes .= ' c-featured--grid';
  $image_size        = 'olevia-featured-grid';
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
</article><!-- #post-<?php the_ID(); ?> -->
