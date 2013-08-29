<div class="container">
	<div class="user row"> <!-- the uppermost div housing the user menu -->
		<?php print render($page['user']); ?>
	</div>
	<div id="page">
		<header>
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
				
		<!-- for small screens the checkbox toggles the menu -->
		<input type="checkbox" id="menu">
		<label for="menu" onclick></label>
			
	    <nav>
	        <?php print render($page['nav']); ?>	
		    <?php if($breadcrumb):
				print $breadcrumb;
			endif; ?>
    	</nav>	
		    <?php print $messages; ?><!-- status and error messages appear here -->
	</header>		
	<article>	    
		<?php if($page['highlighted']): ?><div id="highlighted">
		    <?php print render($page['highlighted']); ?></div>
		    <?php endif; ?>
		    
		<div id="main-content" >
		     <div id="content" class="<?php print $content_class; ?>">
		
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
		        <aside id="sidebar_left" class="<?php print $content_class; ?>">
		          <?php print render($page['sidebar_left']); ?>
		        </aside> <!--/#sidebar_left -->
		      <?php endif; ?>
		
		      <?php if($page['sidebar_right']): ?>
	      	<aside id="sidebar_right" class="<?php print $content_class; ?>">
		          <?php print render($page['sidebar_right']); ?>
			</aside><!--/#sidebar_right -->
		      <?php endif; ?>      
			</div>
		</article><!-- /#main-content -->
	</div><!-- /#page -->
<footer class="row">
	<div class="copyright">
		<p>Website design by Robert Curtis</p>
		<p>Copyright &copy; 2013 Cornerhouse Dental Practice Ltd. All Rights Reserved.</p>
		<p>Registered as a limited company in England and Wales under company number: 06482316</p>
	</div>
	<?php if($page['footer']): ?>
		<div id="footer-links">
      	<?php print render($page['footer']); ?></div>
	<?php endif; ?>
</footer> <!-- /#footer -->
</div><!-- /#container -->