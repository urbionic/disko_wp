<?php 
/**
 * 	Template Name: Sidebar/Home Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="content" class="content_top">
		<ul class="menu_thumb" id="on">
			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

				<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
					<h1 class='title'>
						<?php the_title(); // Display the page title ?>
					</h1>
				<?php endif; ?>

					<li>
				        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
				        	<!-- get the proper image url -->
				        	 <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>

				            <!--<img src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" />-->

				            <div class="caption">
				                <div>
				                    <strong><?php the_title(); ?></strong>
				                    <span><?php the_time('F') ?> <?php the_time('jS') ?></span>
				                </div>
				            </div>
				        </a>
				    </li>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
		
	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>