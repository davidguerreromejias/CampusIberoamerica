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


      <div class="site-content-wrapper">
  <div class="site-content">

    <ul class="list-inline u-mb u-color-turquesa u-fs-xsmall u-uppercase">
      <li>
        <a href="../" class="link">
          <i class="icon-house u-color-turquesa"></i>
        </a>
      </li>
      <li class="items-separator--arrow">
        <a href="#" class="link">
          <span class="u-color-gris"><?php print t('Postgrado')?></span>
        </a>
      </li>
    </ul>

    <h3 class="u-mb+ u-pt u-bold u-color-gris-oscuro u-fs-large horizontal-line-separator-wide-grey"><?php print t('Todos los programas de Postgrado')?></h3>
    