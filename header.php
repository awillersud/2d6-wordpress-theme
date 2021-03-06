<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" content="HTML,CSS,XML,JavaScript"></meta>
    <title><?php (bloginfo('name') + wp_title()) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"></meta>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <!-- Slidebars CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/slidebars/slidebars/0.9/slidebars.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/respond.min.js">

    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-2.png" />

    <?php require_once('tds-database-functions.php'); ?>
    <?php add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) ); ?>
    <?php wp_head(); ?>
</head>
  <body>

  <nav role="navigation" class="sb-slidebar sb-left">
      <div class="menu-header tds-nav-toppmeny"><img class="logo" src="<?php bloginfo('template_directory'); ?>/img/nav/2d6-logo-terninger.png" alt="Meny" /></div>
      <ol role="menu" class="menu-level-1">

          <li role="menuitem" class="path">
            <a href="<?php bloginfo('wpurl') ?>" >Forsiden</a>
          </li>
          <li role="menuitem" class="path">
              <a href="<?php echo get_bloginfo('wpurl') . "/halloffame"?>">Hall of Fame</a>
          </li>
          <li role="menuitem" class="path">
              <a href="<?php echo get_bloginfo('wpurl') . "/om-2d6-turneringer"?>">2d6 turneringer</a>
              <ol role="menu" class="menu-level-2">
                  <li role="menuitem"><a href="<?php echo get_bloginfo('wpurl') . "/om-2d6-turneringer/generell-turneringsinfo/" ?>">Generell turneringsinfo</a></li>
                  <?php display_turnering_menu_items() ?>
              </ol>
          </li>
          <li role="menuitem" class="path">
            <a class="meny" href="<?php echo get_bloginfo('wpurl') . "/om-2d6" ?>">Om 2d6</a>
          </li>
          <li role="menuitem" class="path">
            <a href="http://www.2d6.no">2d6 forum</a>
          </li>
          <?php
          if ( is_user_logged_in() ) { ?>
              <li role="menuitem" class="path">
                <a href="<?php echo wp_logout_url( get_home_url() ); ?>">Logg ut</a>
              </li>
              <?php } else { ?>
              <li role="menuitem" class="path">
              <a href="<?php echo wp_login_url() ?>">Logg inn</a>
              </li>
              <?php } ?>
      </ol>
  </nav>

  <div id="sb-site">

      <div class="tds-nav-toppmeny mork">
          <div class="tds-container">
              <img class="hamburger-meny" src="<?php bloginfo('template_directory'); ?>/img/nav/Hamburgermeny.png"/>
              <a class="hoyre" href="<?php echo get_bloginfo('wpurl') ?>"><img src="<?php bloginfo('template_directory'); ?>/img/nav/2d6-logo-terninger.png"/></a>
          </div>
      </div>
      <div class="mork">

    <hr/>

<?php
function display_turnering_menu_items() {
    $tournaments = get_tournaments_for_menu();
?>
    <?php foreach ($tournaments as $tournament) { ?>
      <li role="menuitem"><a href="<?php echo $tournament->getUrl() ?>"><?php echo $tournament->name ?></a></li>
    <?php }
} ?>
