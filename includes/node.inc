<?php function dentist_preprocess_node(&$variables) {

  // Set a variable for each date part for the node template
  if($variables['type'] == 'article') {
   $date = $variables['node']->created;
   $variables['day'] = date('j', $date);
   $variables['month'] = date('F', $date);
   $variables['year'] = date('Y', $date);
  }

  $user = user_load($variables['uid']);
  $variables['user_image'] = theme(
    'image_style', array(
      'style_name' => 'author',
      'path' => !empty($user->picture->uri) ? $user->picture->uri : variable_get('user_picture_default'),
      'attributes' => array(
        'class' => 'article__author-image',
        'width' => '32',
        'height' => '48',
      ),
    )
  );
}
