<?php
/**
 * Template part for displaying Portfolio Projects.
 *
 * @since   1.0.0
 * @package olevia
 */

// Default
$project_classes  = 'c-portfolio-item c-portfolio-item--grid';
$featured_classes = 'c-featured c-featured--grid';
$image_size       = 'olevia-featured-portfolio';
?>

<article id="project-<?php the_ID(); ?>" <?php post_class( $project_classes ); ?>>

  <?php olevia_print_post_thumbnail( $image_size, $featured_classes ); ?>

  <?php if ( get_post_meta( get_the_ID(), 'm4wp_portfolio_item_details_client', true ) ) : ?>
    <h3 class="c-portfolio-item__client c-portfolio-item__client--grid"><?php echo get_post_meta( get_the_ID(), 'm4wp_portfolio_item_details_client', true ); ?></h3>
  <?php endif; ?>

  <?php the_title( sprintf( '<h2 class="c-portfolio-item__title c-portfolio-item__title--grid"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

  <?php if ( get_the_term_list( $post->ID, 'portfolio_category' ) ) : ?>
    <span class="c-portfolio-item__category c-portfolio-item__category--grid"><?php echo strip_tags( get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' )); ?></span>
  <?php endif; ?>

</article><!-- #project-<?php the_ID(); ?> -->
