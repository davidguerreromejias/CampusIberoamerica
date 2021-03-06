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

<div class="site-content-wrapper site-content-wrapper--centered">
<ul class="list-inline display-only-up-md u-mb++">
  <div class="site-content-wrapper site-content-wrapper--centered">
      <li>
        <a href="<?php print url('prepara-tu-viaje') ?>" class="u-block u-mh++ u-semibold u-lh-11 u-fs-small" style="text-align: center;">
          <img src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon.svg" alt="Prepara tu viaje"><br/>
          <?php print t('Prepara <br/>tu viaje')?>
        </a>
      </li>

      <li>
        <a href="<?php print url('info-paises') ?>" class="u-block u-mh++ u-semibold u-lh-11 u-fs-small" style="text-align: center;">
          <img src="/sites/all/themes/zen/Nexos/assets/images/punto-icon.svg" alt="Información de los países"><br/>
          <?php print t('Información')?><br/><?php print t('de los países')?>
        </a>
      </li>

      <li>
        <a href="<?php print url('preguntas-frecuentes') ?>" class="u-block u-mh++ u-semibold u-lh-11 u-fs-small" style="text-align: center;">
          <img src="/sites/all/themes/zen/Nexos/assets/images/dialogo-icon.svg" alt="Preguntas frecuentes"><br/>
          <?php print t('Preguntas')?><br/><?php print t(' frecuentes')?>
        </a>
      </li>

      <li>
        <a href="<?php print url('campus-plus') ?>" class="u-block u-mh++ u-semibold u-lh-11 u-fs-small" style="text-align: center;">
          <img src="/sites/all/themes/zen/Nexos/assets/images/bombilla-icon.svg" alt="Campus Plus"><br/>
          <?php print t('Campus')?><br/><?php print t(' Plus')?>
        </a>
      </li>
    </div>
    </ul>
</div>