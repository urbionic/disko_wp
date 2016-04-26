<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @since   1.0.0
 * @package olevia
 */


if ( ! function_exists( 'olevia_print_post_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time,
 * author and comments.
 *
 * @since  1.0.0
 */
function olevia_print_post_meta() {
  // Date
  $time_string = '<time class="c-post__date published updated" datetime="%1$s">%2$s</time>';

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() )
  );

  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'olevia' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );


  if ( 'post' === get_post_type() ) {
    echo '<div class="c-post__meta c-post__meta--header">';
      // Date
      echo '<span class="c-posted-on">' . $posted_on . '</span>';
    echo '</div><!-- .c-post__meta -->';
  }
}
endif;


if ( ! function_exists( 'olevia_print_post_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since  1.0.0
 */
function olevia_print_post_footer() {
  // Do nothing for pages.
  if ( 'post' !== get_post_type() ) {
    return;
  }

  $categories_list = get_the_category_list( ', ' );
  $tags_list       = get_the_tag_list( '', ', ' );

  echo '<div class="c-post__meta c-post__meta--footer">';
    if ( $categories_list && olevia_categorized_blog() ) {
      printf( '<div class="c-post__cats"><i class="fa fa-folder"></i>' . esc_html__( 'Posted in %1$s', 'olevia' ) . '</div>', $categories_list ); // WPCS: XSS OK.
    }
    if ( $tags_list ) {
      printf( '<div class="c-post__tags"><i class="fa fa-tags"></i>' . esc_html__( 'Tagged %1$s', 'olevia' ) . '</div>', $tags_list ); // WPCS: XSS OK.
    }
  echo '</div><!-- c-post__meta--footer -->';
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function olevia_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'olevia_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,

      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'olevia_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so olevia_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so olevia_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in olevia_categorized_blog.
 */
function olevia_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'olevia_categories' );
}
add_action( 'edit_category', 'olevia_category_transient_flusher' );
add_action( 'save_post',     'olevia_category_transient_flusher' );


if ( ! function_exists( 'olevia_print_post_thumbnail' ) ) :
/**
 * Prints custom the_post_thumbnail().
 *
 * @since 1.0.0
 *
 * @param  string $size Post thumbnail size.
 */
function olevia_print_post_thumbnail( $image_size = '', $featured_classes = '' ) {
  if ( ! has_post_thumbnail() ) {
    return;
  }

  // Print
  echo '<div class="' . $featured_classes . '">';
    if ( is_singular() && ! is_home() && ! is_page_template( 'page-templates/portfolio.php' ) ) {
      the_post_thumbnail( $image_size );
    }
    else {
      echo '<a href="' . esc_url( get_permalink() ) . '">';
        the_post_thumbnail( $image_size );
      echo '</a>';
    }
  echo '</div><!-- .c-featured -->';
}
endif;


if ( ! function_exists( 'olevia_print_post_author' ) ) :
/**
 * Print post author info on single blog post page.
 *
 * @since 1.0.0
 */
function olevia_print_post_author() {
  if ( 'post' !== get_post_type() ) {
    return;
  }

  global $post;

  $author_ID = $post->post_author;
  $avatar    = get_avatar( $author_ID, 80 );
  $name      = get_the_author_meta( 'display_name', $author_ID );
  $desc      = get_the_author_meta( 'description', $author_ID );
  $posts_url = get_author_posts_url( $author_ID );

  // HTML
  $html  = '<div class="c-post-author">';
    $html .= '<div class="c-post-author__info">';
      $html .= '<div class="c-post-author__avatar">' . $avatar . '</div>';
      $html .= '<h3 class="c-post-author__name">';
        $html .= '<a href="' . esc_url( $posts_url ) . '">' . esc_html( $name ) . '</a>';
      $html .= '</h3>';
      $html .= '<div class="c-post-author__desc">' . $desc . '</div>';
    $html .= '</div><!-- .c-post-author__meta -->';
  $html .= '</div><!-- .c-post-author -->';

  echo $html;
}
endif;


if ( ! function_exists( 'olevia_print_the_content' ) ) :
/**
 * Print custom the_content(). Combines excerpt, read more link
 * and the content into one function.
 *
 * - Prints automatically trimmed excerpt from the content as default.
 * - If read more tag is set, prints the content and read more tag.
 * - If custom excerpt is set, prints custom excerpt.
 *
 * Also includes wp_link_pages().
 * @see   https://codex.wordpress.org/Function_Reference/wp_link_pages
 *
 * @since 1.0.0
 */
function olevia_print_the_content() {
  global $post;

  // Posts loop pages
  if ( is_home() || is_archive() || is_search() || is_page_template( 'page-templates/home.php' ) ) {
    if ( strpos( $post->post_content, '<!--more-->' ) ) {
      the_content( '' );
      echo '<div class="c-post__read-more"><a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read More', 'olevia' ) . '</a></div>';
    }
    elseif ( is_page_template( 'page-templates/home.php' ) ) {
      the_excerpt();
    }
    else {
      the_excerpt();
    }
  }
  // Singular pages
  else {
    the_content();

    wp_link_pages( array(
      'before'   => '<div class="c-post__pages">' . esc_html__( 'Pages', 'olevia' ) . ':',
      'after'    => '</div><!-- .c-post__pages -->',
      'pagelink' => '<span class="c-post__page">%</span>'
    ) );
  }
}
endif;


