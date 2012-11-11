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
                                        <li><a href="/course">Parcours</span></a></li>
                                        <li><a href="/user">Utilisateurs</span></a></li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/concept">Concept</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <div class="container-fluid">
                <div class="row-fluid main">
