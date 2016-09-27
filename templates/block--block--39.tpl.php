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
        <ul class="list-inline u-mb u-color-turquesa u-fs-xsmall u-uppercase">
          <li>
            <a href="../" class="link">
              <i class="icon-house u-color-turquesa"></i>
            </a>
          </li>
          <li class="items-separator--arrow">
            <a href="../info-paises" class="link">
              <?php print t('Información de los paises')?>
            </a>
          </li>
          <li class="items-separator--arrow">
            <span class="u-color-gris"><?php print t('Perú')?></span>
          </li>

        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Perú')?></div>
          <div class="u-f@md u-fs-xsmall u-pt u-mb+ horizontal-line-separator-top horizontal-line-separator-bottom">
            <div class="u-mb u-f-g1 u-f-align-center display-only-up-md">
              <img class="img-bandera-pais" src="/sites/all/themes/zen/Nexos/assets/images/bandera-peru.png" alt="Bandera de Perú">
            </div>
            <div class="u-f-g1 u-f-align-center u-align-right@md">

              <ul class="list-inline u-mb u-fs-xsmall u-uppercase">
                <li>
                  <img class="display-only-down-sm img-bandera-pais" src="/sites/all/themes/zen/Nexos/assets/images/bandera-peru.png" alt="Bandera de Perú">
                </li>
                <li>
                  <span class="u-color-gris-claro u-fs-xxsmall">
                    <?php print t('Compartir')?>
                  </span>
                </li>
                <li>
                  <a href="" class="u-color-turquesa">
                    <i class="icon-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="link u-color-turquesa">
                    <i class="icon-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="link u-color-turquesa">
                    <i class="icon-sobre"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-mb">
            <div class="u-mb++">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div  class="u-mb++">
              <p class="u-mb- u-bold">
                Requisitos legales para el viaje
              </p>
              <p class="u-mb-">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="u-mb-">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <p class="u-mb-">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </p>
            </div>
            <div class="u-mb++">
              <p class="u-mb- u-bold">
                A tener en cuenta
              </p>
              <p class="u-mb-">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="u-mb-">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                Enlaces de interés
              </p>
              <ul class="u-mb u-color-turquesa u-fs-xsmall">
                <li>
                  <a href="#" class="link text-with-icon__content">
                    <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/enlace-icon.svg" alt="Ampliar información">
                    <span class="u-semibold">Ampliar información</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="u-mb display-only-up-md">
          <img class="img-mapa-pais" src="/sites/all/themes/zen/Nexos/assets/images/mapa-peru.png" alt="Mapa Perú">
        </div>

        <div>
          <div class="u-mb u-pb- horizontal-line-separator-bottom u-color-gris u-fs-xsmall u-uppercase u-semibold">Programas seleccionados</div>
          <ul>
            <li class="u-mb+">
              <div class="u-mb-- block-info__separator"></div>
              <div class="u-mb- u-fs-xsmall u-semibold">Becas de Escuela de liderazgo. Univ. Francisco de Vitoria</div>
              <div class="u-fs-xxsmall">
                <ul class="list-inline">
                  <li class="items-separator items-separator--line">
                    <span class="u-color-naranja u-bold">Pregrado</span>
                  </li>
                  <li>
                    <span class="u-color-gris">210 becas</span>
                  </li>
                </ul>
              </div>
            </li>
            <li class="u-mb+">
              <div class="block-info__separator u-mb--"></div>
              <div class="u-mb- u-fs-xsmall u-semibold">Becas de Escuela de liderazgo. Univ. Francisco de Vitoria</div>
              <div class="u-fs-xxsmall">
                <ul class="list-inline">
                  <li class="items-separator items-separator--line ">
                    <span class="u-color-naranja u-bold">Pregrado</span>
                  </li>
                  <li>
                    <span class="u-color-gris">210 becas</span>
                  </li>
                </ul>
              </div>
            </li>
            <li class="u-mb+">
              <div class="block-info__separator u-mb--"></div>
              <div class="u-mb- u-fs-xsmall u-semibold">Becas de Escuela de liderazgo. Univ. Francisco de Vitoria</div>
              <div class="u-fs-xxsmall">
                <ul class="list-inline">
                  <li class="items-separator items-separator--line ">
                    <span class="u-color-naranja u-bold">Pregrado</span>
                  </li>
                  <li>
                    <span class="u-color-gris">210 becas</span>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
