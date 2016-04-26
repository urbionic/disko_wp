<?php
/**
 * Customizer site color settings.
 *
 * @package olevia
 * @since   1.0.0
 */


if ( ! function_exists( 'olevia_customizer_register_colors' ) ) :
/**
 * Register color settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function olevia_customizer_register_colors( $wp_customize ) {

  // Theme color
  $colors[] = array(
    'slug'      => 'olevia_options[color_theme]',
    'default'   => '#FF7171',
    'label'     => esc_html__( 'Theme Color', 'olevia' ),
    'priority'  => 1
  );

  // $colors[] = array(
  //   'slug'      => '',
  //   'default'   => '',
  //   'transport' => 'postMessage',
  //   'label'     => esc_html__( '', 'owl' ),
  //   'priority'  => ''
  // );


  /**
   * Loop register color settings.
   */
  foreach( $colors as $color ) {
    $wp_customize->add_setting(
      $color['slug'],
      array(
        'default'           => $color['default'],
        'transport'         => $color['transport'],
        'sanitize_callback' => 'olevia_sanitize_hex_color'
      )
    );
    $wp_customize->add_control(
      $color['slug'],
      array(
        'label'       => $color['label'],
        'description' => $color['description'],
        'section'     => 'colors',
        'type'        => 'color',
        'priority'    => $color['priority']
      )
    );
  }
}
add_action( 'olevia_register_customizer_settings', 'olevia_customizer_register_colors' );
endif;


if ( ! function_exists( 'olevia_set_color_settings_defaults' ) ) :
/**
 * Set default values.
 *
 * @since 1.0.0
 */
function olevia_set_color_settings_defaults( $defaults ) {
  $defaults = array_merge( $defaults, array(
    'color_theme' => '#FF7171'
  ) );

  return $defaults;
}
add_filter( 'olevia_option_defaults', 'olevia_set_color_settings_defaults' );
endif;
