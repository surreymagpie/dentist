<div class="container">
  <!-- for small screens the checkbox toggles the menu -->
  <input type="checkbox" id="menu">
  <div class="user">
    <!-- the uppermost div housing the user menu -->
    <?php print render($page['user']); ?>
  </div>

  <div id="page">
    <div class="header">
      <label for="menu" onclick></label> <!-- for the checkbox -->

      <?php if($logo): ?>
			<div id="logo">
			  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
			    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  </a>
			</div>
      <?php endif; ?>

      <?php if($site_slogan): ?>
      <div id="site-slogan">
        <h2><?php print $site_slogan; ?></h2>
      </div>
      <?php endif; ?>

      <?php print render($page['header']); ?>
      <div class="nav">
        <?php print render($page['nav']); ?>
      </div>

      <?php if($breadcrumb){print $breadcrumb;}?>

      <?php print $messages; ?> <!-- status and error messages appear here -->
    </div> <!-- .header -->

    <div class="wrapper">
      <?php if($page['highlighted']): ?>
      <div id="highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
      <?php endif; ?>

      <div id="main-content">
        <div id="content" class="<?php print $content_class; ?>">
          <?php print render($title_prefix); ?>
          <?php if($title): ?>
          <h1 class="title" id="page-title">
	        <?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>

					<?php if($tabs): ?>
					<div class="tabs">
					<?php print render($tabs); ?>
					</div>
					<?php endif; ?>

					<?php print render($page['help']); ?>
					<?php if($action_links): ?>
					<ul class="action-links">
					<?php print render($action_links); ?>
					</ul>
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
      </div> <!-- /#main-content -->
    </div> <!-- .wrapper -->
  </div> <!-- /#page -->

  <div class="footer">
		<?php if($page['footer']): ?>
		<div id="footer-links">
		<?php print render($page['footer']); ?>
		</div>
		<?php endif; ?>
  </div> <!-- .footer -->
</div> <!-- /#container -->
