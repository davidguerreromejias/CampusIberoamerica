<?php
/**
 * @file
 * Returns the HTML for a block with bare minimum HTML.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728250
 */
?>

<?php print render($title_prefix); ?>
<?php if ($title): ?>
  <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
<?php endif; ?>
<?php print render($title_suffix); ?>

<div>
                



<div>
  <br>
  <br>
  <ul class="list-inline u-mb u-color-turquesa u-fs-xsmall u-uppercase">
    <li>
      <a href="../" class="link">
        <i class="icon-house u-color-turquesa"></i>
      </a>
    </li>

    <li class="items-separator--arrow">
      <a href="#" class="link">
        <span class="u-color-gris"><?php print t('Intranet')?></span>
      </a>
    </li>
  </ul>
</div>