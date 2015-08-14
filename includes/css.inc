<?php

/**
 * Implements hook_css_alter().
 */
function dentist_css_alter(&$variables) {

  // Prevents the default menu styles being
  // loaded to prevent specificity problems
  unset($variables['modules/system/system.menus.css']);

  // Same for system theme stylesheet
  unset($variables['modules/system/system.theme.css']);
}
