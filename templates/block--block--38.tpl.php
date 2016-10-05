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
            <span class="u-color-gris"><?php print t('Acerca De')?></span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Acerca De')?></div>
          <div class="u-pv horizontal-line-separator-top u-fs-base">
            <p class="u-mb-">
              <?php print t('<b>¿En qué consiste esta iniciativa?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('El programa Campus Iberoamérica es la iniciativa de movilidad e intercambio de estudiantes, profesores e investigadores más ambiciosa de la región. 
                Su objetivo principal es el de promover que estos colectivos realicen un periodo de estudios de educación superior, docencia o investigación en otros países de la 
                Comunidad Iberoamericana y acelerar la creación de una alianza y un sistema que proporcionen  cohesión en su conjunto a la movilidad en la región, favoreciendo su 
                crecimiento a futuro
              La denominación del programa es resultado de un proceso participativo que se articuló a través de un concurso (www.ponlenombreatufuturo.org) en el que estudiantes, profesores e 
              investigadores de universidades de la región presentaron más de 7.000 propuestas.<br>
              ')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Cómo se estructura Campus Iberoamérica?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Campus Iberoamérica hace referencia a la puesta en marcha de un Marco Iberoamericano de Movilidad, estructurado en torno a tres pilares básicos:')?>
              <ul class="list-plain-text">
                <li class="list-circle"><?php print t('La <u>Alianza Iberoamericana para la Movilidad</u>, o asociación entre sector público y privado para conseguir los recursos que posibiliten las movilidades.')?></li>
                <li class="list-circle"><?php print t('El <u>Sistema Iberoamericano de Movilidad</u>, o conjunto de programas, proyectos e iniciativas de intercambio en torno a reglas comunes.')?></li>
                <li class="list-circle"><?php print t('La <u>Plataforma Iberoamericana de Movilidad</u>, o herramienta que facilitará información, coordinará y gestionará los intercambios.<br>')?></li>
              </ul>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Cómo se origina?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('La XXIV Cumbre Iberoamericana (Veracruz, México, diciembre de 2014) acordó promover la movilidad académica de estudiantes, 
              profesores e investigadores en la Comunidad Iberoamericana. Esta apuesta es acorde con los importantes beneficios académicos, sociales y 
              económicos que la movilidad reporta, al tiempo que contribuye a crear sentimientos de vinculación y pertenencia que trascienden lo académico para alcanzar a la sociedad en su conjunto.<br>')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Qué avances ha habido desde Veracruz?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('La definición y el proceso de concertación para establecer un Marco Iberoamericano de Movilidad se iniciaron en 2015, y el 
                grueso de su desarrollo se completará en el periodo 2016-2017. Campus Iberoamérica es una iniciativa en constante evolución. Los avances 
                alcanzados hasta el momento hacen referencia a tres cuestiones concretas. 
              <br><br>Primero, en la firma de acuerdos de adhesión a la Alianza con diversos actores públicos y privados. Este proceso se prolongará 
              en el tiempo de manera continua, con el fin de aunar los esfuerzos del mayor número de actores posible para integrar la oferta iberoamericana 
              de movilidad académica. Segundo, en la definición del Sistema Iberoamericano de Movilidad y en la generación de condiciones favorecedoras de ésta, 
              incluyendo, entre otros aspectos, el impulso a la colaboración entre los sistemas de acreditación y reconocimiento de periodos de estudio y de títulos. 
              Tercero, en la puesta en marcha de la Plataforma, que constituye la herramienta de información, coordinación y gestión de Campus Iberoamericano.<br>
              ')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Qué implica para una institución la participación en Campus Iberoamérica?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('La participación en esta iniciativa admite diversas modalidades de contribución a la movilidad, y no exige la implicación 
              directa de las instituciones participantes en la promoción o gestión de acciones de movilidad. Los procesos de participación son 
              por tanto susceptibles de adaptarse a las particularidades de cada caso.<br>')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Qué instituciones se pueden incorporar?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Campus Iberoamérica está abierto a la participación de diversos actores pertenecientes a la esfera institucional pública tanto social 
              (empresas, fundaciones, organizaciones de la sociedad civil, ONG, etc.,) como académica (instituciones de educación superior y asociaciones 
              que las representan, centros de investigación, etc.)<br>')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>¿Qué instituciones forman parte de Campus Iberoamérica?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Desde el año 2015 se ha formalizado la incorporación de diversos actores públicos y privados de distintos países iberoamericanos (incluir link a listado de actores)
              <br><br>A día de hoy, los organismos que se han adherido a esta iniciativa representan a más de 500 universidades y otras instituciones de la región iberoamericana. 
              <br><br>El proceso de incorporación de nuevos actores se plantea como algo continuo. A corto plazo está previsto contar con un número importante de nuevas adhesiones.
              <br>')?>
            </p>
            <p class="u-mb-">
              <?php print t('<b>Se habla de unas reglas comunes que estructurarán el Sistema Iberoamericano de Movilidad, ¿Cuáles van a ser estas?</b>')?>
            </p>
            <p class="u-mb-">
              <?php print t('Esta iniciativa se va a articular de acuerdo a un conjunto de reglas comunes que las instituciones participantes 
              deberán cumplir. A título indicativo y para la movilidad de estudiantes, se mencionan a continuación algunos de los criterios a considerar:<br>  ')?>
              <ul class="list-plain-text">
                <li class="list-tick"><?php print t('Duración mínima de un período académico completo (trimestre, cuatrimestre, semestre o curso, según proceda).')?></li>
                <li class="list-tick"><?php print t('Reconocimiento académico pleno del período de estudios cursado.')?></li>
                <li class="list-tick"><?php print t('Equilibrio entre el número de estudiantes que entran y salen de cada institución de educación superior participante.')?></li>
                <li class="list-tick"><?php print t('Exención de pago de matrícula en la institución de destino.')?></li>
                <li class="list-tick"><?php print t('Establecimiento de un sistema de becas y ayudas que garantice la igualdad de oportunidades de los estudiantes.')?></li>
                <li class="list-tick"><?php print t('Procedimiento de selección público, objetivo y transparente.')?></li>
                <li class="list-tick"><?php print t('Obligación de facilitar datos sobre las movilidades realizadas y sus beneficiarios, con el fin de poder disponer de un sistema de seguimiento y estadísticas.')?></li>
              </ul>
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