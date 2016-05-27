<?php
/**
 * The template for displaying category page.
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="content" class="content_top">
			
				<div class="txt">
				    <h2 class="test"><?php single_cat_title(); ?></h2>
				   
				</div>

				<ul class="menu_thumb"  id="on">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
<?php endwhile; ?>
<?php else: ?>
<p>No categories</p>
<?php endif; ?>

				</ul>

				
		
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>