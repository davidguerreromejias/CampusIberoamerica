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
            <span class="u-color-gris"><?php print t('Preguntas frecuentes')?></span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9" style="text-align: justify;">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Preguntas frecuentes')?></div>
          <div class="horizontal-line-separator-top horizontal-line-separator-bottom u-pv u-align-right@md">
            <ul class="list-inline u-mb0 u-fs-xsmall u-uppercase">
              <li>
                <span class="u-color-gris-claro u-fs-xxsmall">
                  <?php print t('Compartir')?>
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

          <!-- panel group -->
          <div class="u-pt+ u-fs-xsmall">
            <div class="panel">
              <div class="panel-heading">
                <div>
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    <?php print t('¿Qué es el portal de la movilidad?')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div class="u-color-gris">
                    <p class="u-mb">
                     <?php print t(' El portal de la movilidad pretende ser un espacio común que de acceso a la oferta iberoamericana de programas de movilidad, 
                      tanto a la vinculada con la educación superior como con la investigación y la docencia. El portal es un agregador de programas, 
                      con un potente buscador asociado cuyos objetivos principales son:')?>
                    </p>
                    <ul style="padding-left: 15px;">
                      <p class="u-mb">
                        <?php print t('- Agregar toda la oferta de programas de movilidad en Iberoamérica, con el fin de que estudiantes, 
                        investigadores y docentes puedan localizar de una forma más sencilla 
                        y eficiente los programas que mejor se ajusten a sus características y necesidades.')?>
                      </p>
                      <p class="u-mb">
                        <?php print t('- Proveer información acerca de los servicios adicionales y ventajas de los que 
                        puedan beneficiarse los estudiantes, investigadores y docentes que participen en los programas.')?>
                      </p>
                      <p class="u-mb">
                        <?php print t('- Ofrecer un espacio común a todas aquellas instituciones, 
                        universidades y centros de investigación que les aporte mayor visibilidad y les proporcione indicadores útiles para su gestión.')?>
                      </p>
                    </ul>

                </div>
              </div>
            </div>

            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    <?php print t('¿Qué tipo de programas de movilidad se incluyen en este portal?')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    <?php print t('En el portal de la movilidad se incluyen los programas 
                    de movilidad que cumplen las siguientes características:')?>

                  </p>
                  <ul style="padding-left: 15px;">
                    <p class="u-mb">
                      <?php print t('- Que estén dirigidos a estudiantes de grado/pregrado, 
                      a estudiantes de postgrado y doctorandos, y a personal investigador y docente.')?>
                    </p>
                    <p class="u-mb">
                     <?php print t('- Que, al menos, el país de origen o el de destino 
                     del intercambio o movilidad sea uno o más de uno del conjunto de los 22 países de la Cumbre Iberoamericana.')?>
                    </p>
                    <p class="u-mb">
                    <?php print t('- Que el programa de intercambio o de movilidad esté respaldado por una universidad,
                     centro de investigación o institución relacionada con el mundo de la educación o 
                     el propio Ministerio de Educación del país correspondiente.')?>
                    </p>
                  </ul>
 
                </div>
              </div>
            </div>

             <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                    <?php print t('¿Cómo puede un estudiante, profesor o investigador participar?')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    <?php print t('Puedes consultar en el propio portal qué instituciones, universidades y programas están ya participando en esta iniciativa.
                     No obstante, se trata de un proyecto incipiente en fase de desarrollo, por lo que aún no estarán todos incluidos.')?>
                  </p>
                  <p class="u-mb">
                    <?php print t('Hasta entonces será tu universidad, centro de investigación o institución quien mejor te podrá informar sobre 
                    las oportunidades de movilidad académica y las condiciones que debes cumplir. Puedes contactar con el departamento encargado 
                    de relaciones internacionales para ver si la universidad a la que perteneces forma parte de esta iniciativa, 
                    así como para informarte sobre las acciones específicas de movilidad a las que puedas acceder. ')?>                 
                </p>
                </div>
              </div>
            </div>

            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                    <?php print t('¿Qué beneficios supone para estudiantes, docentes e investigadores participar en iniciativas de movilidad?')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse5" class="panel-collapse collapse">
                <div class="u-color-gris">
                    <p class="u-mb">
                      <?php print t('- El acceso a una formación en distintas instituciones educativas de la región iberoamericana, articuladas en torno 
                      a directrices y estándares compartidos que garantizan una docencia e investigación de calidad.')?>

                    </p>
                    <p class="u-mb">
                      <?php print t('- La posibilidad de disfrutar de unos servicios adicionales y ventajas asociados 
                      a la participación en el programa (transporte, alojamiento, comunicaciones, etc.)')?>
                    </p>
                    <p class="u-mb">
                      <?php print t('- Disfrutar de una experiencia única que te abrirá la puerta a conocer y compartir otras 
                      realidades culturales y sociales, proporcionándote al tiempo mayores y mejores oportunidades 
                      profesionales en distintos países de la región iberoamericana.')?>

                    </p>

                </div>
              </div>
            </div>


           


            <div class="panel horizontal-line-separator-top">
              <div class="panel-heading">
                <div class="u-color-turquesa">
                  <a class="u-color-turquesa collapsed-block__option collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    <?php print t('¿En qué apoyo se traduce esta iniciativa? ¿Qué pasa con los sistemas de becas ya existentes?')?>
                    <i class="collapsed-block__icon"> </i>
                  </a>
                </div>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="u-color-gris">
                  <p class="u-mb">
                    <?php print t('Campus Iberoamérica es una iniciativa abierta a todos, igualitaria y universal, 
                    en cuyo marco se pretende proporcionar apoyo para que un estudiante, profesor o 
                    investigador pueda realizar una práctica de estudios o investigación en otros países de la Comunidad Iberoamericana. ')?>
                  </p>
                  <p class="u-mb">
                    <?php print t('Se trata de una iniciativa que pretende integrar los programas de movilidad ya existentes y alentar el nacimiento de otros nuevos, 
                    agregando el valor de la dimensión regional y un plus de notoriedad gracias al refuerzo mutuo 
                    y al uso de una marca distintiva de la movilidad iberoamericana.')?>
                  </p>
                </div>
              </div>
            </div>

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
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>