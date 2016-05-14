<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="content" class="content_top">

			

				<div class="txt">
				    <h2><?php single_cat_title(); ?></h2>
				   
				</div>

				<ul class="menu_thumb">

				<?php global $post;
				$categories = get_the_category();
				foreach ($categories as $category) :
				?>
					<?php
					$posts = get_posts('numberposts=20&category='. $category->term_id);
					foreach($posts as $post) :
					?>

					    <li>
					        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					           <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'image' ) ); ?>
					            <!--<img class="cat_img" src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" class="image" />-->
					            <div class="caption">
					                <div>
					                    <strong>"<?php the_title(); ?>".</strong>
					                    <span><?php the_excerpt('Read the rest of this entry &raquo;'); ?></span>
					                </div>
					            </div>
					        </a>
					    </li>
					<?php endforeach; ?>
				<?php endforeach; ?>

				</ul>

				
		
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>