<?php function dentist_preprocess_node(&$variables) {

  // Set a variable for each date part for the node template
  if($variables['type'] == 'article') {
   $date = $variables['node']->created;
   $variables['day'] = date('j', $date);
   $variables['month'] = date('F', $date);
   $variables['year'] = date('Y', $date);
  }
}
