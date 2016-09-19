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
            <span class="u-color-gris">Preguntas frecuentes</span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold">Preguntas frecuentes</div>
          <div class="horizontal-line-separator-top horizontal-line-separator-bottom u-pv u-align-right@md">
            <ul class="list-inline u-mb0 u-fs-xsmall u-uppercase">
              <li>
                <span class="u-color-gris-claro u-fs-xxsmall">
                  Compartir
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

          <!-- panel group -->
          <div class="u-pt+ u-fs-xsmall">
            <div class="panel">
              <div class="panel-heading">
                <div>
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    Collapsible Group 1
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.
                  </p>
                </div>
              </div>
            </div>

            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Collapsible Group 2
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.
                  </p>
                  <p class="u-mb">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora accusamus quas obcaecati maxime totam nemo eaque voluptas excepturi, enim ab eveniet dignissimos veniam saepe nulla laudantium perferendis quaerat, consectetur officiis?
                  </p>
                </div>
              </div>
            </div>

            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Collapsible Group 3
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.
                  </p>
                  <p class="u-mb">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora accusamus quas obcaecati maxime totam nemo eaque voluptas excepturi, enim ab eveniet dignissimos veniam saepe nulla laudantium perferendis quaerat, consectetur officiis?
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
        <div class="u-mb+++">
          <div class="u-pb- u-color-gris u-fs-xsmall u-uppercase u-semibold horizontal-line-separator-bottom">Información útil</div>
          <ul class="u-color-turquesa u-fs-small u-semibold">
            <li>
              <a href="../prepara-viaje" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
                Prepara tu viaje
              </a>
            </li>
            <li class="horizontal-line-separator-top">
              <a href="../info-paises" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/punto-icon_small.svg" alt="Información de los países">
                Información de los paises
              </a>
            </li>
            <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
              <a href="../preguntas-frecuentes" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/dialogo-icon_small.svg" alt="Preguntas frecuentes">
                Preguntas frecuentes
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>