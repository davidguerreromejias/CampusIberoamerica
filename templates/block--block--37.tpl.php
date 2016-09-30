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
          <span class="u-color-gris"><?php print t('Investigación / Docencia')?></span>
        </a>
      </li>
    </ul>

    <h3 class="u-mb+ u-pt u-bold u-color-gris-oscuro u-fs-large horizontal-line-separator-wide-dark-grey"><?php print t('Investigación / Docencia')?></h3>
    <div class="row">
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="p-portadilla-intro__item u-mb+">
          <div class="p-portadilla-intro__item-wrapper">
            <img class="p-portadilla-intro__imagen" src="/sites/all/themes/zen/Nexos/assets/images/Foto_1_web_campus.jpg" alt="Investigación / Docencia"/>
            <div class="p-portadilla-intro__content">
              <div class="display-only-up-xs u-mb-- u-color-naranja u-bold u-fs-large u-uppercase"><?php print t('Investigación / Docencia')?></div>
              <div class="display-only-up-xs u-mb block-info__separator"></div>
              <div class="u-bold u-fs-large"><?php print t('Cada día sabemos más y entendemos menos. Albert Einstein')?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
        <div class="u-mb u-pb- horizontal-line-separator-bottom u-color-gris u-fs-xsmall u-uppercase u-semibold"><?php print t('Programas destacados')?></div>
        <?php  print views_embed_view('destacados', 'block_1');?>
      </div>
    </div>

    <h3 class="u-mb+ u-pt u-bold u-color-gris-oscuro u-fs-large horizontal-line-separator-wide-grey"><?php print t('Todos los programas de Investigación / Docencia')?></h3>
    