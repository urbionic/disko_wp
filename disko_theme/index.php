<?php get_header(); ?>
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
    <!-- repeater <li> of posts by same category -->
    <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
          
            <img class="cat_img" src="<?php bloginfo('stylesheet_directory'); ?>/post-images/<?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?>" alt="" border="0" class="image" />
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

    <!-- <li id="on">
        #on shows current active post from category - highlights thumbnail 
        <a href="" title="">
            <img src="" alt="" title="" />
            <div class="caption">
                <div>
                    <strong>"Title".</strong>
                    <span>Agency + Date.</span>
                </div>
            </div>
        </a>
    </li>-->
</ul>
<?php get_footer(); ?>