if ( ! function_exists( 'olevia_print_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since  1.0.0
 */
function olevia_print_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $prev = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next = get_adjacent_post( false, '', false );

  if ( ! $next && ! $prev ) {
    return;
  }

  // Change arrow icon if it's RTL
  if ( is_rtl() ) {
    $prev_icon = 'fa-chevron-right';
    $next_icon = 'fa-chevron-left';
  }
  else {
    $prev_icon = 'fa-chevron-left';
    $next_icon = 'fa-chevron-right';
  }
  ?>
  <nav class="c-post-nav" role="navigation">
    <h2 class="u-screen-reader-text"><?php esc_html_e( 'Post navigation', 'olevia' ); ?></h2>
    <div class="c-post-nav__links">
      <?php if ( $prev ) : ?>
      <div class="c-post-nav__link c-post-nav__link--prev">
        <h5><?php previous_post_link( '%link', '<i class="fa ' . esc_attr( $prev_icon ) . '"></i> %title' ); ?></h5>
      </div>
      <?php endif; ?>
      <?php if ( $next ) : ?>
      <div class="c-post-nav__link c-post-nav__link--next">
        <h5><?php next_post_link( '%link', '%title <i class="fa ' . esc_attr( $next_icon ) . '"></i>' ); ?></h5>
      </div>
      <?php endif; ?>
    </div><!-- .c-nav-post__links -->
  </nav><!-- .c-nav-post -->
  <?php
}
endif;


if ( ! function_exists( 'olevia_print_posts_nav' ) ) :
/**
 * Display posts navigation when available.
 *
 * @since 1.0.0
 *
 * @todo Check this function when WordPress 4.3 is released.
 *
 * @param int $max_pages Max number of pages of WP Query.
 */
function olevia_print_posts_nav( $max_pages = '' ) {
  // If no custom WP query is set, use global WP query
  if ( '' === $max_pages ) {
    $max_pages = $GLOBALS['wp_query']->max_num_pages;
  }

  // Do nothing if there's only one page.
  if ( $max_pages < 2 ) {
    return;
  }

  // Print HTML
  ?>
  <nav class="c-posts-nav c-posts-nav--paginated" role="navigation">
    <h2 class="u-screen-reader-text"><?php esc_html_e( 'Posts navigation', 'olevia' ); ?></h2>
    <div class="c-posts-nav__links">
      <?php
        echo paginate_links( array(
          'mid_size'  => 1,
          'prev_next' => false,
          'total' => $max_pages,
        ) );
      ?>
    </div>
  </nav><!-- .c-posts-nav -->
  <?php
}
endif;


if ( ! function_exists( 'olevia_print_comments_nav' ) ) :
/**
 * Display navigation when applicable.
 *
 * @since  1.0.0
 */
function olevia_print_comments_nav() {
  // Are there comments to navigate through?
  if ( get_comment_pages_count() < 1 && ! get_option( 'page_comments' ) ) {
    return;
  }

  ?>
    <nav id="c-comments-nav" class="c-comments-nav c-comments-nav--paginated" role="navigation">
      <span class="u-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'olevia' ); ?></span>
      <div class="c-comments-nav__links">
        <?php
          paginate_comments_links( array(
            'mid_size'  => 1,
            'prev_next' => false,
          ) );
        ?>
      </div><!-- .c-comment-nav__links -->
    </nav><!-- c-comment-nav -->
  <?php
}
endif;


if ( ! function_exists( 'olevia_list_comments' ) ) :
/**
 * Prints custom comments list.
 *
 * @since 1.0.0
 */
function olevia_list_comments( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;

  if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'c-comment' ); ?>>
    <div class="c-comment__body">
      <?php esc_html_e( 'Pingback:', 'olevia' ); ?>
      <?php comment_author_link(); ?>
      <?php edit_comment_link( esc_html__( 'Edit', 'olevia' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .comment-body-->
  </li>

  <?php else : ?>

  <?php
    /**
     * Classes to add to comment li tag.
     */
    $comment_classes = 'c-comment';
    $comment_classes .= empty( $args['has_children'] ) ? '' : ' comment-parent';
  ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment_classes ); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="c-comment__body">

      <div class="c-comment__avatar">
        <?php echo get_avatar( $comment, 60 ); ?>
      </div>

      <header class="c-comment__header">
        <div class="c-comment__meta vcard">
          <span class="c-comment__author-name"><?php echo get_comment_author_link(); ?></span>

          <div class="c-comment__date">
            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
              <time datetime="<?php comment_time( 'c' ); ?>">
                <?php
                printf(
                  esc_html_x( '%1$s at %2$s', '1: comment post date, 2: comment post time', 'olevia' ),
                  get_comment_date(),
                  get_comment_time()
                );
                ?>
              </time>
            </a>
          </div><!-- .comment-date -->
        </div><!-- .comment-meta -->


        <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="c-comment__awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'olevia' ); ?></p>
        <?php endif; ?>
      </header><!-- .comment-header -->


      <div class="c-comment__content">
        <?php comment_text(); ?>

        <?php
          comment_reply_link( array_merge( $args, array(
            'add_below' => 'div-comment',
            'depth'     => $depth,
            'max_depth' => $args['max_depth'],
            'before'    => '<div class="c-comment__reply">',
            'after'     => '</div>',
          ) ) );
        ?>
      </div><!-- .comment-content -->
    </article>
  </li>

  <?php endif;
}
endif;


if ( ! function_exists( 'olevia_comment_form' ) ) :
/**
 * Print custom comment form.
 *
 * @since 1.0.0
 */
function olevia_comment_form() {

  $commenter = wp_get_current_commenter();
  $req       = get_option( 'require_name_email' );
  $aria_req  = ( $req ? " aria-required='true'" : '' );

  $placeholder_author   = esc_html__( 'Name', 'olevia' );
  $placeholder_email    = esc_html__( 'Email', 'olevia' );
  $placeholder_url      = esc_html__( 'Website', 'olevia' );
  $placeholder_comment  = esc_html__( 'Comment', 'olevia' );


  // custom inputs
  $fields = array(
    'author' =>
      '<div class="c-comment-form__author">
        <input id="author" name="author" class="c-comment-form__control" type="text" placeholder="' . $placeholder_author . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />
      </div>',

    'email' =>
      '<div class="c-comment-form__email">
      <input id="email" name="email" class="c-comment-form__control" type="text" placeholder="' . $placeholder_email . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />
      </div>',

    'url' =>
      '<div class="c-comment-form__url">
        <input id="url" name="url" class="c-comment-form__control" type="text" placeholder="' . $placeholder_url . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
      </div>',
  );

  // custom textarea
  $comment_field =
    '<div class="c-comment-form__comment">
      <textarea id="comment" name="comment" class="c-comment-form__textarea" placeholder="' . $placeholder_comment .  ( $req ? '*' : '' ) . '"aria-required="true" rows="6"></textarea>
    </div>';


  $comment_form_args = array(
    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'        => $comment_field,
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
    'label_submit'         => esc_html__( 'Post Comment', 'olevia' ),
    'title_reply'          => esc_html__( 'Leave a Comment', 'olevia' ),
    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'olevia'),
  );


  /**
   * Hack and add CSS classes as WP has not supported
   * functionality to do so cleanly (yet?).
   *
   * @since   1.0.0
   */
  // Cache comment form
  ob_start();
  comment_form( $comment_form_args );
  $comment_form_html = ob_get_clean();

  // Replace outer most container class
  $comment_form_html = str_replace( 'class="comment-respond"', 'class="c-comment-respond"', $comment_form_html );
  // Replace reply title class
  $comment_form_html = str_replace( 'class="comment-reply-title"', 'class="comment-reply-title c-comment-respond__reply-title"', $comment_form_html );
  // Add cancel reply class
  $comment_form_html = str_replace( 'id="cancel-comment-reply-link"', 'id="cancel-comment-reply-link" class="c-comment-respond__cancel-reply"', $comment_form_html );
  // Replace comment form class
  $comment_form_html = str_replace( 'class="comment-form"', 'class="c-comment-form"', $comment_form_html );


  echo $comment_form_html;
}
endif;

