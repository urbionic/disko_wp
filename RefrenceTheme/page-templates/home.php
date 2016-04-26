<?php
/**
 * Template Name: Home
 *
 * Custom Home page template.
 *
 * @since   1.0.0
 * @package olevia
 */


$theme_options = olevia_get_options();


// Custom query
$args  = array(
  'post_type'      => 'portfolio',
  'posts_per_page' => $theme_options['home_projects_num']
);
$query = new WP_Query( $args );


get_header(); ?>

  <div class="o-container">

    <div id="primary" class="b-content-area b-content-area--full-width">
      <main id="main" class="b-site-main" role="main">

        <div class="c-page-content c-page-content--home">

          <?php if ( $query->have_posts() ) : ?>

            <div class="c-portfolio-items c-portfolio-items--home">

              <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'portfolio-home' ); ?>

              <?php endwhile; ?>

            </div><!-- .c-portfolio-items -->

            <?php if ( $theme_options['home_display_c-portfolio-view-all'] ) : ?>
              <div class="c-portfolio-view-all">
                <a class="o-btn" href="<?php echo esc_url( $theme_options['home_c-portfolio-view-all_url'] ); ?>">
                  <?php echo esc_html( $theme_options['home_c-portfolio-view-all_text'] ); ?>
                </a>
              </div><!-- .c-portfolio-view-all -->
            <?php endif; ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; wp_reset_postdata(); ?>

        </div><!-- .c-page-content -->

      </main><!-- .b-site-main -->
    </div><!-- .b-content-area -->

  </div><!-- .o-container -->

<?php get_footer(); ?>
