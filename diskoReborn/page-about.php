<?php
/*
 Template Name: About
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="content" class="content_top">	

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article class="about">
	<div class="img_about">
		<img src="http://localhost:81/disko/wp-content/uploads/2016/05/face2.jpg">
	</div>
	
	<div class="txt_about">
		 <h2><?php the_title(); ?></h2>
		 <?php the_content(); ?>
		</div>
</article>

<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
	<article class="post error">
		<h1 class="404">Nothing posted yet</h1>
	</article>
<?php endif; ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>