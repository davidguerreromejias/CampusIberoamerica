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

          <!-- Duración del programa -->

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

              <!-- País de origen del solicitante -->

            <?php $field = field_get_items('node', $node, 'field_pais_origen_solicitante');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    País/es de origen del solicitante:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_pais_origen_solicitante']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

              <!-- Nacionalidad -->


            <?php $field = field_get_items('node', $node, 'field_nacionalidad');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Nacionalidad del solicitante:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_nacionalidad']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

              <!-- Univ/centros de origen del solicitante TODO!!!!!-->

            <?php $field = field_get_items('node', $node, 'field_nacionalidad');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Univ/centros de origen del solicitante:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_nacionalidad']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Requisitos solicitante -->

            <?php $field = field_get_items('node', $node, 'field_requisitos_solicitante');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Requisitos solicitante:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_requisitos_solicitante[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Idiomas requeridos al solicitante  -->

            <?php $field = field_get_items('node', $node, 'field_idiomas_requeridos');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Idiomas requeridos al solicitante:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_idiomas_requeridos[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- País/es de destino   -->

            <?php $field = field_get_items('node', $node, 'field_ambito_pais');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    País/es de destino:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_ambito_pais']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

              <!-- Univ/Centro de destino -->

            <?php $field = field_get_items('node', $node, 'field__mbito_univ_centro');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Univ/Centro de destino:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field__mbito_univ_centro']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Área de conocimiento -->

            <?php $field = field_get_items('node', $node, 'field_ambito_area_conocimiento');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Área de conocimiento:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_ambito_area_conocimiento']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Especialidad -->

            <?php $field = field_get_items('node', $node, 'field_ambito_subarea_conocimient');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Especialidad:
                  </div>
                  <div class="u-f-g1">
                    <?php print $content['field_ambito_subarea_conocimient']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Cuantía o presupuesto  -->

            <?php $field = field_get_items('node', $node, 'field_cuantia');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Cuantía o presupuesto:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_cuantia[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Tipo de moneda -->

            <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Tipo de moneda:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_tipo_de_moneda[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- Fecha límite envío solicitud -->

            <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Fecha límite envío solicitud:
                  </div>
                  <div class="u-f-g1">
                    <?php echo date('d F Y', strtotime($node->field_plazo_para_solicitud_inici['und'][0]['value2']));?>
                  </div>
                </div>
              <?php } ?>

            <!-- Cómo enviar la candidatura  -->

            <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="u-mr+ u-semibold">
                    Cómo enviar la candidatura:
                  </div>
                  <div class="u-f-g1">
                    <?php print $node->field_c_mo_enviar_candidatura[und][0]['value'] ; ?>
                  </div>
                </div>
              <?php } ?>

            <!-- SOLO SI ES INVESTIGACIÓN -->

            <?php $field = field_get_items('node', $node, 'field_categoria_o_segmento');
              echo $content['field_categoria_o_segmento']['#items'][0]['taxonomy_term']->name;
              if ($content['field_categoria_o_segmento']['#items'][0]['taxonomy_term']->name == 'Investigación / docencia') {

                // Prespuesto total de la oferta 

                $field = field_get_items('node', $node, 'field_prespuesto_total_oferta  '); 
                if ($field) { ?>
                  <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                    <div class="u-mr+ u-semibold">
                      Prespuesto total de la oferta:
                    </div>
                    <div class="u-f-g1">
                      <?php print $node->field_prespuesto_total_oferta[und][0]['value'] ; ?>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>













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