<!DOCTYPE html>
<html <?php print $html_attributes;?> lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="author" content="Robert Curtis" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans|PT+Serif:400,700' rel='stylesheet' type='text/css' />
		<title><?php print $head_title; ?></title>
		<?php print $head; ?>
		<?php print $styles; ?>
<<<<<<< HEAD
		<!--[if IE lte 8]>
			<link href="./sites/all/themes/dentist/stylesheets/ie.css" type="text/css" rel="stylesheet"/>
		<![endif]-->
=======
>>>>>>> 382310ede3b8181244b53036d203559d8351b5c6
 		</head>
	<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
		<div id="skip-link">
			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		<?php print $scripts; ?>
	</body>
</html>
