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
    <div class="row">
      <div class="col-xs-12">
        <ul class="list-inline u-mb u-fs-xsmall u-uppercase">
          <li>
            <a href="#" class="link">
              <i class="u-color-turquesa icon-house"> </i>
            </a>
          </li>
          <li class="items-separator--arrow">
            <span class="u-color-gris">Aviso legal</span>
          </li>
        </ul>
      </div>
      <?php if (is_array($user->roles) && (!in_array('admin SEGIB', $user->roles) && !in_array('administrator', $user->roles))) { ?>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold">Aviso Legal</div>
          <?php print $content ?>
        </div>
      </div>
      <?php } 
      else { ?>
        <a href="/es/admin/structure/block/manage/block/31/configure" class="btn btn--edit"><i style="margin-right: 5px;" class="fa fa-plus" aria-hidden="true"></i>Editar</a>
        <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold">Aviso Legal</div>
          <?php print $content ?>
        </div>
      </div>
      <?php } ?>
      <div class="col-xs-12 col-md-4 col-lg-3">
         <div class="u-mb+++">
          <div class="u-pb- u-color-gris u-fs-xsmall u-uppercase u-semibold horizontal-line-separator-bottom"><?php print t('Información útil')?></div>
          <ul class="u-color-turquesa u-fs-small u-semibold">
            <li>
              <a href="<?php print url('prepara-tu-viaje') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
                <?php print t('Prepara tu viaje')?>
              </a>
            </li>
            <li class="horizontal-line-separator-top">
              <a href="<?php print url('info-paises') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/punto-icon_small.svg" alt="Información de los países">
                <?php print t('Información de los paises')?>
              </a>
            </li>
            <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
              <a href="<?php print url('preguntas-frecuentes') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/dialogo-icon_small.svg" alt="Preguntas frecuentes">
                <?php print t('Preguntas frecuentes')?>
              </a>
            </li>
            <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
              <a href="<?php print url('campus-plus') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/bombilla-icon.svg" alt="Campus Plus">
                <?php print t('Campus Plus')?>
              </a>
            </li>
          </ul>
          </div>
          <div class="menu-lateral site-content-wrapper site-content-wrapper--centered">
            <div class="u-inline-block">
                <a class="p-home_portal-inv-btn" href="<?php print url('portadilla-investigadores') ?>?tid=1341">
                  <?php print t('Portal de Movilidad de Investigadores')?>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>