<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="site-header">
	<h1><a href='<?php echo home_url(); ?>'><?php bloginfo('title') ?></a></h1>
		<?php wp_nav_menu( array( "theme_location" => 'header-menu' ) ) ?>
</div>

<div id='site-container'>
	<div id='site-content'>
