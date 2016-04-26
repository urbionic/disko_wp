<?php
/**
 * The template used for displaying Full Width page template content.
 *
 * @since   1.0.0
 * @package olevia
 */


$post_classes = 'c-post c-post--full-width';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

  <div class="c-post__content">
    <?php olevia_print_the_content(); ?>
  </div><!-- .c-post__content -->

  <footer class="c-post__footer">
    <?php olevia_print_post_footer(); ?>
  </footer><!-- .c-post-footer -->
</article><!-- #post-## -->

