<?php
/**
 * Template part for displaying Portfolio Projects.
 *
 * @since   1.0.0
 * @package olevia
 */

// Default
$project_classes  = 'c-portfolio-item';
$featured_classes = 'c-featured';
$image_size       = 'olevia-featured';

if ( is_page_template( 'page-templates/home.php' ) ) {
  $project_classes  .= ' c-portfolio-item--home';
  $featured_classes .= ' c-featured--home';
  $image_size        = 'olevia-featured-portfolio-home';
}
?>

<article id="project-<?php the_ID(); ?>" <?php post_class( $project_classes ); ?>>

  <?php olevia_print_post_thumbnail( $image_size, $featured_classes ); ?>

  <a href="<?php esc_url( the_permalink() ); ?>">
    <div class="c-portfolio-item__details-ct">
      <div class="c-portfolio-item__details">
      <?php if ( get_post_meta( get_the_ID(), 'm4wp_portfolio_item_details_client', true ) ) : ?>
        <h3 class="c-portfolio-item__client c-portfolio-item__client--home"><?php echo get_post_meta( get_the_ID(), 'm4wp_portfolio_item_details_client', true ); ?></h3>

        <hr class="o-sep o-sep--project-client">
      <?php endif; ?>

      <?php the_title( '<h2 class="c-portfolio-item__title c-portfolio-item__title--home">', '</h2>' ); ?>

      <?php if ( get_the_term_list( $post->ID, 'portfolio_category') ) : ?>
        <span class="c-portfolio-item__category c-portfolio-item__category--home"><?php echo strip_tags( get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' )); ?></span>
      <?php endif; ?>
      </div><!-- .c-portfolio-item__details -->
    </div><!-- .c-portfolio-item__details-ct -->
  </a>
</article><!-- #project-<?php the_ID(); ?> -->
