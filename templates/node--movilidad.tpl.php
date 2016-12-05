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
            <span class="plazo-cerrado open"></span>
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
              <div  class="u-fs-h2 u-semibold">57</div>
              <div class="u-fs-xxsmall u-uppercase">estudiantes interesados</div>
            </div>
            <div>
              <a href="<?php  print $node->field_enlace_programa[und][0]['url']; ?>" target="_blank" class="btn btn--action">
                <span class="u-fs-small u-semibold">Aplicar a este programa</span>
              </a>
            </div>
          </div>

                    <div class="u-pt+ u-fs-xsmall">
            <div class="panel">
              <div class="panel-heading">
                <div>
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    <?php print t('Descripción del programa')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <!-- Duración del programa -->

              <div class="u-mb++">
                <?php $field = field_get_items('node', $node, 'field_duracion_del_programa');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Duración del programa:')?>
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
                        <?php print t('País/es de origen del solicitante:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php 
                        $cont = count($content['field_pais_origen_solicitante']['#items']);
                        for ($i = 0; $i <  $cont - 1; $i++) {
                            print $content['field_pais_origen_solicitante']['#items'][$i]['taxonomy_term']->name;
                            echo ", "; 
                        }
                        print $content['field_pais_origen_solicitante']['#items'][($cont-1)]['taxonomy_term']->name;?>
                      </div>
                    </div>
                  <?php } ?>

                  <!-- Nacionalidad -->


                <?php $field = field_get_items('node', $node, 'field_nacionalidad');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Nacionalidad del solicitante:')?>
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
                        <?php print t('Univ/centros de origen del solicitante:')?>
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
                        <?php print t('Requisitos solicitante:')?>
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
                        <?php print t('Idiomas requeridos al solicitante:')?>
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
                        <?php print t('País/es de destino:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php 
                        $cont = count($content['field_ambito_pais']['#items']);
                        for ($i = 0; $i <  $cont - 1; $i++) {
                            print $content['field_ambito_pais']['#items'][$i]['taxonomy_term']->name;
                            echo ", "; 
                        }
                        print $content['field_ambito_pais']['#items'][($cont-1)]['taxonomy_term']->name;?>
                      </div>
                    </div>
                  <?php } ?>

                  <!-- Univ/Centro de destino -->

                <?php $field = field_get_items('node', $node, 'field__mbito_univ_centro');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Univ/Centro de destino:')?>
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
                        <?php print t('Área de conocimiento:')?>
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
                        <?php print t('Especialidad:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $content['field_ambito_subarea_conocimient']['#items'][0]['taxonomy_term']->name; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Prespuesto total de la oferta  -->

                <?php $field = field_get_items('node', $node, 'field_prespuesto_total_oferta');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Prespuesto total de la oferta:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php 
                          $number_eur = number_format($node->field_prespuesto_total_oferta[und][0]['value'], 2, ',', '.'); 
                          print $number_eur; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Tipo de moneda -->

                <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Tipo de moneda:')?>
                      </div>
                      <div class="u-f-g1">
                        
                        <?php
                          $wrapper = entity_metadata_wrapper('node', $node);
                          $label = $wrapper->field_tipo_de_moneda->label();
                          print $label; 
                         ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Fecha límite envío solicitud -->

                <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Fecha límite envío solicitud:')?>
                      </div>
                      <div class="u-f-g1 plazo-solicitud-fin" id="node-<?php print $node->nid; ?>">
                        <?php
                          global $language ;
                          $curlang = $language->language;
                        ?> 
                        <?php if($curlang == 'es'){
                          setlocale(LC_ALL, 'es_ES');
                        }?>
                        <?php echo (strftime("%d %B %Y", strtotime($node->field_plazo_para_solicitud_inici['und'][0]['value2'])));?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Cómo enviar la candidatura  -->

                <?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Cómo enviar la candidatura:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print_r($node->field_c_mo_enviar_candidatura);?>
                        <?php print $node->field_c_mo_enviar_candidatura[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>
              </div>
            </div>
            <!-- SOLO SI ES INVESTIGACIÓN -->

                <?php $field = field_get_items('node', $node, 'field_categoria_o_segmento');
                  ?><p><?php $investigador = $content['field_categoria_o_segmento']['#items'][0]['taxonomy_term']->name; ?> </p>
                  <?php if ($investigador == "Investigación / docencia") {
                    ?>
            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    <?php print t('Investigadores')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                
                    <?php

                    // Prespuesto total de la oferta 

                    $field = field_get_items('node', $node, 'field_prespuesto_total_oferta'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Prespuesto total de la oferta:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_prespuesto_total_oferta[und][0]['value'] ; ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php 
                    // Incluye salario del beneficiario?  

                    $field = field_get_items('node', $node, 'field_incluye_salario'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Incluye salario del beneficiario?')?>
                        </div>
                        <div class="u-f-g1">
                          <?php if ($node->field_incluye_salario[und][0]['value'] == 1){?> Si
                          <?php }
                          if ($node->field_incluye_salario[und][0]['value'] == 0){?> 
                          No <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php 
                    // Salario del beneficiario  

                    $field = field_get_items('node', $node, 'field_salario_del_beneficiario'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Salario del beneficiario')?>
                        </div>
                        <div class="u-f-g1">
                          <?php 
                          $number_eur = number_format($node->field_salario_del_beneficiario[und][0]['value'], 2, ',', '.'); 
                          print $number_eur; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    // Incluye gastos de desplazamiento?  

                    $field = field_get_items('node', $node, 'field_incluye_gastos_desplazamen'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Incluye gastos de desplazamiento?')?>
                        </div>
                        <div class="u-f-g1">
                          <?php if ($node->field_incluye_gastos_desplazamen[und][0]['value'] == 1){?> Si
                          <?php }
                          if ($node->field_incluye_gastos_desplazamen[und][0]['value'] == 0){?> 
                          No <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php 
                    //Gastos de desplazamiento 

                    $field = field_get_items('node', $node, 'field_gastos_de_desplazamiento'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Gastos de desplazamiento')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_gastos_de_desplazamiento[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Incluye manutención ?  

                    $field = field_get_items('node', $node, 'field_incluye_manutencion'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Incluye manutención?')?>
                        </div>
                        <div class="u-f-g1">
                          <?php if ($node->field_incluye_manutencion[und][0]['value'] == 1){?> Si
                          <?php }
                          if ($node->field_incluye_manutencion[und][0]['value'] == 0){?> 
                          No <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php 
                    //Manutención

                    $field = field_get_items('node', $node, 'field_manutencion'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Manutención')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_manutencion[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Incluye otros costes?  

                    $field = field_get_items('node', $node, 'field_incluye_otros_costes'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Incluye otros costes?')?>
                        </div>
                        <div class="u-f-g1">
                          <?php if ($node->field_incluye_otros_costes[und][0]['value'] == 1){?> Si
                          <?php }
                          if ($node->field_incluye_otros_costes[und][0]['value'] == 0){?> 
                          No <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php 
                    //Otros costes

                    $field = field_get_items('node', $node, 'field_otros_costes'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Otros costes')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_otros_costes[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Mes de llegada

                    $field = field_get_items('node', $node, 'field_mes_de_llegada'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Mes de llegada:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php echo date('F Y', strtotime($node->field_mes_de_llegada['und'][0]['value']));?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Web/comentario

                    $field = field_get_items('node', $node, 'field_web_comentario'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Web/comentario:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_web_comentario[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Fecha prevista inicio trabajo

                    $field = field_get_items('node', $node, 'field_fecha_prevista_inicio_trab'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Fecha prevista inicio trabajo:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php echo date('d F Y', strtotime($node->field_fecha_prevista_inicio_trab['und'][0]['value']));?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Nivel de estudios requerido

                    $field = field_get_items('node', $node, 'field_nivel_estudios_requerido'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Nivel de estudios requerido:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_nivel_estudios_requerido[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Otros requisitos

                    $field = field_get_items('node', $node, 'field_otros_requisitos'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Otros requisitos:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_otros_requisitos[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>

                    <?php 
                    //Otros criterios de elegibilidad

                    $field = field_get_items('node', $node, 'field_otros_criterios_de_elegibi'); 
                    if ($field) { ?>
                      <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Otros criterios de elegibilidad:')?>
                        </div>
                        <div class="u-f-g1">
                          <?php print $node->field_otros_criterios_de_elegibi[und][0]['value'] ; ?>
                      </div>
                    </div>
                    <?php } ?>
                    </div>
            </div>
                  <?php } ?>
              

            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    <?php print t('Datos de la institución que promueve la movilidad')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <!-- Univ/Centro responsable  -->

                <?php $field = field_get_items('node', $node, 'field_univ_centro_responsable');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Univ/Centro responsable:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $content['field_univ_centro_responsable']['#items'][0]['taxonomy_term']->name; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Tipo de institución  -->

                <?php $field = field_get_items('node', $node, 'field_tipo_de_instituci_n');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Tipo de institución:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_tipo_de_instituci_n[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Persona de contacto -->

                <?php $field = field_get_items('node', $node, 'field_persona_de_contacto');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Persona de contacto:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_persona_de_contacto[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Cargo -->

                <?php $field = field_get_items('node', $node, 'field_cargo');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Cargo:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_cargo[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Email -->

                <?php $field = field_get_items('node', $node, 'field_email_uni_cr');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Email:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_email_uni_cr[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Teléfono/s -->

                <?php $field = field_get_items('node', $node, 'field_tfno');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Teléfono/s:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_tfno[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Departamento -->

                <?php $field = field_get_items('node', $node, 'field_departamento');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Departamento:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_departamento[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Dirección -->

                <?php $field = field_get_items('node', $node, 'field_direccion');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Dirección:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_direccion[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Código postal -->

                <?php $field = field_get_items('node', $node, 'field_codigo_postal');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Código postal:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_codigo_postal[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Ciudad -->

                <?php $field = field_get_items('node', $node, 'field_ciudad');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Ciudad:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_ciudad[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>

                <!-- Página web -->

                <?php $field = field_get_items('node', $node, 'field_pagina_web');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="u-mr+ u-semibold">
                        <?php print t('Página web:')?>
                      </div>
                      <div class="u-f-g1">
                        <?php print $node->field_pagina_web[und][0]['value'] ; ?>
                      </div>
                    </div>
                  <?php } ?>
              </div>
            </div>
          </div>
          </div>
          <div class="u-mb++">
            <a href="<?php  print $node->field_enlace_programa[und][0]['url']; ?>" target="_blank" class="btn btn--action">
              <span class="u-semibold u-fs-small">Aplicar a este programa</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
        <div class="display-only-up-md">
          <div class="u-mb-- u-p+ u-color-blanco u-align-center u-backgroud-color-turquesa">
            <div  class="u-fs-h1 u-bold">57</div>
            <div class="u-fs-xxsmall u-uppercase">estudiantes interesados</div>
          </div>
          <div class="u-mb++">
            <a href="<?php  print $node->field_enlace_programa[und][0]['url']; ?>" target="_blank" class="btn btn--action">
              <span class="u-semibold u-fs-small">Aplicar a este programa</span>
            </a>
          </div>
        </div>

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
        <div>
          <div class="u-mb u-color-gris u-fs-xsmall u-uppercase u-semibold" style="margin-top: 20px;">Programas relacionados</div>
          <?php  print views_embed_view('destacados', 'block_1');?>
        </div>

      </div>
    </div>
  </div>
</div>


    </div>