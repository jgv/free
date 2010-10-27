<?php
/**
 * @package WordPress
 * @subpackage Free
 * @since Free 1.0
 */
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <link rel="shortcut icon" href="/assets/images/general/favicon.ico" > 
  <title><?php bloginfo( 'name' );?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <!--[if lt IE 8]>
      <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/stylesheets/ie.css" />
  <![endif]--> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.scrollTo-1.4.2-min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.localscroll-min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.lazyload.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/ZeroClipboard.js"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/init.js"></script>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head();?>
</head>

<body>
  <div id="wrapper">
    <div id="container">