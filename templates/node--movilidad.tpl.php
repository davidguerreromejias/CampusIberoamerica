<div class="main-content container">

      <div class="site-content-wrapper">
  <div class="site-content">
    <div class="row">
      <div class="col-xs-12">
        <ul class="list-inline u-mb u-color-turquesa-oscuro u-fs-xsmall u-uppercase">
          <li>
            <i class="icon-house"> </i>
          </li>
          <li class="items-separator--arrow">
            Programas
          </li>
          <li class="items-separator--arrow">
            Pregrado
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++">
          <div class="u-mb+">
            <div class="block-info__separator u-mb"></div>
            <div class="block-info__title u-mb"><?php print $title;?></div>
            <div class="u-f@md u-fs-xsmall">
              <div class="u-f-g1">
                <ul class="list-inline">
                  <li class="items-separator items-separator--line">
                    <span class="u-color-naranja u-bold"><?php print $content['field_categoria_o_segmento']['#items'][0]['taxonomy_term']->name; ?></span>
                  </li>
                  <li>
                    <span class="u-color-gris"><?php print render($content['field_n_becas_concedidas']); ?> Becas</span>
                  </li>
                </ul>
              </div>
              <div class="u-f-g1 u-align-right@md">
                <ul class="list-inline u-mb u-fs-xsmall u-uppercase">
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
            </div>
            <div class="block-info__content u-mb+ "><?php print render($content['field_condiciones_movilidad']); ?></div>
            <div class="u-fs-xsmall">
              <?php $field = field_get_items('node', $node, 'field_pdf_video');
              if ($field) { ?>
                <ul class="list-inline u-mb u-color-turquesa u-fs-xsmall">
                  <li>
                    <div class="text-with-icon__content">
                      <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/descarga-icon.svg" alt="Descargar información">
                      <span class="u-color-gris-claro">Descargar</span>
                      <span class="u-semibold"><a href="<?php  print $node->field_pdf_video[und][0]['uri']; ?>" target="_blank">PDF informativo / Video informativo</a></span>
                    </div>
                  </li>
                </ul>
                    <?php } ?>
            </div>
          </div>

          <div class="u-mb++ display-only-down-sm">
            <div class="u-mb-- u-p u-color-blanco u-align-center u-backgroud-color-turquesa">
              <div  class="u-fs-h2 u-semibold">320</div>
              <div class="u-fs-xxsmall u-uppercase">estudiantes interesados</div>
            </div>
            <div>
              <a href="#" class="btn btn--action">
                <span class="u-fs-small u-semibold">Aplicar a este programa</span>
              </a>
            </div>
          </div>

          <div class="u-mb++">
            <?php $field = field_get_items('node', $node, 'field_duracion_del_programa');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Duración del programa:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_duracion_del_programa[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="u-mr+ u-semibold">
                Nombre del campo
              </div>
              <div class="u-f-g1">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit
              </div>
            </div>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="u-mr+ u-semibold">
                Nombre del campo
              </div>
              <div class="u-f-g1">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit
              </div>
            </div>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="u-mr+ u-semibold">
                Nombre del campo
              </div>
              <div class="u-f-g1">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit   Lorem ipsum dolor sit amet, consectetur adipisicing elit
              </div>
            </div>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="u-mr+ u-semibold">
                Nombre del campo
              </div>
              <div class="u-f-g1">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit   Lorem ipsum dolor sit amet, consectetur adipisicing elit   Lorem ipsum dolor sit amet, consectetur adipisicing elit
              </div>
            </div>
          </div>
          <div class="u-mb++">
            <button href="#" class="btn btn--action">
              <span class="u-semibold u-fs-small">Aplicar a este programa</span>
            </button>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
        <div class="display-only-up-md">
          <div class="u-mb-- u-p+ u-color-blanco u-align-center u-backgroud-color-turquesa">
            <div  class="u-fs-h1 u-bold">320</div>
            <div class="u-fs-xxsmall u-uppercase">estudiantes interesados</div>
          </div>
          <div class="u-mb++">
            <button href="#" class="btn btn--action">
              <span class="u-semibold u-fs-small">Aplicar a este programa</span>
            </button>
          </div>
        </div>

        <div class="u-mb++">
          <div class="u-mb u-color-gris u-fs-xsmall u-uppercase u-semibold">informacion útil</div>
          <ul class="u-color-turquesa u-fs-small u-semibold">
            <li>
              <div class="text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
                Prepara tu viaje
              </div>
            </li>
            <li class="horizontal-line-separator-top">
              <div class="text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/punto-icon_small.svg" alt="Información de los paises">
                Información de los paises
              </div>
            </li>
            <li class="horizontal-line-separator-top">
              <div class="text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/dialogo-icon_small.svg" alt="Preguntas frecuentes">
                Preguntas frecuentes
              </div>
            </li>
          </ul>
        </div>

        <div>
          <div class="u-mb u-color-gris u-fs-xsmall u-uppercase u-semibold">Programas relacionados</div>
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


    </div>