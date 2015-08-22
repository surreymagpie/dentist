<td <?php print $title_attributes; ?> class="staff__label" >
<?php if (!$label_hidden): ?>
  <span >
  <?php print $label ?>:&nbsp;
  </span>
<?php endif ?>
</td>
<td class="staff__field">
  <?php foreach ($items as $delta => $item) : ?>
    <div class="staff__field-item">
      <?php print render($item); ?>
    </div>
  <?php endforeach; ?>
</td>
