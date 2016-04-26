<?php
/**
 * Customizer site footer settings.
 *
 * @package olevia
 * @since   1.0.0
 */


if ( ! function_exists( 'olevia_customizer_register_footer' ) ) :
/**
 * Register footer settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function olevia_customizer_register_footer( $wp_customize ) {

  // Section
  $wp_customize->add_section(
    'olevia_footer',
    array(
      // 'priority'    => 20,
      'title'       => esc_html__( 'Footer', 'olevia' ),
      'description' => esc_html__( 'Footer options.', 'olevia' ),
      // 'panel'       => ''
    )
  );


  // Footer About
  $wp_customize->add_setting(
    'olevia_options[footer_c-footer-about__title]',
    array(
      'default'           => esc_html__( 'About', 'olevia' ),
      'transport'         => 'postMessage',
      'sanitize_callback' => 'olevia_sanitize_html_allowedposttags'
    )
  );
  $wp_customize->add_control(
    'olevia_options[footer_c-footer-about__title]',
    array(
      'label'       => esc_html__( 'About Title', 'olevia' ),
      'description' => esc_html__( 'Title for the section above the footer widgets.', 'olevia' ),
      'section'     => 'olevia_footer',
      'type'        => 'text',
    )
  );

  $wp_customize->add_setting(
    'olevia_options[footer_c-footer-about__desc]',
    array(
      'default'           => esc_html__( 'Olevia is a portfolio and blogging theme with a beautiful home page to show off your work. If you\'re looking for something simple to set up your portfolio site, this theme is for you.', 'olevia' ),
      'transport'         => 'postMessage',
      'sanitize_callback' => 'olevia_sanitize_html_allowedposttags'
    )
  );
  $wp_customize->add_control(
    'olevia_options[footer_c-footer-about__desc]',
    array(
      'label'       => esc_html__( 'About Description', 'olevia' ),
      'description' => esc_html__( 'Description for the section above the footer widgets. <small>Basic HTML allowed</small>', 'olevia' ),
      'section'     => 'olevia_footer',
      'type'        => 'textarea',
    )
  );


  // Footer Copyright
  $wp_customize->add_setting(
    'olevia_options[footer_c-footer-info__copyright]',
    array(
      'default'           => sprintf(
        esc_html__( 'A %sMade4WP%s theme, proudly powered by %sWordPress%s.', 'olevia' ),
        '<a href="' . esc_url( 'https://made4wp.com/' ) . '">',
        '</a>',
        '<a href="' . esc_url( 'http://wordpress.org/' ) . '">',
        '</a>'
      ),
      'transport'         => 'postMessage',
      'sanitize_callback' => 'olevia_sanitize_html_allowedposttags',
    )
  );
  $wp_customize->add_control(
    'olevia_options[footer_c-footer-info__copyright]',
    array(
      'label'       => esc_html__( 'Copyright Text', 'olevia' ),
      'description' => esc_html__( 'Basic HTML tags are allowed.', 'olevia' ),
      'section'     => 'olevia_footer',
      'type'        => 'textarea'
    )
  );

}
add_action( 'olevia_register_customizer_settings', 'olevia_customizer_register_footer' );
endif;


if ( ! function_exists( 'olevia_set_footer_settings_defaults' ) ) :
/**
 * Set default values.
 *
 * @since 1.0.0
 */
function olevia_set_footer_settings_defaults( $defaults ) {
  $defaults = array_merge( $defaults, array(
    'footer_c-footer-about__title'  => esc_html__( 'About', 'olevia' ),
    'footer_c-footer-about__desc'   => esc_html__( 'Olevia is a portfolio and blogging theme with a beautiful home page to show off your work. If you\'re looking for something simple to set up your portfolio site, this theme is for you.', 'olevia' ),
    'footer_c-footer-info__copyright' => sprintf(
        esc_html__( 'A %sMade4WP%s theme, proudly powered by %sWordPress%s.', 'olevia' ),
        '<a href="' . esc_url( 'https://made4wp.com/' ) . '">',
        '</a>',
        '<a href="' . esc_url( 'http://wordpress.org/' ) . '">',
        '</a>'
      )
  ) );

  return $defaults;
}
add_filter( 'olevia_option_defaults', 'olevia_set_footer_settings_defaults' );
endif;
