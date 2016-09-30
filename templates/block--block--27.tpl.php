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


<div class="p-home_separator"></div>
	<div class="site-content-wrapper site-content-wrapper--centered">
    <p class="h3 u-bold u-mb+ display-only-up-sm"><?php print t('Busca tu programa de...')?></p>
    </div>
    <div class="site-content-wrapper site-content-wrapper--centered">
      <ul class="list-inline u-mb+">
        <li>
          <button class="btn p-home_btn js-busqueda-home js-open-overlay" data-tipo="pregrado" data-target="#busquedaOverlay"><?php print t('Pregrado')?></button>
        </li>
        <li>
          <button class="btn p-home_btn js-busqueda-home js-open-overlay" data-tipo="postgrado" data-target="#busquedaOverlay"><?php print t('Postgrado')?></button>
        </li>
        <li>
          <button class="btn p-home_btn js-busqueda-home js-open-overlay" data-tipo="investigacion" data-target="#busquedaOverlay"><?php print t('Investigación / docencia')?></button>
        </li>
      </ul>

    </div>
    <div class="site-content-wrapper site-content-wrapper--centered">
      <div class="u-inline-block">
          <a class="p-home_portal-inv-btn" href="<?php print url('portadilla-investigadores') ?>?tid=1341">
            <?php print t('Portal de Movilidad de Investigadores')?>
          </a>
      </div>
    </div>
    <div class="p-home_separator"></div>


      <!-- BUSCADOR HOME OVERLAY: INICIO -->

<div id="busquedaOverlay" class="overlay-page">
  <div class="overlay-page__container">


    <div class="overlay-page__close-wrapper">
      <button href="#" class="overlay-page__close-link js-overlay-close">
        Cerrar
        <span class="overlay-page__close-icon"></span>
      </button>
    </div>
    <div class="overlay-page__content-before"></div>
    <div class="overlay-page__content js-overlay-page-content">

      <p class="h3 u-bold u-mb+"><?php print t('Busca tu programa de...')?></p>

      <div class="u-f@md" data-toggle="buttons">
        <label class="btn p-buscador_input p-buscador_input--radio active u-mh---@md u-ml0 u-mb- u-uppercase" data-opcion>
          <input type="radio" name="tipo" autocomplete="off" checked class="u-hide" value="pregrado">
          <?php print t('Pregrado')?>
        </label>

        <label class="btn p-buscador_input p-buscador_input--radio u-mh---@md u-mb- u-uppercase" data-opcion>
          <input type="radio" name="tipo" autocomplete="off" class="u-hide" value="postgrado" >
          <?php print t('Postgrado')?>
        </label>

        <label class="btn p-buscador_input p-buscador_input--radio u-mh---@md u-mr0 u-mb- u-uppercase" data-opcion>
          <input type="radio" name="tipo" autocomplete="off" class="u-hide" value="investigacion">
          <?php print t('Investigación / Docencia')?>
        </label>
      </div>

      <!-- PREGRADO -->

      <form action="/busqueda-avanzada/" data-form-tipo="pregrado">
        <input type="hidden" name="tid" value="1339" />

  <div data-step="1">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Necesitamos conocer mejor qué estudias y dónde:')?>
    </p>

    <div class="u-f@md">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
           <input type="text" name="field__mbito_univ_centro_tid" id="tags" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" placeholder="Universidad">
      </div>

      <div class="u-mh---@md u-mb- u-mr0 u-f-g1">
        <div class="p-buscador_select">
          <select name="areaPre" class="js-buscador-select">
            <option><?php print t('Área de conocimiento')?></option>
          </select>
        </div>  
      </div>
    </div>
  </div>

  <div data-step="2">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Indica las siguientes opciones si quieres acotar mejor la búsqueda (son opcionales):')?>
    </p>

    <div class="u-f@md u-mb+">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
        <div class="p-buscador_select">
          <select name="field_instituci_n_que_promueve_value" class="js-buscador-select">
            <option value=""><?php print t('Especialidad')?></option>
          </select>
        </div>
      </div>

      <div class="u-mh---@md u-mb- u-f-g1">
        <div class="p-buscador_select">
          <select name="field_ambito_pais_tid_1" class="js-buscador-select">
            <option value="All"><?php print t('País al que quieres ir')?></option>
          </select>
        </div>
      </div>

      <input type="text" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" name="keys" placeholder="Nombre del programa">

    </div>

    <button class="btn p-buscador_button" id ="pregrado-btn" onclick="btnPregradoBusqueda()"><?php print t('Buscar')?></button>
  </div>

