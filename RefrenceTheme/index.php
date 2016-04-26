<?php get_header(); ?>
<div id="container">
	<h3><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h3><br />
    <span class="hellbiscuit"><a href="http://www.disko.co.za">Brought to you by disko</a></span>
    <div id="col01">
<?php query_posts($query_string . '&cat=-123'); //excludes micro blog category ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<div class="post" id="post-<?php the_ID(); ?>">
        	<div class="post-upper">
            	<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <span class="digg">
				<script type="text/javascript">
				digg_bgcolor = '#ffffff';
				digg_skin = 'compact';
                </script>
				<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script></span>
				<span class="uppercase">Posted <?php the_time('F jS') ?></span> <em>by</em> <span class="uppercase"><?php the_author() ?></span> <em>in</em> <span class="uppercase"><?php the_category(', ') ?></span></div>
            
            <img src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="image"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" class="image" />
            <div class="the-content"><?php the_content('Read the rest of this entry &raquo;'); ?></div>
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