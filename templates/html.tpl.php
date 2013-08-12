<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  		<meta name="description" content="" />
		<meta name="author" content="Rob" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<link rel="shortcut icon" href="favicon.ico" />
		<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans|PT+Serif:400,700' rel='stylesheet' type='text/css'>
		<title><?php print $head_title; ?></title>
		<?php print $head; ?>
		<?php print $styles; ?>
 		<?php print $scripts; ?>
	</head>
	<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
		<div id="skip-link">
			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
	</body>
</html>
