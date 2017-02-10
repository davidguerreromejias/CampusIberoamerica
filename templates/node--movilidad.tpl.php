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
            <div class="block-info__title u-mb"><?php print render($content['field_nombre_del_programa']);?></div>
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
            <span class="plazo-cerrado open"></span>
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
              <div class="row">

			  
			  <!-- institucion_que_promueve-->
			  			
				<?php $field = field_get_items('node', $node, 'field_institucion_que_promueve');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold"> 
                <?php print t('Institución que promueve:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $cont = count($content['field_institucion_que_promueve']['#items']);
                  for ($i = 0; $i <  $cont - 1; $i++) {
                      print $content['field_institucion_que_promueve']['#items'][$i]['taxonomy_term']->name;
                      echo ", "; 
                  }
                  print $content['field_institucion_que_promueve']['#items'][($cont-1)]['taxonomy_term']->name;?>
                </div>
              </div>
            </div>
        <?php } ?>

			  <!-- nombre_del_programa-->

			  <?php $field = field_get_items('node', $node, 'field_nombre_del_programa'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Nombre del programa/oferta:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_nombre_del_programa[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>
			  
			  <!-- condiciones_movilidad-->

			  <?php $field = field_get_items('node', $node, 'field_condiciones_movilidad'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Descripción de la oferta:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_condiciones_movilidad[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

			  <!-- n_movilidades_disponibles-->

			  <?php $field = field_get_items('node', $node, 'field_n_movilidades_disponibles'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Nº de movilidades disponibles:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_n_movilidades_disponibles[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Convocatoria -->

        <?php $field = field_get_items('node', $node, 'field_convocatoria_ano');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Convocatoria (año):')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_convocatoria_ano[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Fecha límite para envío solicitud -->

        <?php $field = field_get_items('node', $node, 'field_plazo_para_solicitud_inici');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Fecha límite para envío solicitud:')?>
                </div>
              </div>
              <div class="u-f-g1 plazo-solicitud-fin" id="node-<?php print $node->nid; ?>">
                <div>
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
            </div>
        <?php } ?>

        <!-- Periodicidad -->

        <?php $field = field_get_items('node', $node, 'field_periodicidad');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                      <?php print t('Periodicidad:')?>
                    </div>
                  </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_periodicidad[und][0]['value'] ; ?>
                  </div>
                </div>
            </div>
          <?php } ?>

				<!-- Categoria o segmento al que aplica -->
				
				<?php $field = field_get_items('node', $node, 'field_categoria_o_segmento');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Categoria o segmento al que aplica:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php $cont = count($content['field_categoria_o_segmento']['#items']);
                    for ($i = 0; $i <  $cont - 1; $i++) {
                        print $content['field_categoria_o_segmento']['#items'][$i]['taxonomy_term']->name;
                        echo ", "; 
                    }
                    print $content['field_categoria_o_segmento']['#items'][($cont-1)]['taxonomy_term']->name;?>
                </div>
              </div>
            </div>
        <?php } ?>
				  
				 <!-- Tipo de moneda -->
				 
				<?php $field = field_get_items('node', $node, 'field_tipo_de_moneda');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Tipo de moneda:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print render($content['field_tipo_de_moneda']); ?>
                </div>
              </div>
            </div>
        <?php } ?>
				
				<!-- Cuantía o presupuesto por beneficiario -->
				 
				<?php $field = field_get_items('node', $node, 'field_cuantia_o_presupuesto');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Cuantía o presupuesto por beneficiario:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_cuantia_o_presupuesto[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>
				
				<!-- Presupuesto total de la oferta  -->
				
				<?php $field = field_get_items('node', $node, 'field_prespuesto_total_oferta');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Prespuesto total de la oferta:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $number_eur = number_format($node->field_prespuesto_total_oferta[und][0]['value'], 2, ',', '.'); 
                    print $number_eur; ?>
                </div>
              </div>
            </div>
        <?php } ?>
				  
				<!-- Incluye salario del beneficiario  -->
          <!-- El campo inc_sal condiciona si se muestran los campos salario del beneficiario,
           incluye gastos de desplazamiento, gastos de desplazamiento, incluye manutención, 
           manutención, incluye otros costes, otros costes   -->
				
				<?php $field = field_get_items('node', $node, 'field_incluye_salario_beneficiar'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Incluye salario del beneficiario?')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php 
                  $inc_sal = $node->field_incluye_salario_beneficiar[und][0]['value'];
                  if ($inc_sal == 1){?> Si
                  <?php }
                  if ($inc_sal == 0){?> 
                  No <?php } ?>
                </div>
              </div>
            </div>
        <?php } ?>
				
				<!-- Salario del beneficiario -->
				
				<?php 
          if ($inc_sal == 1){
          $field = field_get_items('node', $node, 'field_salario_del_beneficiario'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Salario del beneficiario')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $number_eur = number_format($node->field_salario_del_beneficiario[und][0]['value'], 2, ',', '.'); 
                  print $number_eur; ?>
                </div>
              </div>
            </div>
        <?php }} ?>
					
				<!-- Incluye gastos de desplazamiento -->
				
				<?php 
          if ($inc_sal == 1){
          $field = field_get_items('node', $node, 'field_incluye_gastos_de_desplaza'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Incluye gastos de desplazamiento?')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php if ($node->field_incluye_gastos_de_desplaza[und][0]['value'] == 1){?> Si
                  <?php }
                  if ($node->field_incluye_gastos_de_desplaza[und][0]['value'] == 0){?> 
                  No <?php } ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
				<!-- Gastos de desplazamiento -->
				
				<?php 
          if ($inc_sal == 1){
          $field = field_get_items('node', $node, 'field_gastos_de_desplazamiento'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Gastos de desplazamiento')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $number_eur = number_format($node->field_gastos_de_desplazamiento[und][0]['value'], 2, ',', '.'); 
                  print $number_eur; ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
				<!-- Incluye manutención -->
				
				<?php 
          if ($inc_sal == 1){
          $field = field_get_items('node', $node, 'field_incluye_manutencion'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Incluye manutención?')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php if ($node->field_incluye_manutencion[und][0]['value'] == 1){?> Si
                  <?php }
                  if ($node->field_incluye_manutencion[und][0]['value'] == 0){?> 
                  No <?php } ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
				<!-- Manutención -->
				
				<?php 
          if ($inc_sal == 1){
          $field = field_get_items('node', $node, 'field_manutencion'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Manutención:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $number_eur = number_format($node->field_manutencion[und][0]['value'], 2, ',', '.'); 
                  print $number_eur; ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
				<!-- Incluye otros costes -->
				
				<?php $field = field_get_items('node', $node, 'field_incluye_otros_costes'); 
          if ($inc_sal == 1){
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Incluye otros costes?')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php if ($node->field_incluye_otros_costes[und][0]['value'] == 1){?> Si
                  <?php }
                  if ($node->field_incluye_otros_costes[und][0]['value'] == 0){?> 
                  No <?php } ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
				<!-- Otros costes -->
				
				<?php $field = field_get_items('node', $node, 'field_otros_costes'); 
          if ($inc_sal == 1){
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Otros costes:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php 
                  $number_eur = number_format($node->field_otros_costes[und][0]['value'], 2, ',', '.'); 
                  print $number_eur; ?>
                </div>
              </div>
            </div>
        <?php }} ?>
				
        <!-- País/es de origen del solicitante -->
				
				<?php $field = field_get_items('node', $node, 'field_pais_origen_solicitante');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">  
                  <?php print t('País/es de origen del solicitante:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php $cont = count($content['field_pais_origen_solicitante']['#items']);
                  for ($i = 0; $i <  $cont - 1; $i++) {
                      print $content['field_pais_origen_solicitante']['#items'][$i]['taxonomy_term']->name;
                      echo ", "; 
                  }
                  print $content['field_pais_origen_solicitante']['#items'][($cont-1)]['taxonomy_term']->name;?>
                </div>
              </div>
            </div>
        <?php } ?>
				
				<!-- Univ/ Centro origen del solicitante -->
				
        <?php $field = field_get_items('node', $node, 'field_universidad_centro_origen_');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Univ/centros de origen del solicitante:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $content['field_universidad_centro_origen_']['#items'][0]['taxonomy_term']->name; ?>
                </div>
              </div>
            </div>
        <?php } ?>
				
				<!-- Duración del programa/movilidad -->
              
        <?php $field = field_get_items('node', $node, 'field_duraci_n_del_programa_movi');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Duración del programa:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                <?php print $node->field_duraci_n_del_programa_movi[und][0]['from'] ; ?> - 
                <?php print $node->field_duraci_n_del_programa_movi[und][0]['to'] ; ?>
                <?php print $node->field_unidad_de_la_duracion[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>
				  
				<!-- Mes de llegada -->

        <?php $field = field_get_items('node', $node, 'field_mes_de_llegada');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Mes de llegada:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php
                    global $language ;
                    $curlang = $language->language;
                  ?> 
                  <?php if($curlang == 'es'){
                    setlocale(LC_ALL, 'es_ES');
                  }?>
                  <?php echo (strftime("%d %B %Y", strtotime($node->field_mes_de_llegada['und'][0]['value'])));?>
                </div>
              </div>
            </div>
        <?php } ?>
				  
				<!-- Fecha prevista inicio trabajo -->

        <?php $field = field_get_items('node', $node, 'field_fecha_prevista_inicio_trab');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Fecha prevista inicio trabajo:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php
                    global $language ;
                    $curlang = $language->language;
                  ?> 
                  <?php if($curlang == 'es'){
                    setlocale(LC_ALL, 'es_ES');
                  }?>
                  <?php echo (strftime("%d %B %Y", strtotime($node->field_fecha_prevista_inicio_trab['und'][0]['value'])));?>
                </div>
              </div>
            </div>
          <?php } ?>
				  
				  <!-- Requisitos solicitante -->
				  
				  <?php $field = field_get_items('node', $node, 'field_requisitos_solicitante');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Requisitos solicitante:')?>
                  </div>
                </div>
                  <div class="u-f-g1">
                    <div>
                      <?php print $node->field_requisitos_solicitante[und][0]['value'] ; ?>
                    </div>
                  </div>
              </div>
          <?php } ?>
				  
				  <!-- País de destino -->
        
            <?php $field = field_get_items('node', $node, 'field_ambito_pais');
              if ($field) { ?>
                <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                  <div class="col-md-4">
                    <div class="u-mr+ u-semibold">
                      <?php print t('País de destino:')?>
                    </div>
                  </div>
                  <div class="u-f-g1">
                    <div>
                      <?php print $content['field_ambito_pais']['#items'][0]['taxonomy_term']->name; ?>
                    </div>
                  </div>
                </div>
            <?php } ?>
				  
				  <!-- Universidad/Centro Destino -->

          <?php $field = field_get_items('node', $node, 'field__mbito_univ_centro');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Universidad/Centro Destino:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $content['field__mbito_univ_centro']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              </div>
          <?php } ?>

          <!-- Área de conocimiento -->

          <?php $field = field_get_items('node', $node, 'field_ambito_area_conocimiento');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Área de conocimiento:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $content['field_areas_y_subareas']['#items'][0]['taxonomy_term']->name; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Subárea de conocimiento -->

          <?php $field = field_get_items('node', $node, 'field_ambito_subarea_conocimient');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Subárea de conocimiento:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $content['field_areas_y_subareas']['#items'][1]['taxonomy_term']->name; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Nivel de estudios requerido -->

          <?php $field = field_get_items('node', $node, 'field_nivel_estudios_requerido');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Nivel de estudios requerido:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_nivel_estudios_requerido[und][0]['value'] ; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Estudios requeridos -->

          <?php $field = field_get_items('node', $node, 'field_estudios_requeridos'); 
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Estudios requeridos:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_estudios_requeridos[und][0]['value'] ; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Otros requisitos -->

          <?php $field = field_get_items('node', $node, 'field_otros_requisitos'); 
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Otros requisitos:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_otros_requisitos[und][0]['value'] ; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Idiomas requeridos al solicitante -->
				  
				  <?php $field = field_get_items('node', $node, 'field_idiomas_requeridos_al_soli');
                  if ($field) { ?>
                    <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                      <div class="col-md-4">
                        <div class="u-mr+ u-semibold">
                          <?php print t('Idiomas requeridos al solicitante:')?>
                        </div>
                      </div>
                      <div class="u-f-g1">
                        <div>
                          <?php print $node->field_idiomas_requeridos_al_soli[und][0]['value'] ; ?>
                        </div>
                      </div>
                    </div>
          <?php } ?>
				  
				  <!-- Otros criterios de elegibilidad -->

          <?php $field = field_get_items('node', $node, 'field_otros_criterios_de_elegibi'); 
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Otros criterios de elegibilidad:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_otros_criterios_de_elegibi[und][0]['value'] ; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Enlace programa -->

          <?php $field = field_get_items('node', $node, 'field_enlace_programa'); 
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Enlace programa:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <a href="<?php print $node->field_enlace_programa[und][0]['url'] ; ?>"><?php print $node->field_enlace_programa[und][0]['title'] ; ?></a>
                  </div>
                </div>
              </div>
          <?php } ?>
				  
				  <!-- Cómo enviar la candidatura -->
				  
				  <?php $field = field_get_items('node', $node, 'field_c_mo_enviar_la_candidatura');
            if ($field) { ?>
              <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
                <div class="col-md-4">
                  <div class="u-mr+ u-semibold">
                    <?php print t('Cómo enviar la candidatura:')?>
                  </div>
                </div>
                <div class="u-f-g1">
                  <div>
                    <?php print $node->field_c_mo_enviar_la_candidatura[und][0]['value'] ; ?>
                  </div>
                </div>
              </div>
          <?php } ?>
        </div>
      </div>

        <!-- Datos de gestión y de la institución que promueve la movilidad -->

        <div class="panel horizontal-line-separator-top">
          <div class="panel-heading">
            <div class="u-color-turquesa">
              <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                <?php print t('Datos de gestión y de la institución que promueve la movilidad')?>
                <i class="collapsed-block__icon"> </i>
              </a>
            </div>
          </div>
          <div id="collapse2" class="panel-collapse collapse">


        <!-- Univ/Centro Responsable -->

        <?php $field = field_get_items('node', $node, 'field_univ_centro_responsable');
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Univ/Centro Responsable:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $content['field_univ_centro_responsable']['#items'][0]['taxonomy_term']->name; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Tipo de institución -->

        <?php $field = field_get_items('node', $node, 'field_tipo_de_instituci_n');
        if ($field) { ?>
          <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
            <div class="col-md-4">
              <div class="u-mr+ u-semibold">
                <?php print t('Tipo de institución:')?>
              </div>
            </div>
            <div class="u-f-g1">
               <div>
                <?php print $node->field_tipo_de_instituci_n[und][0]['value'] ; ?>
               </div>
            </div>
          </div>
        <?php } ?>

        <!-- Persona de contacto -->

        <?php $field = field_get_items('node', $node, 'field_persona_de_contacto'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Persona de contacto:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_persona_de_contacto[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Cargo -->

        <?php $field = field_get_items('node', $node, 'field_cargo'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Cargo:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_cargo[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Email -->

        <?php $field = field_get_items('node', $node, 'field_email'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Email:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_email[und][0]['email'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Teléfono -->

        <?php $field = field_get_items('node', $node, 'field_tel_fono'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Teléfono:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_tel_fono[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Departamento que ofrece vacante -->

        <?php $field = field_get_items('node', $node, 'field_departamento'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Departamento que ofrece vacante:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_departamento[und][0]['value'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Dirección -->

        <?php $field = field_get_items('node', $node, 'field_c_digo_postal'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Dirección:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <?php print $node->field_c_digo_postal[und][0]['thoroughfare'] ; ?>, <?php print $node->field_c_digo_postal[und][0]['postal_code'] ; ?>
                  <?php print $node->field_c_digo_postal[und][0]['locality'] ; ?>
                </div>
              </div>
            </div>
        <?php } ?>

        <!-- Enlace a institución -->

        <?php $field = field_get_items('node', $node, 'field_enlace_a_instituci_n'); 
          if ($field) { ?>
            <div class="u-f u-mb u-pt u-fs-xsmall horizontal-line-separator-top">
              <div class="col-md-4">
                <div class="u-mr+ u-semibold">
                  <?php print t('Enlace a institución:')?>
                </div>
              </div>
              <div class="u-f-g1">
                <div>
                  <a href="<?php print $node->field_enlace_a_instituci_n[und][0]['url'] ; ?>"><?php print $node->field_enlace_a_instituci_n[und][0]['title'] ; ?></a>
                </div>
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