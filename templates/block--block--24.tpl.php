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

<!--[if IE]>
<style>
    .site-header__container{
         height: 60px;
    }
</style>
<![endif]-->

<div class="site-content-wrapper site-content-wrapper--centered">
    <div class="site-header">
  <div class="site-header__container container">
    <a href="/">
      <h1 class="site-header__logo">
        <img src="/sites/all/themes/zen/Nexos/assets/images/logo_campus_home.png"> </img>
      </h1>
    </a>
    <div class="site_header__name">
    </div>
    <div class="site_header__menu-wrapper">
      <button class="site_header__menu-icon display-only-down-sm js-open-overlay" data-target="#menuOverlay">
        <img src="/sites/all/themes/zen/Nexos/assets/images/menu-icon.svg" alt="Abrir / cerrar menú">
      </button>
      <div class="display-only-up-md">
        <ul class="list-inline u-mb0">
          <li class="u-mr">
            <span class="js-drop-menu">
              <?php print t('programas')?>
            </span>
            <ul class="u-initial-hide drop-menu__list-items">
              <li class="drop-menu__item">
                <a href="<?php print url('portadilla-pregrado') ?>" class="drop-menu__link"><?php print t('Pregrado')?></a>
              </li>
              <li class="drop-menu__item">
                <a href="<?php print url('portadilla-postgrado') ?>" class="drop-menu__link"><?php print t('Postgrado')?></a>
              </li>
              <li class="drop-menu__item">
                <a href="<?php print url('portadilla-investigadores') ?>" class="drop-menu__link"><?php print t('Investigación / Docencia')?></a>
              </li>
            </ul>
          </li>
          <li class="u-mr">
            <span class="js-drop-menu">
              <?php print t('Información util')?>
            </span>
            <ul class="u-initial-hide drop-menu__list-items">
              <li class="drop-menu__item">
                <a href="<?php print url('prepara-tu-viaje') ?>" class="drop-menu__link"><?php print t('Prepara tu viaje')?></a>
              </li>
              <li class="drop-menu__item">
                <a href="<?php print url('info-paises') ?>" class="drop-menu__link"><?php print t('Info de los países')?></a>
              </li>
              <li class="drop-menu__item">
                <a href="<?php print url('preguntas-frecuentes') ?>" class="drop-menu__link"><?php print t('Preguntas frecuentes')?></a>
              </li>
            </ul>
          </li>
          <li>
            <span class="js-drop-menu">
              <img src="/sites/all/themes/zen/Nexos/assets/images/world-icon.svg" alt="idioma">
              <?php print t('ESP')?>
            </span>
            <ul class="u-initial-hide drop-menu__list-items">
              <?php $result = block_render('locale', 'language');
            print ($result);?>
              
            </ul>
          </li>
        </ul>
        <p></p>
      </div>
    </div>
  </div>
</div>
</div>