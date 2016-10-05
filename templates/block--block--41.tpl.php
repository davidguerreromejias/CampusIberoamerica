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
        <ul class="list-inline u-mb u-fs-xsmall u-uppercase">
          <li>
            <a href="#" class="link">
              <i class="u-color-turquesa icon-house"> </i>
            </a>
          </li>
          <li class="items-separator--arrow">
            <span class="u-color-gris"><?php print t('Campus Plus')?></span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Campus Plus')?></div>
          <div class="u-pv horizontal-line-separator-top u-fs-base">
            <p class="u-mb-">
              <?php print t('<b>Trabajamos para el crecimiento y el desarrollo sostenible en la región Iberoamericana</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Campus Iberoamérica es una iniciativa abierta a todos, igualitaria y universal. Pretende dar respuesta al reto de construir un futuro de aprendizaje móvil, 
              digital y sin barreras geográficas, que capacite a las próximas generaciones para trabajar por una sociedad 
              con un crecimiento estable y sostenible.')?>
            </p>
            <p class="u-mb-">
              <?php print t('Para ello, Campus Iberoamérica ofrece un marco para integrar los programas de movilidad ya existentes y alentar el nacimiento de otros nuevos, agregando 
              el valor de la dimensión regional y un plus de notoriedad gracias al refuerzo mutuo y al uso de una marca distintiva de la movilidad iberoamericana.')?>
            </p>
            <p class="u-mb-">
              <?php print t('Con Campus Plus queremos abordar una oferta de servicios, ligados a la movilidad académica, que genere beneficios a los estudiantes e 
              investigadores y a las empresas e instituciones que, a través de ofertas específicas, quieran sumarse a este esfuerzo por favorecer la movilidad.')?>
            </p>
            <p class="text-blue u-mb-">
              <?php print t('En Campus Plus queremos ofrecer servicios de alojamiento, de transporte, facilidades en cuestiones financieras, 
              soluciones de conectividad y otros servicios adicionales para la movilidad.')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Cómo ser parte de Campus Plus?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Campus Plus se encuentra abierto a la participación de empresas que tengan interés en definir una oferta de servicios a medida 
              de las personas en movilidad que abarque a varios países o colectivos de la región iberoamericana.')?>
            </p>
            <p class="u-mb-">
              <?php print t('Para más información puede contactar con: eic@segib.org ')?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
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
      </div>
    </div>
  </div>
</div>