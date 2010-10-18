<?php error_reporting(E_ALL);
/**
 * @package WordPress
 * @subpackage Free
 * @since Free 1.0
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo( 'name' );?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.localscroll-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/init.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head();?>
</head>

<body>
<div id="wrapper">
<div id="container">