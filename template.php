<?php 
// remove width and height attributes from images
function dentist_preprocess_image(&$variables) {
  $attributes = &$variables['attributes'];

  foreach (array('width', 'height') as $key) {
    unset($attributes[$key]);
    unset($variables[$key]);
  }
}
// determine which column layout to use
function dentist_preprocess_page(&$variables) {
	$page = $variables['page'];

if ($page['sidebar_left'] && $page['sidebar_right']) :
	$content_class = 'two-sidebar';
elseif ($page['sidebar_left'] && !$page['sidebar_right']) :
	$content_class = 'left-sidebar';
elseif ($page['sidebar_right'] && !$page['sidebar_left']) :
	$content_class = 'right-sidebar';	
else :
	$content_class = '';
endif;
	$variables['content_class'] = $content_class;
}