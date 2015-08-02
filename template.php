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
function dentist_preprocess_html(&$variables) {

  drupal_add_js( path_to_theme() .'/scripts/modernizr.min.js', array(
    'type' => 'file',
    'scope' => 'footer',
  ));

  // If 'no-sidebars' already exists, remove it
  if (($key = array_search('no-sidebars', $variables['classes_array'])) !== false) {
      unset($variables['classes_array'][$key]);
  }

  if ($variables['page']['sidebar_left'] && $variables['page']['sidebar_right']) :
    $body_class = 'two-sidebars';
  elseif ($variables['page']['sidebar_left']) :
    $body_class = 'one-sidebar left-sidebar';
  elseif ($variables['page']['sidebar_right']) :
    $body_class = 'one-sidebar right-sidebar';
  else :
    $body_class = 'no-sidebar';
  endif;

  $variables['classes_array'][] = $body_class;
}

//customise breadcrumb markup
/**
* Override theme_breadcrumb().
*/
function dentist_breadcrumb($breadcrumb) {
  $links = array();
  $path = '';

  // Get URL arguments
  $uri = request_uri();
  // If a query string exists, we remove it
  if (strpos($uri, '?')):
	  $uri = strstr($uri, '?', TRUE);
  endif;
  $arguments = explode('/',$uri);

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

//search box customisation//
// Add some cool text to the search block form
function dentist_form_alter(&$form, &$form_state, $form_id) {
  //if ($form_id == 'search_block_form') {
    // HTML5 placeholder attribute
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
	$form['search_block_form']['#attributes']['size'] = t('15');
  //}
}

?>
