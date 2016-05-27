<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="content" class="content_top">
			
				<div class="txt">
				    <h2 class="test"><?php single_cat_title(); ?></h2>
				   
				</div>

				<ul class="menu_thumb"  id="on">

				<?php

$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 88, 'post__not_in' => array($post->ID) ) );
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

				
		
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>