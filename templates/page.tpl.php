<div class="container">

  <?php if ($page['navbar']): ?>
  <nav class="navbar">
    <?php print render($page['navbar']); ?>
  </nav>
  <?php endif ?>

  <header class="site__header">

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

    <?php if ($page['header']): ?>
      <?php print render($page['header']); ?>
    <?php endif ?>
  </header> <!-- /.site__header -->

  <main id="main-content" class="site__content">

    <?php if($breadcrumb){print $breadcrumb;}?>

    <?php print $messages; ?> <!-- status and error messages appear here -->

    <?php if($page['highlighted']): ?>
      <section class="highlighted">
      <?php print render($page['highlighted']); ?>
      </section>
    <?php endif; ?>

    <div class="content-wrapper">
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
    <?php if($page['footer']): ?>
  		<?php print render($page['footer']); ?>
		<?php endif; ?>
  </footer> <!-- /.site__footer -->

</div> <!-- /#container -->
