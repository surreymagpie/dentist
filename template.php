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

//customise breadcrumb markup
/**
* Override theme_breadcrumb().
*/
function dentist_breadcrumb($breadcrumb) {
  $links = array();
  $path = '';

  // Get URL arguments
  $arguments = explode('/', request_uri());

  // Remove empty values
  foreach ($arguments as $key => $value) {
    if (empty($value)) {
      unset($arguments[$key]);
    }
  }
  $arguments = array_values($arguments);

  // Add 'Home' link
  $links[] = l(t('Home'), '<front>');

  // Add other links
  if (!empty($arguments)) {
    foreach ($arguments as $key => $value) {
      // Don't make last breadcrumb a link
      if ($key == (count($arguments))) {
        $links[] = drupal_get_title();
      } else {
        if (!empty($path)) {
          $path .= '/'. $value;
        } else {
          $path .= $value;
        }
		$chars = array('-','_' );
		$value = str_replace($chars, " ", $value);
        $links[] = l(ucwords($value), $path);
      }
    }
  }

  // Set custom breadcrumbs
  drupal_set_breadcrumb($links);

  // Get custom breadcrumbs
  $breadcrumb = drupal_get_breadcrumb();

  // Hide breadcrumbs if only 'Home' exists
  if (count($breadcrumb) > 1) {
    return '<div class="breadcrumb">'. implode(' &raquo; ', $breadcrumb) .'</div>';
  }
}

?>