</form>


      <!-- POSTGRADO -->

      <form action="/busqueda-avanzada/" data-form-tipo="postgrado">
        <input type="hidden" name="tid" value="1340" />

  <div data-step="1">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Necesitamos conocer mejor qué estudias y dónde:')?>
    </p>

    <div class="u-f@md">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
        <input type="text" id="tagsPost" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" placeholder="Universidad">
      </div>

      <div class="u-mh---@md u-mb- u-mr0 u-f-g1">
        <div class="p-buscador_select">
          <select name="areaPre" class="js-buscador-select">
            <option value=""><?php print t('Área de conocimiento')?></option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div data-step="2">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Indica las siguientes opciones si quieres acotar mejor la búsqueda (son opcionales):')?>
    </p>

    <div class="u-f@md u-mb+">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
        <div class="p-buscador_select">
          <select name="field_instituci_n_que_promueve_value" class="js-buscador-select">
            <option value=""><?php print t('Especialidad')?></option>
          </select>
        </div>
      </div>

      <div class="u-mh---@md u-mb- u-f-g1">
        <div class="p-buscador_select">
          <select name="field_ambito_pais_tid_1" class="js-buscador-select">
            <option value="All"><?php print t('País al que quieres ir')?></option>
          </select>
        </div>
      </div>

      <input type="text" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" name="keys" placeholder="Nombre del programa">

    </div>

    <button class="btn p-buscador_button"><?php print t('Buscar')?></button>
  </div>

</form>


      <!-- INVESTIGADORES -->

      <form action="/busqueda-avanzada/" data-form-tipo="investigacion">
        <input type="hidden" name="tid" value="1341" />
  <div data-step="1">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Necesitamos conocer mejor tu perfil:')?>
    </p>

    <div class="u-f@md">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
        <input type="text" id="tagsInv" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" placeholder="Universidad o Centro">
      </div>

      <div class="u-mh---@md u-mb- u-mr0 u-f-g1">
        <div class="p-buscador_select">
          <select name="field_ambito_pais_tid" class="js-buscador-select">
            <option value=""><?php print t('País')?></option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div data-step="2">
    <p class="u-fs-small u-color-turquesa-oscuro2 u-align-left">
      <?php print t('Indica las siguientes opciones si quieres acotar mejor la búsqueda (son opcionales):')?>
    </p>

    <div class="u-f@md u-mb+">
      <div class="u-mh---@md u-mb- u-ml0 u-f-g1">
        <div class="p-buscador_select">
          <select name="field_ambito_pais_tid_1" class="js-buscador-select">
            <option value="All"><?php print t('País al que quieres ir')?></option>
          </select>
        </div>
      </div>

      <div class="u-mh---@md u-mb- u-f-g1">
        <div class="p-buscador_select">
          <select name="field_instituci_n_que_promueve_value" class="js-buscador-select">
            <option value=""><?php print t('Área de conocimiento')?></option>
          </select>
        </div>
      </div>

      <input type="text" class="p-buscador_input u-mh---@md u-mb- u-mr0 u-f-g1 u-block u-w100" name="keys" placeholder="Nombre del programa">

    </div>

    <button class="btn p-buscador_button"><?php print t('Buscar')?></button>
  </div>

</form>


    </div>
    <div class="overlay-page__content-after"></div>
  </div>
</div>

<!-- BUSCADOR HOME OVERLAY: FIN -->
