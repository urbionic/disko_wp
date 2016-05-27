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

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/responsive-nav.js?ver=1'></script>

<script type="text/javascript">
/* google analytics */
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18495611-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="wrapper" id="top">
    <div class="header">
<h1>
    <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
        <img src="<?php bloginfo('template_directory'); ?>/img/logoDark.png">
    </a>
</h1>
    <nav class="nav-collapse">
        <ul class="menu" id="menu">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </ul>
    </nav>      
</div>
    

