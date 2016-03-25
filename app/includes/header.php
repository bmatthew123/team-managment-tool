﻿<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>OIT <?php echo getAreaName(); ?></title>
	<meta name="description" content="Description about your department. This text displays in the Google search results." />
	<meta name="author" content="Your Department Name" />
	<meta name="keywords" content="keyword 1, keyword 2, keyword 3">

	<meta name="viewport" content="width=device-width" />

	<link rel="shortcut icon" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/template/img/favicon.ico" />
	<link rel="stylesheet" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/template/css/style.css" />

	<script src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/template/js/libs/modernizr-2.0-basic.min.js"></script>

	<!-- Insert plugin stylesheets here -->
	<!--Insert analytics here -->
	<script language="javascript" type="text/javascript" src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/templates/scripts/globalJavaScript.js"></script>

	<script src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/templates/scripts/sorttable2.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

	<script src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/static/js/misc/superuser.js"></script>

</head>
<body>
	<header id="main-header">
		<div id="header-top" class="wrapper">
			<div id="logo">
				<a href="http://www.byu.edu/" class="byu"><img src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/template/img/byu-logo-small.gif" alt="BYU Logo" /></a> <a href="http://it.byu.edu" id="parent">Office of Information Technology</a>
			</div>

				<a href="/" id="site-name"><?php echo getAreaName(); ?></a>


			<div id="search-container">
				<?php if ($auth) { ?>
					<?php if (canBeSuperuser()) {
        				if (isSuperuser()) { ?>
							<a id="superuserButton" onclick="stop('<?php echo $netID; ?>')" class="button">Stop Superuser</a>
					<?php
						} else {
            		?>
							<a id="superuserButton" onclick="elevate('<?php echo $netID; ?>')" class="button">Elevate to Superuser</a>
					<?php
						}
    				}
    				?>
					<a href="?logout=" class="button">Logout <?php echo getEmployeeName(); ?></a>
				<?php } else {?>
					<a href="?login=" class="button">Log In</a>
				<?php } ?>
				<!--Original Login Button - <a href="http://home.byu.edu/home/cas" class="button">Login</a>-->

				<!-- SEARCH - set up with GSA default; change URL in action if you want to use different product -->
				<form method="get" action="http://gurgle2.byu.edu/search">
					<!-- Change placeholder text to be specific for your implementation -->
					<input type="text" name="q" id="search" placeholder="Search Organization" />
					<input type="image" src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/includes/template/img/search-button-rnd.png" alt="Search" id="search-button" value="Search" />
					<!-- Uncomment next line and insert your custom collection name -->
					<!-- input type="hidden" name="site" value="default_collection_name" -->
					<!-- Insert your custom frontend name in place of default in next line -->
					<input type="hidden" name="client" value="default_frontend">
					<input type="hidden" name="output" value="xml_no_dtd">
					<input type="hidden" name="proxystylesheet" value="default_frontend">
				</form>
			</div>

			<?php require 'links.php';?>
			<nav id="secondary-nav">
				<?php pullSubMenus();?>
			</nav>

		</div>

		<nav id="primary-nav" class="no-js">

			<?php //getParentLinks($netID,$area); ?>
			<?php pullLinks();?>

		</nav>
	</header>
<div id="content" class="wrapper clearfix">
