<div class="p-rdo-busqueda_resultados" style="float: right;">
    <div id="node-<?php print $node->nid; ?>" class="becas-min <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
        <div class="content"<?php print $content_attributes; ?>>
            <div class="u-mb+">
                <div class="block-info__separator u-mb"></div>
                <div class="u-mb- block-info__title"><a href="/node/<?php print $node->nid; ?>"><?php print $title; ?></a></div>
                <div class="u-fs-xsmall">
                  <ul class="list-inline">
                    <li class="items-separator">
                      <span class="text-color-theme u-bold"><?php print $content['field_categoria_o_segmento']['#items'][0]['taxonomy_term']->name; ?></span>
                    </li>
                    <?php $field = field_get_items('node', $node, 'field_n_becas_concedidas');
                    if ($field) { ?>
                      <li>
                      <?php print render($content['field_n_becas_concedidas']);?>
                      </li>
                      <li><?php print t('Becas'); ?>
                      </li>
                    <?php }?>
                  </ul>
                </div>
                <div class="u-mb- block-info__content"><?php print render($content['field_condiciones_movilidad']); ?></div>
                <div class="u-fs-xsmall">
                  <ul class="list-inline">
                    <li class="items-separator items-separator--down-sm">
                      <span class="u-bold"><?php print t('Destino:')?></span> <?php print $content['field_ambito_pais']['#items'][0]['taxonomy_term']->name; ?>

                    </li>
                    <li class="items-separator items-separator--down-sm">
                      <span class="u-bold"><?php print t('Area de conocimiento:')?></span> <?php print $content['field_ambito_subarea_conocimient']['#items'][0]['taxonomy_term']->name; ?>
                    </li>
                    <li class="items-separator--down-sm">
                      <span class="u-bold"><?php print t('Plazo de solicitud:')?></span> <span class="plazo-solicitud-ini">
                      <?php print format_date(strtotime($node->field_plazo_para_solicitud_inici['und'][0]['value']), 'custom', 'd F Y'); ?> - 
                    </span><span class="plazo-solicitud-fin" id="node-<?php print $node->nid; ?>"><?php print format_date(strtotime($node->field_plazo_para_solicitud_inici['und'][0]['value2']), 'custom', 'd F Y'); ?></span> 
                    </li>
                    <span class="plazo-cerrado open"><?php print t('CERRADO')?></span>
                  </ul>
                </div>
            </div>
        </div>
    </div> 
</div>

