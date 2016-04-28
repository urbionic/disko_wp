<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="all" />
<meta name="Content-language" content="en" />
<link rel="shortcut icon" href="img/favicon.ico" />
<meta content="Riaan Retief" name="author" />
<meta content="Disko content here" name="description" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(''); ?></title>
<!-- add -->
<meta property="og:title" content="" />
<!-- add -->
<meta property="og:url" content="http://www.disko.co.za/" />
<meta property="og:image" content="" />
<!-- add -->
<meta property="og:description" content="" />
<!-- add -->
<meta property="og:site_name" content="" />
<!-- add -->
<meta property="og:locale" content="en_EN">
<meta property="fb:admins" content="" /> <!-- get info from fb regarding admin id - prob ferdi -->
<!-- add -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato' type='text/css'>
<!-- <link rel="stylesheet" href="css/base.css" media="screen" type="text/css" />
concatenate 
<link rel="stylesheet" href="css/responsive-nav.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/menu_mov.css" media="screen" type="text/css" />-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/responsive-nav.js"></script>
<script type="text/javascript">
/* google analytics */
</script>
</head>

<body>
    <div class="wrapper" id="top">
        <div class="header">
            <h1>
              
                <a href="<?php echo get_option('home'); ?>"> <!--<?php bloginfo('name'); ?>-->
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo.png">

                </a>
           </h1>
            <!-- sidebar/nav -->
           <?php get_sidebar(); ?>

        </div>
        <div id="content" class="content_top">