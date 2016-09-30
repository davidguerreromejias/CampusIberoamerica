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
            <span class="u-color-gris"><?php print t('Política de privacidad')?></span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Política de privacidad')?></div>
          <div class="u-pv horizontal-line-separator-top u-fs-base" style="text-align: justify;">
          	<p class="u-mb-">
          		<?php print t('La Secretaría General Iberoamericana garantiza la adopción de las medidas necesarias para asegurar el tratamiento confidencial de los datos suministrados por el usuario. Los datos proporcionados por éste serán incluidos en una base de datos para uso exclusivo de la Secretaría General Iberoamericana en sus comunicaciones, y en ningún caso se destinarán estos datos a otros fines ni se entregarán a terceras partes.')?>
          		<br>
				<?php print t('El interesado tendrá la posibilidad de ejercitar los derechos de acceso, rectificación, cancelación y oposición respecto de dichos datos a través comunicación enviada a la siguiente dirección de correo:   info@segib.org')?><br>
				<?php print t('La publicidad de cualquiera de los datos recibidos se realizará únicamente con la autorización expresa del interesado.')?>
			</p>
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