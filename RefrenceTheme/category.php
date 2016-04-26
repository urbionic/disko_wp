<?php get_header(); ?>
<div id="container">
	<h3><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h3><br />
    <span class="hellbiscuit"><a href="http://www.disko.co.za">Brought to you by disko</a></span>
    <div id="col01">
    <div class="cat-name">Now viewing everything in <span class="category-name"><?php single_cat_title(''); ?></span></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<div class="post" id="post-<?php the_ID(); ?>">
        	<div class="post-upper">
            	<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
                <span class="digg">
				<script type="text/javascript">
				digg_bgcolor = '#ffffff';
				digg_skin = 'compact';
                </script>
				<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script></span>
				<span class="uppercase">Posted <?php the_time('F jS') ?></span> <em>by</em> <span class="uppercase"><?php the_author() ?></span> <em>in</em> <span class="uppercase"><?php the_category(', ') ?></span></div>
            
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img class="cat_img" src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" class="image" /></a>
            <div class="the-content"><?php the_excerpt('Read the rest of this entry &raquo;'); ?><br /><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">READ ON &raquo;</a></div>
        <br clear="all" />
        
        </div>
<?php endwhile; ?>
<?php else: ?>
 <!-- Error message when no post published -->
<?php endif; ?>
<div id="index-nav"><span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span> <span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span></div>
    </div>
    <div id="col02">
    <?php get_sidebar(); ?>
    </div>
    <br clear="all" />
	<?php get_footer(); ?>