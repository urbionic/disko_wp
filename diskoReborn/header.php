<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta content="Riaan Retief" name="author" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>
<!-- fb add -->
<meta property="og:title" content="" />
<!--fb  add -->
<meta property="og:url" content="http://www.disko.co.za/" />
<meta property="og:image" content="" />
<!-- fb add -->
<meta property="og:description" content="" />
<!-- fb add -->
<meta property="og:site_name" content="" />
<!-- fb add -->
<meta property="og:locale" content="en_EN">
<meta property="fb:admins" content="" /> <!-- get info from fb regarding admin id - prob ferdi -->
<!-- fb add -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato' type='text/css'>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/base.css" media="screen" type="text/css" />
<!-- concatenate + add to functions on clean up -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/responsive-nav.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/menu_mov.css" media="screen" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/responsive-nav.js"></script>
<script type="text/javascript">
/* google analytics */
</script>


<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body <?php body_class(); ?>>

 <div class="wrapper" id="top">
	<div class="header">
	    <h1>
	       <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
	            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png">
	       </a>
	   </h1>
	   <h4 class="site-description">
			<?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
		</h4>
	     <nav class="nav-collapse">
	        <ul class="menu" id="menu">
	   			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
	   		</ul>
	   	</nav>		

	</div>
	<div id="content" class="content_top">

