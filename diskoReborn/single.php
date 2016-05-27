<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="content" class="content_top">  

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="txt">
    <h2>"<?php the_title(); ?>"&nbsp;</h2>
    <h3><?php the_time('F jS') ?>.</h3>
    <!--<p><?php the_category(', ') ?>.</p>-->
</div>
<figure class="vid_img">
    <?php the_content(); ?>
</figure>
<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
    <article class="post error">
        <h1 class="404">Nothing posted yet</h1>
    </article>
<?php endif; ?>

<ul class="menu_thumb">

<?php

$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 28, 'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>

        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
               <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'image' ) ); ?>
                <div class="caption">
                    <div>
                        <strong>"<?php the_title(); ?>"</strong>
                        <span><?php the_time('F') ?> <?php the_time('jS') ?></span>
                    </div>
                </div>
            </a>
        </li>
<?php }
wp_reset_postdata(); ?>

</ul>

<?php get_footer(); ?>