 <?php get_header(); ?>
 <ul class="menu_thumb" id="on">
    <!-- repeating li for home page thumbs -->

    <?php   query_posts($query_string . '&cat=-166,-193'); //excludes micro blog category
  if (have_posts()) : while (have_posts()) : the_post(); ?>

    <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" />
            <div class="caption">
                <div>
                    <strong><?php the_title(); ?></strong>
                    <span><?php the_time('F') ?> <?php the_time('jS') ?></span>
                </div>
            </div>
        </a>
    </li>

    <?php endwhile; ?>
    <?php else: ?>
     <!-- Error message when no post published -->
    <?php endif; ?>
    <!-- END repeating li for home page thumbs -->
</ul>
<?php get_footer(); ?>