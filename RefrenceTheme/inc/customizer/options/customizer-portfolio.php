<?php
/**
 * Customizer site portfolio page template settings.
 *
 * @package olevia
 * @since   1.0.0
 */


if ( ! function_exists( 'olevia_customizer_register_portfolio' ) ) :
/**
 * Register home settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function olevia_customizer_register_portfolio( $wp_customize ) {

  // Section
  $wp_customize->add_section(
    'olevia_portfolio',
    array(
      // 'priority'    => 10,
      'title'       => esc_html__( 'Portfolio Page', 'olevia' ),
      'description' => esc_html__( 'Portfolio Page options.', 'olevia' ),
      // 'panel'       => ''
    )
  );

  // Custom settings and controls
  $wp_customize->add_setting(
    'olevia_options[portfolio_projects_num]',
    array(
      'default'           => 9,
      'sanitize_callback' => 'olevia_sanitize_number_absint',
    )
  );
  $wp_customize->add_control(
    'olevia_options[portfolio_projects_num]',
    array(
      'label'       => esc_html__( 'Number of Projects to Display.', 'olevia' ),
      'description' => esc_html__( 'Enter a number.', 'olevia' ),
      'section'     => 'olevia_portfolio',
      'type'        => 'text',
    )
  );


  $wp_customize->add_setting(
    'olevia_options[portfolio_projects_columns]',
    array(
      'default'           => 'col_3',
      'sanitize_callback' => 'olevia_sanitize_options',
    )
  );
  $wp_customize->add_control(
    'olevia_options[portfolio_projects_columns]',
    array(
      'label'       => esc_html__( 'Number of Columns to Display Portfolio Items.', 'olevia' ),
      'description' => esc_html__( 'Once you have decided on the number of columns, use a plugin like Regenerate Thumbnails to refresh your images. This will fix any image sizes appearing incorrectly.', 'olevia' ),
      'section'     => 'olevia_portfolio',
      'type'        => 'select',
      'choices'     => array(
        'col_3' => '3',
        'col_4' => '4',
      )
    )
  );
}
add_action( 'olevia_register_customizer_settings', 'olevia_customizer_register_portfolio' );
endif;


if ( ! function_exists( 'olevia_set_portfolio_settings_defaults' ) ) :
/**
 * Set default values.
 *
 * @since 1.0.0
 */
function olevia_set_portfolio_settings_defaults( $defaults ) {
  $defaults = array_merge( $defaults, array(
    'portfolio_projects_num'     => 9,
    'portfolio_projects_columns' => 'col_3'
  ) );

  return $defaults;
}
add_filter( 'olevia_option_defaults', 'olevia_set_portfolio_settings_defaults' );
endif;
