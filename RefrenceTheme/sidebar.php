<div id="about-box">
  <ul class="pages">
    <li class="<? echo (is_home())?'current_page_item':''; ?>"><a href="<?php echo get_option('home'); ?>/">Home</a></li>
    <?php $pages = wp_list_pages('sort_column=menu_order&depth=1&title_li=&echo=0');
			echo $pages; ?>
  </ul>
  <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <input name="s" type="text" class="txt-field" id="s" value="<?php the_search_query(); ?>" />
    <input type="submit" id="searchsubmit" class="btn-search" value="Search &raquo;" />
  </form>
  <span class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Get the feed in RSS &raquo;</a></span> <span class="bookmark"><a href="javascript:;" onclick="bookmark('http://www.disko.co.za/','Disko')">Bookmark this site &raquo;</a></span> </div>
<div id="categories">
  <ul>
    <?php wp_list_categories('orderby=name&title_li='); ?>
  </ul>
</div>
<div id="sponsor-box">
  <div class="title">Links</div>
  <div class="sponsor"><a href="http://www.behance.net/FerdiDisko"><img src="<?php bloginfo('stylesheet_directory'); ?>/ads/disko_blog.gif" alt="" border="0" /></a></div>
  <div class="sponsor"><a href="http://vimeo.com/channels/101482"><img src="<?php bloginfo('stylesheet_directory'); ?>/ads/disko_vimeo.gif" alt="" border="0" /></a></div>
  <div class="meta"><!--<a href="#">Submit a link &raquo;</a>--></div>
</div>
