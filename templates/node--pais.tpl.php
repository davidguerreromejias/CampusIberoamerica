<?php
/**
 * @file
 * Returns the HTML for a block with bare minimum HTML.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728250
 */
?>


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
            <span class="u-color-gris"><?php print $node->field_nombre_oficial_pais[und][0]['value'] ; ?></span>
          </li>
			                <li>
                  <span class="display-only-down-sm img-bandera-pais"><?php print render($content['field_bandera']); ?></span>
                  
                </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print $node->field_nombre_oficial_pais[und][0]['value'] ; ?></div>
          <div class="u-f@md u-fs-xsmall u-pt u-mb+ horizontal-line-separator-top horizontal-line-separator-bottom">
            <div class="u-mb u-f-g1 u-f-align-center display-only-up-md">
              <?php print render($content['field_bandera']); ?>
            </div>
            <div class="u-f-g1 u-f-align-center u-align-right@md">

              <ul class="list-inline u-mb u-fs-xsmall u-uppercase">

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
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Superfície: ')?> <span style="font-weight: initial;"><?php print $node->field_superficie[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Población: ')?> <span style="font-weight: initial;"><?php print $node->field_poblacion[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Capital: ')?> <span style="font-weight: initial;"><?php print $node->field_capital_pais[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Otras ciudades de importancia: ')?> <span style="font-weight: initial;"><?php print $node->field_otras_ciudades_importantes[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Idioma: ')?> <span style="font-weight: initial;"><?php print $node->field_idioma[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Moneda: ')?> <span style="font-weight: initial;"><?php print $node->field_moneda[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Forma de estado: ')?> <span style="font-weight: initial;"><?php print $node->field_forma_de_estado[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('PIB: ')?> <span style="font-weight: initial;"><?php print $node->field_pib_2015[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div>
              <p class="u-mb- u-bold">
                <?php print t('Tasa de desempleo: ')?> <span style="font-weight: initial;"><?php print $node->field_tasa_de_desempleo[und][0]['value'] ; ?></span>
              </p>
            </div>
            <div class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('Requisitos legales para entrar:')?>
              </p>
              <p class="u-mb-">
                <?php print $node->field_requisitos_legales[und][0]['value'] ; ?>
              </p>
            </div>
            <div class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('Sistema de educación superior:')?>
              </p>
              <p class="u-mb-">
                <?php print $node->field_sistema_de_educacion[und][0]['value'] ; ?>
              </p>
            </div>
            <div class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('Programas de movilidad e intercambio académico')?>
              </p>
              <p class="u-mb-">
                <?php print $node->field_programas_de_movilidad[und][0]['value'] ; ?>
              </p>
            </div>
            <div class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('Enlaces de interés')?>
              </p>
              <p class="u-mb-">
                <?php print $node->field_enlaces_de_interes[und][0]['value'] ; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="u-mb display-only-up-md">
          <span class="img-mapa-pais"><?php print render($content['field_silueta_pais']); ?></span>
        </div>

        <div>
          <div class="u-mb u-color-gris u-fs-xsmall u-uppercase u-semibold">Programas relacionados</div>
          <?php  print views_embed_view('destacados', 'block_1');?>
        </div>
      </div>
    </div>
  </div>
</div>
