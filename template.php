<?php

function dentist_form_alter(&$form, &$form_state, $form_id) {

  //search box customisation//
  if ($form_id == 'search_block_form') {
  // HTML5 placeholder attribute
    $form['search_block_form']['#attributes']['placeholder'] = t('Enter a search term...');
  }
}

include_once 'includes/html.inc';

include_once 'includes/node.inc';

include_once 'includes/block.inc';

include_once 'includes/css.inc';

/**
*   Implements theme_proprocess_hook
*/
function dentist_preprocess_image(&$variables) {

  // remove width and height attributes so that we can style with CSS
  foreach (array('width', 'height') as $key) {
    unset($variables[$key]);
  }
}

function dentist_pager($variables) {
  $variables['tags'] = array('<<','<', 0,'>','>>');
  return theme_pager($variables);
}
