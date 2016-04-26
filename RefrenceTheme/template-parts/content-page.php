<?php
/**
 * The template used for displaying page content in page.php
 *
 * @since   1.0.0
 * @package olevia
 */

// Default
$post_classes     = 'c-post';
$featured_classes = 'c-featured';
$image_size       = 'olevia-featured';

// full width
if ( is_page_template( 'page-templates/full-width.php' ) ) {
  $post_classes .= ' c-post--full-width';
  $image_size    = 'olevia-featured-full';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

  <?php olevia_print_post_thumbnail( $image_size, $featured_classes ); ?>

  <header class="c-post__header">
    <?php the_title( '<h2 class="c-post__title">', '</h2>' ); ?>
  </header><!-- .c-post__header -->

  <div class="c-post__content">
    <?php olevia_print_the_content(); ?>
  </div><!-- .c-post__content -->

  <footer class="c-post__footer">
    <?php olevia_print_post_footer(); ?>
  </footer><!-- .c-post-footer -->
</article><!-- #post-## -->

