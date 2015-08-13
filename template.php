<?php

function dentist_form_alter(&$form, &$form_state, $form_id) {
  //search box customisation//
  //if ($form_id == 'search_block_form') {
  // HTML5 placeholder attribute
  $form['search_block_form']['#attributes']['placeholder'] = t('Enter a search term...');
	$form['search_block_form']['#attributes']['size'] = t('15');
  //}
}


include_once 'includes/html.inc';

include_once 'includes/node.inc';

include_once 'includes/block.inc';

include_once 'includes/image.inc';

include_once 'includes/css.inc';
