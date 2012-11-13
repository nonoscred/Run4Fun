<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title(); ?> - Run4Fun</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet"type="text/css" href="/bootstrap/css/bootstrap.css" />
<link rel="stylesheet"type="text/css" href="/bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="/bundles/r4fsite/css/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
          /* We add some JavaScript to pages with the comment form
* to support sites with threaded comments (when in use).
*/
          if ( is_singular() && get_option( 'thread_comments' ) )
              wp_enqueue_script( 'comment-reply' );

          wp_head();
      ?>
</head>

<body <?php body_class(); ?>>
<div class="wrap">
<header>
<div class="top-bar">
<div class="container-fluid">
<div class="row-fluid">
<div class="span9 flash hidden-phone"></div>
<div class="span3 user_area">
<ul>
<li class="register">
<a href="">Je m'inscris</a>
<div class="form-container"></div>
</li>
<li class="account">
<a href="">Mon espace</a>
<div class="form-container"></div>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="content container-fluid">
<div class="row-fluid">
<div class="span6 logo">
<h1><a href="/">RUN4FUN - Plateforme communautaire de running</a></h1>
</div>
<div class="span6 social_links hidden-phone">
<ul>
<li class="facebook">
<a href="http://www.facebook.com/run4fun.fr" target="_blank">Facebook</a>
</li>
<li class="twitter">
<a href="http://www.twitter.com/Run4Fun_fr" target="_blank">twitter</a>
</li>
</ul>
</div>
</div>

<nav class="row-fluid navbar">
<div class="navbar-inner">
<div class="container">
<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li><a href="/">Accueil</a></li>
                                        <li><a href="/app_dev.php/course/list">Parcours <span class="badge">1</span></a></li>
                                        <li><a href="/app_dev.php/user/list">Utilisateurs <span class="badge">7</span></a></li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/concept">Concept</a></li>
                                    </ul>
                                </div>
</div>
</div>
</nav>
</div>
</header>

	 <?php if ( is_front_page() ) { ?> 
       <div id="slider" class="hidden-phone">
            <div id="myCarousel" class="r4f-carousel carousel slide">
                <!-- Carousel items -->
                <div class="r4f-inner carousel-inner">
					<div class="active item">
						<span class="title">Marre de courir tout(e) seul(e)? Pas vraiment motivé(e)?</span>
						<h1>Run4Fun.fr site communautaire de Running </h1>
					</div>
					<div class="item"><img alt="" src="http://2.bp.blogspot.com/-01p5w2KSQ2M/Th5g6QLIj3I/AAAAAAAAABM/D0kj7aMAtx0/s1600/Kelly%2527s%2Bblog%2Bheaderb.jpg"></div>
					<div class="item"><img alt="" src="http://www.chicaricabikini.com/frontimage.jpg"></div>     
				</div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
       </div>
 <?php } ?> 
 

<div class="container-fluid">
<div class="row-fluid main">