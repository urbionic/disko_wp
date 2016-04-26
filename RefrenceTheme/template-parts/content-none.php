<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @see http://codex.wordpress.org/Template_Hierarchy
 *
 * @since   1.0.0
 * @package olevia
 */

?>

<section class="c-nothing-found">

    <h3><?php esc_html_e( 'Nothing Found', 'olevia' ); ?></h3>

    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p>
        <?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'olevia' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
      </p>

    <?php elseif ( is_search() ) : ?>

      <p>
        <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'olevia' ); ?>
      </p>

      <?php get_search_form(); ?>

    <?php else : ?>

      <p>
        <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'olevia' ); ?>
      </p>

      <?php get_search_form(); ?>

    <?php endif; ?>

</section><!-- .c-nothing-found -->
