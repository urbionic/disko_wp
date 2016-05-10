<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="content" class="content_top">	



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="txt">
    <h2>"<?php the_title(); ?>".&nbsp;</h2>
    <h3><?php the_author() ?>.  <?php the_time('F jS') ?>.</h3>
    <p><?php the_category(', ') ?>.</p>
</div>
<figure class="vid_img">
    <ul>
         <!--<li> of images available in post 
        <li><img src="" alt="" width="100%" /></li> -->
    
    <li><?php the_content(); ?></li>
    </ul>
</figure>
<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
	<article class="post error">
		<h1 class="404">Nothing posted yet</h1>
	</article>
<?php endif; ?>

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