<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="content" class="content_top">	

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="txt">
    <h2><?php the_title(); ?></h2>
</div>
<article class="about">
	<?php the_content(); ?>
</article>

<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
	<article class="post error">
		<h1 class="404">Nothing posted yet</h1>
	</article>
<?php endif; ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>