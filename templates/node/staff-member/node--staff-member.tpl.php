<article class="<?php print $classes; ?>" id="node-<?php print $node->nid; ?>" <?php print $attributes; ?> >

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print render($content['field_staff_image']); ?>

  <?php print render($content['body']); ?>

  <table class="staff_details">
    <tr><?php print render($content['field_gdc_reg_no']); ?></tr>
    <tr><?php print render($content['field_qualifications']); ?></tr>
    <tr><?php print render($content['field_role']); ?></tr>
  </table>


  <?php
  /* This section is still needed for nodeorder module
       and in case other fields are added in future */
  ?>
  <div class="staff__content" <?php print $content_attributes; ?>>
      <?php print render($content); ?>
  </div>

</article>
