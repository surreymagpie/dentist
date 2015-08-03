<p class="article__tags">
  <span>Classified as:</span>
  
  <?php foreach ($items as $tag) { ?>
  <span class="article__tag"><?php print render($tag); ?></span>
  <?php } ?>
</p>
