<?php

function dentist_preprocess_image(&$variables) {

  // remove width and height attributes from images
  $attributes = &$variables['attributes'];

  foreach (array('width', 'height') as $key) {
    unset($attributes[$key]);
    unset($variables[$key]);
  }
}
