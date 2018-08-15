<?php global $template; $tempname=basename($template, '.php'); ?>
<!doctype html>
<html>
	<head>
		<title><?php bloginfo( 'name' ); wp_title(); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta charset="utf-8">
		<script src="<?=get_template_directory_uri();?>/ext/pr.js" async></script>
		<script src="<?=get_template_directory_uri();?>/ext/mt.js" defer></script>
		<script src="<?=get_template_directory_uri();?>/ext/jquery.js" defer></script>
		<script src="<?=get_template_directory_uri();?>/ext/main.js" defer></script>
		<?php wp_head(); ?>
	</head>
	<body class="<?=$tempname;?>">
		<?php get_sidebar(); ?>
		<main class="container">
			<a href="" data-target="nav-mobile" class="material-icons sidenav-trigger hide-on-large-only">menu</a>
