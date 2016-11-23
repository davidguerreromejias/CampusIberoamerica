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

<div class="site-content-wrapper site-content-wrapper--centered" style="padding-top: 40px;">
  <div class="site-content text-center">
      <h2 class="p-home_title">
        <?php print t('Gestión de contenidos de <strong>Campus Iberoamérica</strong>')?>
      </h2>
      <h4 class="p-home_title">
        <?php print t('Elige el contenido que desees')?>
      </h4>

  </div>
</div>