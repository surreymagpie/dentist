<?php

function dentist_preprocess_block(&$variables)
{
  if ($variables['block']->delta == 'main-menu') {
    // Hide the block title from the main menu block
    $variables['title_attributes_array']['class'] = 'element-invisible';
    $variables['content_attributes_array'] = array('role' => 'navigation', 'class' => 'main-menu' );

    // Use the custom template so we can display the toggle link
    $variables['theme_hook_suggestions'][] = 'block__' . str_replace('-', '_', $variables['block']->delta);
  }
}
