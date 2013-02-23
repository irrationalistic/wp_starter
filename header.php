<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<title><? custom_page_title('-'); ?></title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="pingback" href="<? bloginfo('pingback_url'); ?>">

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/library/images/favicons/apple-icon-touch.png">
		<link rel="icon" href="<?= get_template_directory_uri(); ?>/library/images/favicons/favicon.ico">
		<!--[if IE]> <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/library/images/favicons/favicon.ico"> <![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?= get_template_directory_uri(); ?>/library/images/favicons/tile-icon.png">

		<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri() ?>/library/css/style.css" />

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script>!window.jQuery && document.write('<script src="<?= get_stylesheet_directory_uri() ?>/library/js/jquery-1.9.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="<?= get_stylesheet_directory_uri() ?>/library/js/modernizr.custom.min.js"></script>
		<script type="text/javascript" src="<?= get_stylesheet_directory_uri() ?>/library/js/utility.js"></script>
		<script type="text/javascript" src="<?= get_stylesheet_directory_uri() ?>/library/js/main.js"></script>

		<? wp_head(); ?>
	</head>
	<body <? body_class(); ?>>
		<div id="container">
			<header id="header" class="header">
				<div id="inner-header" class="wrap clearfix">
					<a href="<?= home_url(); ?>" rel="nofollow" id="logo" class="h1"><? bloginfo('name'); ?></a>
					<nav role="navigation">
						<? main_nav(); ?>
					</nav>
				</div>
			</header>