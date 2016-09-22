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
            <span class="u-color-gris">Aviso legal</span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold">Aviso Legal</div>
          <div class="u-pv horizontal-line-separator-top u-fs-base" style="text-align: justify;">
            <p class="u-mb-">
              <?php print t('La utilización de este sitio entraña la aceptación de las siguientes condiciones:')?>
            </p>

             <h3><p class="u-mb-"> <b>01</b> </p></h3>
            <p class="u-mb-">
              <?php print t('La Unidad Coordinadora del Espacio Iberoamericano del Conocimiento (EIC), a través de la Secretaría General Iberoamericana (SEGIB) y en coordinación con la Organización de Estados para la Educación, la Ciencia y la Cultura (OEI) y el Consejo Universitario Iberoamericano (CUIB), mantiene este sitio en la Web (el «sitio») en atención a quienes deseen acceder a él (los «usuarios»). La información aquí presentada tiene fines exclusivamente informativos. Se autoriza a los usuarios a visitar el sitio y a descargar y copiar la información, los documentos y los materiales (denominados colectivamente «materiales») que contiene para su uso personal y no comercial, sin derecho alguno a revenderlos o distribuirlos ni a preparar compilaciones o trabajos derivados de ellos, con sujeción a las condiciones expuestas a continuación, así como a las restricciones de carácter más específico que puedan aplicarse a determinados materiales incluidos en este sitio.')?>
            </p>

            <h3><p class="u-mb-"> <b>02</b> </p></h3>
            <p class="u-mb-">
              <?php print t('La Secretaría General Iberoamericana administra este sitio. Todos los materiales que aparezcan en él estarán sujetos a las presentes Condiciones.')?>
            </p>
            <h3><p class="u-mb-"><b>03</b> </p></h3>
            <p class="u-mb-">
              <?php print t('A menos que se indique explícitamente lo contrario, las interpretaciones y conclusiones expresadas en los materiales que 
              figuran en este sitio serán los de los diversos funcionarios, consultores y asesores de la Secretaría General Iberoamericana que hayan preparado el trabajo y no representarán necesariamente las opiniones de la Secretaría o sus Estados Miembros.')?>
            </p>

            <h3><p class="u-mb-"><b>04</b> </p></h3>
            <p class="u-mb-">
              <?php print t('Las opiniones expresadas en artículos, documentos académicos, foros o listas de correo proporcionadas por este sitio web pertenecen al autor o firmante de los mismos, y no necesariamente reflejan las opiniones de la Secretaría General Iberoamericana.')?>
            </p>
            <h3><p class="u-mb-"><b>05</b> </p></h3>
            <p class="u-mb-">
              <?php print t('Los textos publicados que se muestran se ofrecen con finalidad informativa o divulgativa. La Secretaría General Iberoamericana buscará asegurar la actualidad, exactitud y veracidad, pero no asume responsabilidad alguna por los posibles daños causados por cualquier inexactitud en los mismos.')?>
            </p>
            <p><br></p>

            <p class="u-mb-"><b><?php print t('Descargos de responsabilidad')?></b>   </p>

            <p class="u-mb-">
              <?php print t('Los materiales publicados en este sitio se proporcionan tal como aquí aparecen 
                y sin ningún tipo de garantía, ya sea explícita o implícita, incluidas, pero sin limitarse a ellas, 
                las garantías de la calidad comercial, utilidad para determinado propósito y protección contra infracciones.')?><br><br>

              <?php print t('En particular, la Secretaría General Iberoamericana no da garantías ni responde de que dichos materiales sean
               exactos o completos. La Secretaría General Iberoamericana amplía, modifica, mejora o actualiza periódicamente los materiales 
               contenidos en este sitio sin previo aviso.')?> <br><br>

              <?php print t('Bajo ninguna circunstancia la Secretaría General Iberoamericana será responsable de las pérdidas,
               los daños, las obligaciones o los gastos presuntamente derivados de la utilización de este sitio, incluidos, 
               pero sin limitarse a ellos, los fallos, errores, omisiones, interrupciones o demoras relacionados con dichos materiales.')?><br><br>

              <?php print t('Los usuarios utilizan este sitio por su cuenta y riesgo. En ningún caso, incluida la negligencia pero sin limitarse a ella,
              la Secretaría General Iberoamericana y sus afiliados serán responsables de daños directos, indirectos, incidentales, cuantificables o consecuentes,
              aun cuando se les haya advertido de la posibilidad de tales daños.')?><br><br>

              <?php print t('El usuario reconoce y acepta específicamente que la Secretaría General Iberoamericana no es responsable de los actos de ningún usuario.')?><br><br>
              
              <?php print t('Este sitio puede contener sugerencias, opiniones y declaraciones procedentes de diversas fuentes de 
                información. La Secretaría General Iberoamericana no garantiza ni respalda la exactitud o fiabilidad de las sugerencias, opiniones, 
                declaraciones u otras informaciones provenientes de ninguna fuente de información, ningún usuario de este sitio o cualquier otra persona o entidad. 
                La aceptación por un usuario de tales sugerencias, opiniones, declaraciones o informaciones será también por su cuenta y riesgo. Ni la Secretaría
                 General Iberoamericana ni sus afiliados o cualquiera de sus respectivos agentes, empleados, fuentes de información o suministradores de contenido 
                 serán responsables ante los usuarios o cualquier otra persona de las inexactitudes, errores, omisiones, interrupciones, supresiones, defectos, 
                 alteraciones o utilizaciones de cualquier contenido del sitio o por el momento o el grado en que se produzcan; tampoco serán responsables de las 
                 fallas de funcionamiento, los virus informáticos o las interrupciones de la comunicación, independientemente de su causa, ni por cualesquiera daños que de ello se deriven.')?> <br><br>

              <?php print t('La utilización de este sitio por el usuario estará sujeta a la aceptación por este último de la condición de indemnizar
               a la Secretaría General Iberoamericana y a sus afiliados por cualesquiera acciones, reclamaciones, pérdidas, daños, obligaciones y gastos
                (incluida una suma razonable por concepto de honorarios de abogados) que se deriven de dicha utilización, incluidas, sin límite alguno, 
                las reclamaciones en que se aleguen hechos que, de ser ciertos, constituirían un incumplimiento por el usuario de las presentes Condiciones.
                 Si el usuario no estuviera conforme con alguno de los materiales presentados en este sitio o con alguna de las condiciones de utilización, 
                 el único remedio a que podría recurrir sería dejar de utilizar el sitio.')?> <br><br>


                <?php print t('Este sitio puede contener enlaces y referencias a sitios de terceros en la Web. 
                Estos sitios no se encuentran bajo el control de la Secretaría General Iberoamericana y la Secretaría no es responsable 
                de su contenido ni de los enlaces que puedan figurar en ellos. La Secretaría General Iberoamericana proporciona estos enlaces 
                sólo como servicio complementario, y la inclusión de un enlace o referencia no significa que la Secretaría respalde el sitio en cuestión.')?>

            </p>
            <p><br></p>
            <p class="u-mb-"><b><?php print t('Preservación de inmunidades')?></b>           </p>

            <p class="u-mb-"><?php print t('Nada de lo dispuesto en las presentes Condiciones se considerará una limitación de las prerrogativas e inmunidades de la Secretaría General Iberoamericana o una renuncia a ellas, que están reservadas específicamente.')?>
            </p>
            <p><br></p>
             <p class="u-mb-"><b><?php print t('Aspectos generales ')?></b> </p>
             <p class="u-mb-">
             <?php print t('La Secretaría General Iberoamericana se reserva el derecho exclusivo de modificar, limitar o suspender a su discreción este sitio o 
              cualquiera de los materiales contenidos en él en cualquier sentido. 
             La Secretaría General Iberoamericana no está obligada a tomar en consideración las necesidades de ningún usuario para adoptar tales medidas.')?><br>
<br><?php print t('La Secretaría General Iberoamericana se reserva el derecho de denegar a su entera discreción y sin previo aviso el acceso de cualquier usuario a 
                  este sitio o a cualquiera de sus componentes.')?><br>
                  <br>
<?php print t('Ninguna dispensa por la Secretaría General Iberoamericana de cualquiera de las disposiciones de las presentes 
Condiciones será vinculante a menos que se enuncie por escrito y sea firmada por un representante de la Secretaría debidamente autorizado.')?>
            </p>

          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">

        <div class="u-mb+++">
          <div class="u-pb- u-color-gris u-fs-xsmall u-uppercase u-semibold horizontal-line-separator-bottom">Información útil</div>
          <ul class="u-color-turquesa u-fs-small u-semibold">
            <li>
              <a href="../prepara-viaje" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/ruta-icon_small.svg" alt="Prepara tu viaje">
                Prepara tu viaje
              </a>
            </li>
            <li class="horizontal-line-separator-top">
              <a href="../info-paises" class="link text-with-icon__content">
                <img class="text-with-icon__icon" src="/sites/all/themes/zen/Nexos/assets/images/punto-icon_small.svg" alt="Información de los países">
                Información de los paises
              </a>
            </li>
            <li class="horizontal-line-separator-top horizontal-line-separator-bottom">
              <a href="../preguntas-frecuentes" class="link text-with-icon__content">
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