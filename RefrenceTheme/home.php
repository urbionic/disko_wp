<?php get_header(); ?>
<div id="container">
	<h3><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h3><br />
    <span class="hellbiscuit"><a href="http://www.disko.co.za">Brought to you by disko</a></span>
    <div id="col01">
	
<!-- die latest blog post stuff -->
<!-- <h4 class="blog_heading">Latest updates</h4> -->  <!-- dink aan `n naam hiervoor -->
<?php	query_posts('posts_per_page=3&cat=166'); // fetch only category 166 (blogs) and display
  if (have_posts()) : while (have_posts()) : the_post(); ?>
		
    	<div class="home-post" id="post-<?php the_ID(); ?>">
        	<div class="home-post-upper">
        	<div class="title"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
            <a href="<?php the_permalink() ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" /></a>
            <div class="date"><?php the_time('F') ?> <?php the_time('jS') ?></div>
            </div>
            <div class="excerpt" onclick="window.location='<?php the_permalink() ?>';"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></div>
            <div class="meta"><!--<span class="comments"><?php comments_popup_link('No Comments', '1 comment', '% comments'); ?></span>--><span class="author"><a href="<?php the_permalink() ?>">Read On &raquo;</a></span></div>
        </div>
<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
<?php endif; ?>
<!-- paging vir blog posts -->
<div id="page-nav"><span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span> <span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span></div>	
	
<div style="clear:both"></div> <!-- moet tussen 2 blocks code sit -->

<!-- blog stuff eindig -->	

<!-- jou beste werk -->	
<h4 class="blog_heading">Selected Work</h4> <!-- dink aan `n naam hiervoor -->
<?php	query_posts($query_string . '&cat=-166,-193'); //excludes micro blog category
  if (have_posts()) : while (have_posts()) : the_post(); ?>

    	<div class="home-post" id="post-<?php the_ID(); ?>">
        	<div class="home-post-upper">
        	<div class="title"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
            <a href="<?php the_permalink() ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" /></a>
            <div class="date"><?php the_time('F') ?> <?php the_time('jS') ?></div>
            </div>
            <div class="excerpt" onclick="window.location='<?php the_permalink() ?>';"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></div>
            <div class="meta"><!--<span class="comments"><?php comments_popup_link('No Comments', '1 comment', '% comments'); ?></span>--><span class="author"><a href="<?php the_permalink() ?>">Read On &raquo;</a></span></div>
        </div>
<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
<?php endif; ?>
        
        <div id="page-nav"><span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span> <span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span></div>
		
<div style="clear:both"></div>


    </div>
    <div id="col02">
    <?php get_sidebar(); ?>
    </div>
    <br clear="all" />
    <!--Track Theme-->
	<?php if (function_exists('trackTheme')) { ?>
	<?php trackTheme("gumball-special");  ?>
	<?php } ?>
    <!--Track Theme-->
	<?php get_footer(); ?>