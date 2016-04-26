<?php
/**
 * Customizer site header settings.
 *
 * @package olevia
 * @since   1.0.0
 */


if ( ! function_exists( 'olevia_customizer_register_header' ) ) :
/**
 * Register header settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function olevia_customizer_register_header( $wp_customize ) {

  // Section
  $wp_customize->add_section(
    'olevia_header',
    array(
      // 'priority'    => 20,
      'title'       => esc_html__( 'Header', 'olevia' ),
      'description' => esc_html__( 'Header options.', 'olevia' ),
      // 'panel'       => ''
    )
  );

  // Header Padding
  $wp_customize->add_setting(
    'olevia_options[header_b-site__header_padding]',
    array(
      'default'           => 30,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'olevia_sanitize_number_absint',
    )
  );
  $wp_customize->add_control(
    'olevia_options[header_b-site__header_padding]',
    array(
      'label'       => esc_html__( 'Brand Padding', 'olevia' ),
      'description' => esc_html__( 'Enter a number.', 'olevia' ),
      'section'     => 'olevia_header',
      'type'        => 'text'
    )
  );


  // Display search button in primary navigation
  $wp_customize->add_setting(
    'olevia_options[header_display_c-nav-primary-search]',
    array(
      'default'           => 1,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'olevia_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'olevia_options[header_display_c-nav-primary-search]',
    array(
      'label'       => esc_html__( 'Display Search?', 'olevia' ),
      'description' => esc_html__( 'Search button which appears in the primary menu location', 'olevia' ),
      'section'     => 'olevia_header',
      'type'        => 'checkbox'
    )
  );

}
add_action( 'olevia_register_customizer_settings', 'olevia_customizer_register_header' );
endif;


if ( ! function_exists( 'olevia_set_header_settings_defaults' ) ) :
/**
 * Set default values.
 *
 * @since 1.0.0
 */
function olevia_set_header_settings_defaults( $defaults ) {
  $defaults = array_merge( $defaults, array(
    'header_b-site__header_padding'       => 30,
    'header_display_c-nav-primary-search' => 1
  ) );

  return $defaults;
}
add_filter( 'olevia_option_defaults', 'olevia_set_header_settings_defaults' );
endif;
