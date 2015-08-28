<?php function dentist_process_html(&$variables) {
  // Flatten out html_attributes and body_attributes.
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
  if (isset($variables['rdf'])) {
    $variables['rdf_namespaces']  = drupal_attributes($variables['rdf']);
  }
  // Render the head scripts
  $variables['head_scripts'] = drupal_get_js('head_scripts');
}

function dentist_preprocess_html(&$variables) {

  drupal_add_js( 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(
    'type' => 'external',
    'scope' => 'footer',
  ));

  // Adds a conditional comment around the script tag for html5 shiv
  $script = array(
      '#theme' => 'html_tag',
      '#tag' => 'script',
      '#value' => '', // necessary to prevent a self-closing tag
      '#attributes' => array(
        'type' => 'text/javascript',
        'src' => 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js',
      ),
      '#browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE),
      '#pre_render' => array('drupal_pre_render_conditional_comments'),
    );

  $variables['ie_scripts'] = drupal_render($script);

  drupal_add_css('http://fonts.googleapis.com/css?family=Lato:400,700,300,100', array(
    'type' => 'external',
    'group' => 'CSS_THEME'
  ));

  // If 'no-sidebars' already exists, remove it
  if (($key = array_search('no-sidebars', $variables['classes_array'])) !== false) {
      unset($variables['classes_array'][$key]);
  }

  // determine which column layout to use
  if (isset($variables['page']['sidebar_left']) && isset($variables['page']['sidebar_right'])) :
    $body_class = 'two-sidebars';
  elseif (isset($variables['page']['sidebar_left'])) :
    $body_class = 'one-sidebar left-sidebar';
  elseif (isset($variables['page']['sidebar_right'])) :
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
