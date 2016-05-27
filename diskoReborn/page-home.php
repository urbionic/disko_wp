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
			<?php
			$args=array(
			'tag' => 'featured',
			'showposts'=>25, // set how much to show on homepage
			'caller_get_posts'=>1
			 );

			 $my_query = new WP_Query($args);

			    if( $my_query->have_posts() ) {
			     
			      while ($my_query->have_posts()) : $my_query->the_post(); ?>
			        <li>
							        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
							        	
							        	<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
							            <div class="caption">
							                <div>
							                    <strong><?php the_title(); ?></strong>
							                    <span><?php the_time('F') ?> <?php the_time('jS') ?></span>
							                </div>
							            </div>
							        </a>
							    </li>
			       <?php
			      endwhile;
			    } //if ($my_query)
			  wp_reset_query();  // Restore global post data stomped by the_post().
			?>
		</ul>	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>