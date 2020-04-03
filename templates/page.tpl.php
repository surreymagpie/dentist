<div class="site">

  <?php if ($page['navbar']): ?>
  <nav class="navbar">
    <?php print render($page['navbar']); ?>
  </nav>
  <?php endif ?>

  <header class="site__header">
	<div class="container">
    <div class="site__banner">
      <?php if($logo): ?>
      <div class="site__logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      </div>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div class="site__branding">
          <?php if($site_name): ?>
            <div class="site__name"><?php print $site_name; ?></div>
          <?php endif; ?>

          <?php if($site_slogan): ?>
            <div class="site__slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div>
      <?php endif ?>
    </div>

    <?php if ($page['header']): ?>
      <?php print render($page['header']); ?>
	<?php endif ?>
	</div> <!-- .container -->
  </header> <!-- /.site__header -->

  <main id="main-content" class="site__content">
	  

  <?php if($page['highlighted']): ?>
		<section class="highlighted">
			<div class="container">
				<?php print render($page['highlighted']); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if($breadcrumb): ?>
		<div class="breadcrumb container">
			<?php print $breadcrumb; ?>
		</div>
	<?php endif; ?>

    <?php print $messages; ?> <!-- status and error messages appear here -->

    <div class="content-wrapper container">
      <section class="primary-content">
        <?php print render($title_prefix); ?>
        <?php if($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
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
      </section>

      <?php if($page['sidebar_left']): ?>
        <section id="sidebar_left" class="sidebar sidebar-left">
        <?php print render($page['sidebar_left']); ?>
        </section> <!--/#sidebar_left -->
      <?php endif; ?>

      <?php if($page['sidebar_right']): ?>
        <section id="sidebar_right" class="sidebar sidebar-right">
        <?php print render($page['sidebar_right']); ?>
        </section> <!--/#sidebar_right -->
      <?php endif; ?>

    </div> <!-- content-wrapper -->
  </main> <!-- /#main-content.site__content-->

  <footer class="site__footer">
	<div class="container">
		<?php if($page['footer']): ?>
			<?php print render($page['footer']); ?>
		<?php endif; ?>
	</div>
  </footer> <!-- /.site__footer -->

</div> <!-- .site -->
