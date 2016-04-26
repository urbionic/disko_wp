<?php
/**
 * The template for displaying search form.
 *
 * @since   1.0.0
 * @package olevia
 */
?>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'olevia' ); ?></span>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'olevia' ); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'olevia' ); ?>" />
  </label>
  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'olevia' ); ?>" />
</form>
