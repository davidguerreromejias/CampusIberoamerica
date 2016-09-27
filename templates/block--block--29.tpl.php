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

<div class="site-header">
  <div class="site-header__container container site-header__container--secondary">
    <h1 class="site-header__logo site-header__logo--secondary">
    <a href="/"><img src="/sites/all/themes/zen/Nexos/assets/images/logo_campus_interior.png" alt="SEGIB"></a>
    </h1>
    <div class="site_header__name">
    </div>
    <div class="site_header__menu-wrapper">
      <button class="site_header__menu-icon display-only-down-sm js-open-overlay" data-target="#menuOverlay">
      <svg width="28px" height="16px" viewBox="0 0 28 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <desc>Hamburguer Menu icon</desc>
  <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g  transform="translate(-327.000000, -20.000000)" fill="#6F6F6F">
          <g  transform="translate(327.000000, 20.000000)">
              <rect id="Rectangle-3" x="0" y="0" width="28" height="4" rx="2"></rect>
              <rect id="Rectangle-3" x="0" y="6" width="28" height="4" rx="2"></rect>
              <rect id="Rectangle-3" x="0" y="12" width="28" height="4" rx="2"></rect>
          </g>
      </g>
    </g>
</svg>

      </button>
      <div class="display-only-up-md">
        <ul class="list-inline u-mb0">
          <li class="u-mr">
            <span class="js-drop-menu">
              <span class="u-mr--- u-valing-middle"><?php print t('programas')?></span>
              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
  <desc>down arrow</desc>
  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
</svg>

            </span>
            <ul class="u-initial-hide drop-menu__list-items">
              <li class="drop-menu__item">
                <a href="<?php print url('portadilla-pregrado') ?>" class="drop-menu__link"><?php print t('Pregrado')?></a>
              </li>
              <li class="drop-menu__item">
                <a href="<?php print url('portadilla-postgrado') ?>" class="drop-menu__link"><?php print t('Postgrado')?></a>
              </li>
            </ul>
          </li>
          <li class="u-mr">
            <span class="js-drop-menu">
              <span class="u-mr--- u-valing-middle"><?php print t('Información util')?></span>
              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
  <desc>down arrow</desc>
  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
</svg>

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
              <svg class="u-valing-middle" width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <desc>Icono Mundo</desc>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1257.000000, -51.000000)" fill="#7F7F7F">
            <g transform="translate(927.000000, 48.000000)">
                <g transform="translate(330.000000, 0.000000)">
                    <path d="M8,18.999 C3.582,18.999 0,15.418 0,10.999 C0,6.582 3.582,3 8,3 C12.418,3 16,6.582 16,10.999 C16,15.418 12.418,18.999 8,18.999 L8,18.999 Z M15,11.001 L11,11.001 C11,12.063 10.921,13.074 10.779,13.999 L14.297,13.999 C14.734,13.089 15,12.079 15,11.001 L15,11.001 Z M13.711,14.999 L10.596,14.999 C10.346,16.145 9.992,17.113 9.57,17.808 C11.279,17.415 12.732,16.387 13.711,14.999 L13.711,14.999 Z M6.029,10.001 L9.971,10.001 C9.942,9.29 9.877,8.624 9.792,7.999 L6.209,7.999 C6.124,8.624 6.058,9.29 6.029,10.001 L6.029,10.001 Z M6,11.001 C6,12.079 6.075,13.087 6.2,13.999 L9.8,13.999 C9.925,13.087 10,12.079 10,11.001 L6,11.001 L6,11.001 Z M8,17.999 C8.679,17.999 9.276,16.81 9.638,14.999 L6.362,14.999 C6.723,16.81 7.321,17.999 8,17.999 L8,17.999 Z M6.431,17.808 C6.008,17.114 5.655,16.146 5.405,14.999 L2.289,14.999 C3.267,16.387 4.721,17.415 6.431,17.808 L6.431,17.808 Z M1,10.999 L1,10.999 L1,11.001 L1,10.999 L1,10.999 Z M1.703,13.999 L5.22,13.999 C5.079,13.074 5,12.062 5,11.001 L1,11.001 C1,12.079 1.266,13.089 1.703,13.999 L1.703,13.999 Z M5.025,10.001 C5.058,9.3 5.128,8.632 5.225,7.999 L1.694,7.999 C1.398,8.621 1.189,9.293 1.088,10.001 L5.025,10.001 L5.025,10.001 Z M2.28,7 L5.409,7 C5.659,5.855 6.008,4.885 6.43,4.19 C4.718,4.584 3.254,5.608 2.28,7 L2.28,7 Z M8,3.999 C7.323,3.999 6.734,5.196 6.375,7 L9.625,7 C9.266,5.196 8.677,3.999 8,3.999 L8,3.999 Z M9.569,4.19 C9.992,4.884 10.341,5.855 10.59,7 L13.719,7 C12.745,5.608 11.281,4.584 9.569,4.19 L9.569,4.19 Z M14.306,7.999 L10.775,7.999 C10.871,8.632 10.942,9.3 10.975,10.001 L14.913,10.001 C14.811,9.293 14.603,8.621 14.306,7.999 L14.306,7.999 Z"></path>
                </g>
            </g>
        </g>
    </g>
</svg>

              <span class="u-mr--- u-valing-middle">ESP</span>
              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
  <desc>down arrow</desc>
  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
</svg>

            </span>
            <ul class="u-initial-hide drop-menu__list-items">
              <?php $result = block_render('locale', 'language');
            print ($result);?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>