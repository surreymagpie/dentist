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

  $variables['html_attributes_array'] = array(
    'class' => array('no-js'),
     'lang' => $variables['language']->language,
      'dir' => $variables['language']->dir,
  );

  // Adds RDF namespace prefix bindings in the form of an RDFa 1.1 prefix
  // attribute inside the html element.
  if (function_exists('rdf_get_namespaces')) {
    $variables['rdf'] = array('prefix' => '');
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $variables['rdf']['prefix'] .= "\n" . $prefix . ': ' . $uri;
    }
  }
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

function dentist_html_head_alter(&$head_elements) {
  $elements = array(
    // Force the latest IE rendering engine and Google Chrome Frame.
    'ie_rendering' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#weight' => '-999',
      '#attributes' => array(
        'http-equiv' => 'X-UA-Compatible',
        'content' => 'IE=edge',
      ),
    ),
    // Simplify the meta charset declaration.
    'system_meta_content_type' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'charset' => 'utf-8',
      ),
    ),
    // Optimize the mobile viewport.
    'MobileOptimized' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'MobileOptimized',
        'content' => 'width',
      ),
    ),
    'HandheldFriendly' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'HandheldFriendly',
        'content' => 'true',
      ),
    ),
    'viewport' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1',
      ),
    ),
    // Mobile IE allows to activate ClearType technology for smoothing fonts.
    'cleartype' => array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'http-equiv' => 'cleartype',
        'content' => 'on',
      ),
    ),
  );
  $head_elements = array_merge($head_elements, $elements);
}
/**
 * Implements hook_process_html_tag().
 *
 * - Remove the type attribute from the <script>, <style> and <link> tags.
 * - Remove the CDATA comments from inline JavaScript and CSS.
 * - Remove implicit media="all" from <style> tags.
 */
function dentist_process_html_tag(&$variables) {
  $tag = &$variables['element'];
  if (in_array($tag['#tag'], array('script', 'link', 'style'))) {
    // Remove the "type" attribute.
    unset($tag['#attributes']['type']);
    // Remove CDATA comments.
    if (isset($tag['#value_prefix'])
        && ($tag['#value_prefix'] == "\n<!--//--><![CDATA[//><!--\n"
        || $tag['#value_prefix'] == "\n<!--/*--><![CDATA[/*><!--*/\n")) {
      unset($tag['#value_prefix']);
    }
    if (isset($tag['#value_suffix'])
        && ($tag['#value_suffix'] == "\n//--><!]]>\n"
        || $tag['#value_suffix'] == "\n/*]]>*/-->\n")) {
      unset($tag['#value_suffix']);
    }
    // Remove media="all".
    if (isset($tag['#attributes']['media']) && $tag['#attributes']['media'] == 'all') {
      unset($tag['#attributes']['media']);
    }
  }
}

function dentist_process_html(&$variables) {
  // Flatten out html_attributes and body_attributes.
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
  if (isset($variables['rdf'])) {
    $variables['rdf_namespaces']  = drupal_attributes($variables['rdf']);
  }
  // Render the head scripts
  $variables['head_scripts'] = drupal_get_js('head_scripts');
}

include_once 'includes/node.inc';
