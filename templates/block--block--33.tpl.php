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
            <a href="#" class="link">
              <span class="u-color-gris">Prepara tu viaje</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold">Prepara tu viaje</div>
          <div class="u-fs-base">

            <div class="u-mb+ horizontal-line-separator-top horizontal-line-separator-bottom u-pv u-align-right@md">
              <ul class="list-inline u-mb0 u-fs-xsmall u-uppercase">
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
          <div class="u-mb">
            <div class="u-mb++">
              <?php print t('Es importante conocer, desde el comienzo, los tres pasos básicos para emprender 
              el camino de la  movilidad en lo que se refiere tanto a cuestiones académicas básicas como a 
              requerimientos legales y necesidades a cubrir.')?>
            </div>
            <div  class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('1. ¿Cómo gestiono mi movilidad con mi universidad o centro?')?>
              </p>
              <ul class="list-plain-text">
                <li class="list-circle">
                  <?php print t('Reconocimiento de programas/estancias en el extranjero. Vas a comenzar un programa de movilidad en otro país y eso es porque 
                    existe un acuerdo previo entre tu universidad o centro de investigación y aquel al que te vas a ir. No obstante, ponte en contacto con el 
                    Departamento de Movilidad y Programas Internacionales de Intercambio de tu institución o la Agencia Nacional para verificar que está 
                    todo en orden en lo que se refiere a la parte académica.')?>
                    <p class="text-blue"><?php print t('Es importante que compruebes que el acuerdo de estudios/formación sea aceptado previamente por escrito por las instituciones de origen y de acogida.')?></p>
                </li>
                <li class="list-circle">
                  <?php print t('En ocasiones tu universidad te puede ofrecer un seguro médico para estancias en el extranjero (seguro de movilidad internacional)
                   o algún otro servicio complementario.')?>
                    <p class="text-blue"><?php print t('Verifica todas las ayudas y servicios adicionales que puedes obtener en tu país/institución de origen desde el comienzo de tu solicitud.')?></p>
                </li>
              </ul>
            </div>

            <div  class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('2. ¿Qué requisitos me piden en el país de destino?')?>
              </p>
              <p class="u-mb-">
                  <?php print t('Cada país tiene unos requisitos diferentes para aceptar a estudiantes, docentes e investigadores en movilidad. 
                  Consulta con el ministerio de tu país y la embajada  o consulado del país de origen para acceder a la información necesaria sobre:')?>
              </p>
              <ul class="list-plain-text">
                <li class="list-circle">
                  <?php print t('Visados o permisos de residencia.')?> </li>
                <li class="list-circle">
                  <?php print t('Otros requisitos legales.')?>
                </li>
                <li class="list-circle">
                  <?php print t('Vacunas necesarias.')?>
                </li>
              </ul>
              <p class="u-mb- u-bold">
                <?php print t('Enlaces de interés:')?>
              </p>
              <p class="u-mb-">
                <?php print t('Listado de vacunas por países, de acuerdo a la OMS ')?>
              </p>
              <p class="u-mb-">
                <?php print t('(<a href="http://www.msssi.gob.es/profesionales/saludPublica/sanidadExterior/docs/LISTADO_DE_PAISES.pdf" target="_blank">
                http://www.msssi.gob.es/profesionales/saludPublica/sanidadExterior/docs/LISTADO_DE_PAISES.pdf</a>)')?>
              </p>
              <p class="u-mb-">
                <?php print t('Consejos sanitarios para el viajero internacional')?>
              </p>
              <p class="u-mb-">
                <?php print t('(<a href="http://www.msssi.gob.es/profesionales/saludPublica/sanidadExterior/salud/consejosViajero.htm" target="_blank">
                http://www.msssi.gob.es/profesionales/saludPublica/sanidadExterior/salud/consejosViajero.htm</a>)')?>
              </p>
            </div>

            <div  class="u-mb++">
              <p class="u-mb- u-bold">
                <?php print t('3. ¿Qué voy a necesitar durante la movilidad?')?>
              </p>
              <p class="u-mb-">
                  <?php print t('Durante tu estancia en el país de destino, tendrás que cubrir muchos aspectos de la vida cotidiana pero hay 4 en 
                  los que deberías pensar desde el primer momento:')?>
              </p>
              <ul class="list-plain-text">
                <li class="list-circle">
                  <?php print t('<span class="text-blue">Alojamiento.</span> Te interesa conocer si la universidad tiene acuerdos con residencias o algún servicio
                   de acomodación alternativo. En caso de que no sea así, conoce como funciona el sistema de alojamiento en el país.')?> </li>
                <li class="list-circle">
                  <?php print t('<span class="text-blue">Seguro médico.</span> Si no estás cubierto en origen, accede a aseguradoras de salud que 
                  operen internacionalmente para conocer sus servicios y ofertas.')?>
                </li>
                <li class="list-circle">
                  <?php print t('<span class="text-blue">Servicios financieros.</span> Infórmate para saber si es necesario tener una cuenta
                   en el país de destino para hacer efectiva la subvención a la movilidad o si te sirve la que ya tienes en tu país con tu entidad financiera.')?>
                </li>
                <li class="list-circle">
                  <?php print t('<span class="text-blue">Conectividad.</span> El acceso a Internet, la conexión fija y móvil tiene diferentes coberturas 
                  y precios dependiendo de los países. Te recomendamos que conozcas las tarifas de los operadores del país de destino.')?>
                </li>
              </ul>
              <p class="u-mb- text-blue">
                <br><?php print t('En algunas universidades o  centros de investigación existen programas de acogida o de acompañamiento para las personas que comienzan un programa de movilidad.')?>
              </p>
            </div>

            <div class="u-fs-xsmall">
              <ul class="u-mb u-color-turquesa u-fs-xsmall">
                <li>
                  <a href="#" class="link text-with-icon__content">
                    <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/enlace-icon.svg" alt="Ampliar información">
                    <span class="u-semibold"><?php print t('Ampliar información')?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
         <div class="u-mb+++">
          <div class="u-pb- u-color-gris u-fs-xsmall u-uppercase u-semibold horizontal-line-separator-bottom">Información útil</div>
          <ul class="u-color-turquesa u-fs-small u-semibold">
            <li>
              <a href="<?php print url('prepara-tu-viaje') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
                Prepara tu viaje
              </a>
            </li>
            <li class="horizontal-line-separator-top">
              <a href="<?php print url('info-paises') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/punto-icon_small.svg" alt="Información de los países">
                Información de los paises
              </a>
            </li>
            <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
              <a href="<?php print url('preguntas-frecuentes') ?>" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/dialogo-icon_small.svg" alt="Preguntas frecuentes">
                Preguntas frecuentes
              </a>
            </li>
          </ul>
          </div>
      </div>
    </div>
  </div>
</div>