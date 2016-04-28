<nav class="nav-collapse">
    <ul class="menu" id="menu">
    	<li class="<? echo (is_home())?'current_page_item':''; ?>">
     		<a href="<?php echo get_option('home'); ?>/">Home</a>
    	</li>
    	<?php $pages = wp_list_pages('sort_column=menu_order&depth=1&title_li=&echo=0');
			echo $pages; ?>
    </ul>
</nav>