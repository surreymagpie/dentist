<div id="container">
	<div id="user"> <!-- the uppermost div housing the user menu -->
		<?php print render($page['user']); ?>
	</div>
	<div id="header">
        <?php if($logo): ?>
            <div id="logo">
            <a  href="<?php print $front_page; ?>"
                title="<?php print t('Home'); ?>"
                rel="home">
            <img src="<?php print $logo; ?>"
                alt="<?php print t('Home'); ?>" />
            </a>
            </div>
        <?php endif; ?>
		<?php if($site_slogan): ?>
            <div id="site-slogan">
            	<h2><?php print $site_slogan; ?></h2>
            </div>
		<?php endif; ?>

		<?php print render($page['header']); ?>
	</div> <!-- /.section, /#header -->
	
	<!-- for small screens the checkbox shows the menu -->
	<input type="checkbox" id="menu">
	<label for="menu" onclick></label>
		
    <div id="nav" >
        <?php print render($page['nav']); ?>
    </div>

    <?php if($breadcrumb): ?>
        <div id="breadcrumb">
    <?php print $breadcrumb; ?>
        </div>
    <?php endif; ?>

    <?php print $messages; ?> <!-- status and error messages appear here -->

<div id="main-content" >
     <div id="content" class="<?php print $content_class; ?>">
        <?php if($page['highlighted']): ?><div id="highlighted">
        <?php print render($page['highlighted']); ?></div>
        <?php endif; ?>

        <?php print render($title_prefix); ?>

        <?php if($title): ?><h1 class="title" id="page-title">
        <?php print $title; ?></h1>
        <?php endif; ?>

        <?php print render($title_suffix); ?>

        <?php if($tabs): ?><div class="tabs">
        <?php print render($tabs); ?></div>
        <?php endif; ?>

        <?php print render($page['help']); ?>

        <?php if($action_links): ?><ul class="action-links">
        <?php print render($action_links); ?></ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
     </div> <!--/#content -->

      <?php if($page['sidebar_left']): ?>
        <div id="sidebar_left" class="<?php print $content_class; ?>">
          <?php print render($page['sidebar_left']); ?>
        </div> <!--/#sidebar_left -->
      <?php endif; ?>

      <?php if($page['sidebar_right']): ?>
        <div id="sidebar_right" class="<?php print $content_class; ?>">
          <?php print render($page['sidebar_right']); ?>
		</div> <!--/#sidebar_right -->
      <?php endif; ?>
</div><!-- /#main-content -->
<div id="footer">
	<div id="copy">
		<p>Website design by Robert Curtis</p>
		<p>Copyright © 2013 Cornerhouse Dental Practice Ltd. All Rights Reserved.</p>
		<p>Registered as a limited company in England and Wales under company number: 06482316</p>
	</div>
	<?php if($page['footer']): ?>
		<div id="footer-links">
      	<?php print render($page['footer']); ?></div>
	<?php endif; ?>
</div> <!-- /#footer -->
</div><!-- /#container -->