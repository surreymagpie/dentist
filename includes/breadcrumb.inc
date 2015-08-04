<?php

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
