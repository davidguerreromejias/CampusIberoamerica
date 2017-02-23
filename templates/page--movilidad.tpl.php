<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div class="layout-center main-content container">
  <header class="header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('visually-hidden'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </header>

  <div class="layout-3col layout-swap">

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
      // Decide on layout classes by checking if sidebars have content.
      $content_class = 'layout-3col__full';
      $sidebar_first_class = $sidebar_second_class = '';
      if ($sidebar_first && $sidebar_second):
        $content_class = 'layout-3col__right-content';
        $sidebar_first_class = 'layout-3col__first-left-sidebar';
        $sidebar_second_class = 'layout-3col__second-left-sidebar';
      elseif ($sidebar_second):
        $content_class = 'layout-3col__left-content';
        $sidebar_second_class = 'layout-3col__right-sidebar';
      elseif ($sidebar_first):
        $content_class = 'layout-3col__right-content';
        $sidebar_first_class = 'layout-3col__left-sidebar';
      endif;
    ?>

    <main class="<?php print $content_class; ?>" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-content">Back to top</a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      
      <?php  if(drupal_is_front_page()){
                unset($page['content']['system_main']['default_message']);
              } 
              //Descripción del programa de movilidad
      ?>

      DEVELOPING TEMPLATE, ABAIX ESTÀ EL TEMPLATE DE FINS ARA
      <fieldset class="collapsible required-fields form-wrapper collapse-processed" id="descripcion">
        <legend>
          <span class="fieldset-legend">
            <a class="fieldset-title" href="#">
              <span class="fieldset-legend-prefix element-invisible">Ocultar</span> 
              Descripción del programa de movilidad
            </a>
            <span class="summary"></span>
          </span>
        </legend>
        <div> 
          <?php
            print $page['content']['field_institucion_que_promueve'];
            print render(field_view_field('node', $node, 'field_institucion_que_promueve'));
            print render(field_view_field('node', $node, 'field_nombre_del_programa'));
            print render(field_view_field('node', $node, 'field_condiciones_movilidad'));
            print render(field_view_field('node', $node, 'field_n_movilidades_disponibles'));
            print render(field_view_field('node', $node, 'field_convocatoria_ano'));
            print render(field_view_field('node', $node, 'field_plazo_para_solicitud_inici'));
            print render(field_view_field('node', $node, 'field_periodicidad'));
            print render(field_view_field('node', $node, 'field_categoria_o_segmento'));
            print render(field_view_field('node', $node, 'field_tipo_de_moneda'));
            print render(field_view_field('node', $node, 'field_cuantia_o_presupuesto'));
            print render(field_view_field('node', $node, 'field_prespuesto_total_oferta'));
            print render(field_view_field('node', $node, 'field_incluye_salario_beneficiar'));
            print render(field_view_field('node', $node, 'field_salario_del_beneficiario'));
            print render(field_view_field('node', $node, 'field_incluye_gastos_de_desplaza'));
            print render(field_view_field('node', $node, 'field_gastos_de_desplazamiento'));
            print render(field_view_field('node', $node, 'field_incluye_manutencion'));
            print render(field_view_field('node', $node, 'field_manutencion'));
            print render(field_view_field('node', $node, 'field_incluye_otros_costes'));
            print render(field_view_field('node', $node, 'field_otros_costes'));
            print render(field_view_field('node', $node, 'field_pais_origen_solicitante'));
            print render(field_view_field('node', $node, 'field_universidad_centro_origen_'));
            print render(field_view_field('node', $node, 'field_duraci_n_del_programa_movi'));
            print render(field_view_field('node', $node, 'field_unidad_de_la_duracion'));
            print render(field_view_field('node', $node, 'field_mes_de_llegada'));
            print render(field_view_field('node', $node, 'field_fecha_prevista_inicio_trab'));
            print render(field_view_field('node', $node, 'field_requisitos_solicitante'));
            print render(field_view_field('node', $node, 'field_ambito_pais'));
            print render(field_view_field('node', $node, 'field__mbito_univ_centro'));
            print render(field_view_field('node', $node, 'field_ambito_area_conocimiento'));
            print render(field_view_field('node', $node, 'field_ambito_subarea_conocimient'));
            print render(field_view_field('node', $node, 'field_nivel_estudios_requerido'));
            print render(field_view_field('node', $node, 'field_estudios_requeridos'));
            print render(field_view_field('node', $node, 'field_idiomas_requeridos_al_soli'));
            print render(field_view_field('node', $node, 'field_otros_criterios_de_elegib'));
            print render(field_view_field('node', $node, 'field_enlace_programa'));
            print render(field_view_field('node', $node, 'field_pdf_video'));
            print render(field_view_field('node', $node, 'field_c_mo_enviar_la_candidatura'));
        ?>
       </div>
    </fieldset>
     Datos de gestión y de la institución que promueve la movilidad
      <?php
              //Datos de gestión y de la institución que promueve la movilidad

              print render(field_view_field('node', $node, 'field_univ_centro_responsable'));
              print render(field_view_field('node', $node, 'field_tipo_de_instituci_n'));
              print render(field_view_field('node', $node, 'field_persona_de_contacto'));
              print render(field_view_field('node', $node, 'field_cargo'));
              print render(field_view_field('node', $node, 'field_email'));
              print render(field_view_field('node', $node, 'field_tel_fono'));
              print render(field_view_field('node', $node, 'field_departamento'));
              print render(field_view_field('node', $node, 'field_c_digo_postal'));
              print render(field_view_field('node', $node, 'field_enlace_a_instituci_n'));
      ?>

       Metadatos y datos gestión interna de la bdat
     <?php
              //Metadatos y datos gestión interna de la bdat
              print render(field_view_field('node', $node, 'field_fecha_de_ingreso'));
              print render(field_view_field('node', $node, '  field_fecha_expurgo'));
              print render(field_view_field('node', $node, 'field_n_becas_concedidas'));
              print render(field_view_field('node', $node, 'field_n_total_ofertas_aprobadas'));
              print render(field_view_field('node', $node, 'field_n_de_becas'));
              print render(field_view_field('node', $node, 'field_publicar_en_portal'));
              print render(field_view_field('node', $node, 'field_destacado'));
              print render(field_view_field('node', $node, 'field_areas_y_subareas'));
      ?>

      <?php
               print render($page['content']); 
      ?>
      <?php print $feed_icons; ?>
    </main>

    <!--<div class="layout-swap__top layout-3col__full">

      <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-menu" tabindex="-1">Back to top</a>

      <?php if ($main_menu): ?>
        <nav class="main-menu" role="navigation">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('navbar', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('visually-hidden'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div>-->

    <?php if ($sidebar_first): ?>
      <aside class="<?php print $sidebar_first_class; ?>" role="complementary">
        <?php print $sidebar_first; ?>
      </aside>
    <?php endif; ?>

    <?php if ($sidebar_second): ?>
      <aside class="<?php print $sidebar_second_class; ?>" role="complementary">
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
