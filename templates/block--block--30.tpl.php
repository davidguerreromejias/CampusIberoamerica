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
          <span class="u-color-gris">Contacto</span>
        </li>
      </ul>
    </div>
    <div class="col-xs-12 col-md-8 col-lg-9">
      <div class="page-content-container u-mb++ ">
        <div class="u-mb u-fs-h2 u-bold">Contacto</div>
        <div class="u-pv horizontal-line-separator-top u-fs-base">

          <form name="contacto" class="u-fs-xsmall">
            <div class="u-f@md">
              <input type="text" class="input u-w100 u-mr" name="nombre" placeholder="Tu nombre">
              <input type="text" class="input u-w100" name="email" placeholder="Tu email">
            </div>
            <div class="select">
              <select name="pregunta" placeholder="Escoge el tema de tu pregunta">
                <option>Pregunta 1</option>
                <option>Pregunta 2</option>
                <option>Pregunta 3</option>
                <option>Pregunta 4</option>
                <option>Pregunta 5</option>
                <option>Pregunta 6</option>
                <option>Pregunta 7</option>
                <option>Pregunta 8</option>
              </select>
            </div>

            <textarea type="text" rows="10" class="input u-h100 u-w100" name="texto_largo" placeholder="Escribe tu pregunta"></textarea>

            <button class="btn btn--primary" onClick="window.location.href='/contacto;  return false;">Enviar</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-3">

      <div class="u-mb+++">
        <div class="u-pb- u-color-gris u-fs-xsmall u-uppercase u-semibold horizontal-line-separator-bottom">Información útil</div>
        <ul class="u-color-turquesa u-fs-small u-semibold">
          <li>
            <a href="../prepara-viaje" class="link text-with-icon__content">
              <img class="text-with-icon__icon" src="/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
              Prepara tu viaje
            </a>
          </li>
          <li class="horizontal-line-separator-top">
            <a href="../info-paises" class="link text-with-icon__content">
              <img class="text-with-icon__icon" src="/assets/images/punto-icon_small.svg" alt="Información de los países">
              Información de los paises
            </a>
          </li>
          <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
            <a href="../preguntas-frecuentes" class="link text-with-icon__content">
              <img class="text-with-icon__icon" src="/assets/images/dialogo-icon_small.svg" alt="Preguntas frecuentes">
              Preguntas frecuentes
            </a>
          </li>
        </ul>
      </div>

    </div>
  </div>
</div>