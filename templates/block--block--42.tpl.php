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

<!-- VERSION MOVIL -->
    <div id="menuOverlay" class="overlay-page">
  <div class="overlay-page__container">

    <div class="overlay-page__close-wrapper">
      <button href="#" class="overlay-page__close-link js-overlay-close">
        Cerrar
        <span class="overlay-page__close-icon"></span>
      </button>
    </div>
    <div class="overlay-page__content-before"></div>
    <div class="overlay-page__content js-overlay-page-content">

      <ul class="list-unstyled u-uppercase u-mb++">
        <li class="u-mb+">
          <div class="u-color-turquesa-oscuro"><?php print t('programas')?></div>
          <ul class="list-unstyled">
            <li>
              <a href="<?php print url('portadilla-pregrado') ?>?tid=1339" class="u-fs-large btn u-block"><?php print t('Pregrado')?></a>
            </li>
            <li>
              <a href="<?php print url('portadilla-postgrado') ?>?tid=1339" class="u-fs-large btn u-block"><?php print t('Postgrado')?></a>
            </li>
            <li>
              <a href="<?php print url('portadilla-investigadores') ?>?tid=1339" class="u-fs-large btn u-block"><?php print t('Investigación / docencia')?></a>
            </li>
          </ul>
        </li>
        <li class="u-mb+">
          <div class="u-color-turquesa-oscuro">Información útil</div>
          <ul class="list-unstyled">
            <li>
              <a href="<?php print url('prepara-tu-viaje') ?>" class="u-fs-large btn u-block"><?php print t('Prepara tu viaje')?></a>
            </li>
            <li>
              <a href="<?php print url('info-paises') ?>" class="u-fs-large btn u-block"><?php print t('Información de los paises')?></a>
            </li>
            <li>
              <a href="<?php print url('preguntas-frecuentes') ?>" class="u-fs-large btn u-block"><?php print t('Preguntas frecuentes')?></a>
            </li>
            <li>
              <a href="<?php print url('campus-plus') ?>" class="u-fs-large btn u-block"><?php print t('Campus Plus')?></a>
            </li>
          </ul>
        </li>
        <li>
          <div class="u-color-turquesa-oscuro">Idioma</div>
          <ul class="list-unstyled">
            <?php $result = block_render('locale', 'language');
            print ($result);?>
          </ul>
        </li>
      </ul>


      <ul class="list-inline">
        <li>
          <a href="#" class="btn">
            <svg width="23px" height="19px" viewBox="0 1 23 19" version="1.1">
              <desc>Twitter</desc>
              <path d="M22.3561644,3.46805556 L20.260274,5.54583333 C20.260274,5.54583333 20.260274,5.35694444 20.260274,5.89166667 C20.260274,6.27083333 20.1987945,6.63333333 20.1093699,6.9875 C20.0604658,9.84722222 19.1424658,13.6375 15.369863,16.6291667 C7.9490137,22.5138889 0,17.3222222 0,17.3222222 C6.28767123,17.3222222 6.28767123,15.2430556 6.28767123,15.2430556 C4.89041096,15.2430556 2.09589041,12.4736111 2.09589041,12.4736111 C2.79452055,13.1652778 4.19178082,12.4736111 4.19178082,12.4736111 C0.698630137,10.3944444 0.698630137,8.31527778 0.698630137,8.31527778 C1.39726027,9.00833333 2.79452055,8.31527778 2.79452055,8.31527778 C-0.698630137,5.54583333 1.39726027,2.08194444 1.39726027,2.08194444 C2.09589041,5.54583333 11.1780822,6.93055556 11.1780822,6.93055556 L11.2940548,6.87361111 C11.2227945,6.55555556 11.1780822,5.88333333 11.1780822,5.54583333 C11.1780822,3.05833333 13.2110959,1.38888889 15.7191781,1.38888889 C17.0996712,1.38888889 18.3208767,2.0125 19.1536438,2.97777778 L19.5616438,2.775 L21.6575342,1.38888889 L20.260274,4.15972222 L22.3561644,3.46805556 L22.3561644,3.46805556 Z" id="Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
            </svg>
          </a>
        </li>
        <li>
          <a href="#" class="btn">
            <svg width="12px" height="21px" viewBox="44 0 12 21" version="1.1">
                <desc>Facebook</desc>
                <path d="M48.9041096,20.8277778 L48.9041096,11.1055556 L44.7123288,11.1041667 L44.7123288,8.32777778 L48.9041096,8.32777778 L48.9041096,4.16111111 C48.9041096,0.913888889 50.5556712,0 53.415863,0 C54.7851781,0 55.5061644,0.148611111 55.8498904,0.195833333 L55.8498904,3.48194444 L53.4242466,3.48194444 C51.8690959,3.48194444 51.6986301,5.84027778 51.6986301,6.93888889 L51.6986301,8.32777778 L55.890411,8.32777778 L55.1917808,11.1041667 L51.6986301,11.1041667 L51.6986301,20.8263889 L48.9041096,20.8277778 L48.9041096,20.8277778 Z" id="Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
            </svg>
          </a>
        </li>
        <li>
          <a href="#" class="btn">
              <svg width="23px" height="23px" viewBox="78 1 23 23" version="1.1">
                  <desc>Pinterest</desc>
                  <path d="M89.4288493,1.38888889 C83.2529589,1.38888889 78.2465753,6.36527778 78.2465753,12.5041667 C78.2465753,17.0555556 81.0005753,20.9666667 84.9408493,22.6847222 C84.9087123,21.9069444 84.9352603,20.9777778 85.1350685,20.1333333 C85.3502466,19.2305556 86.5742466,14.0763889 86.5742466,14.0763889 C86.5742466,14.0763889 86.2165479,13.3652778 86.2165479,12.3166667 C86.2165479,10.6694444 87.177863,9.44027778 88.3725205,9.44027778 C89.389726,9.44027778 89.8815616,10.2 89.8815616,11.1083333 C89.8815616,12.125 89.2304384,13.6444444 88.8936986,15.0541667 C88.6128493,16.2319444 89.4875342,17.1944444 90.6584384,17.1944444 C92.7780822,17.1944444 94.2046849,14.4888889 94.2046849,11.2847222 C94.2046849,8.84861111 92.5545205,7.02638889 89.5518082,7.02638889 C86.1606575,7.02638889 84.0466027,9.54027778 84.0466027,12.3472222 C84.0466027,13.3166667 84.3344384,14 84.7843562,14.5277778 C84.9911507,14.7708333 85.0204932,14.8680556 84.9450411,15.1472222 C84.8919452,15.35 84.7689863,15.8444444 84.7172877,16.0388889 C84.6432329,16.3208333 84.4140822,16.4208333 84.1583836,16.3166667 C82.5962466,15.6833333 81.868274,13.9819444 81.868274,12.0694444 C81.868274,8.91388889 84.5468219,5.12638889 89.8606027,5.12638889 C94.1292329,5.12638889 96.9391233,8.19722222 96.9391233,11.4930556 C96.9391233,15.8555556 94.4995068,19.1111111 90.9057534,19.1111111 C89.6985205,19.1111111 88.5625479,18.4625 88.1741096,17.7263889 C88.1741096,17.7263889 87.5257808,20.2875 87.3874521,20.7819444 C87.1499178,21.6388889 86.6860274,22.4944444 86.2626575,23.1625 C87.2672877,23.4569444 88.3306027,23.6180556 89.4316438,23.6180556 C95.606137,23.6180556 100.613918,18.6416667 100.613918,12.5027778 C100.613918,6.36388889 95.6033425,1.38888889 89.4288493,1.38888889 L89.4288493,1.38888889 Z" id="Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
              </svg>
          </a>
        </li>
      </ul>

      <ul class="list-inline u-uppercase">
        <li>
          <a href="#" class="btn u-fs-xsmall">Area privada</a>
        </li>
        <li>
          <a href="../aviso-legal" class="btn u-fs-xsmall">Aviso legal</a>
        </li>
        <li>
          <a href="#" class="btn u-fs-xsmall">Acerca de ...</a>
        </li>
        <li>
          <a href="../contacto" class="btn u-fs-xsmall">Contacto</a>
        </li>
      </ul>

    </div>
    <div class="overlay-page__content-after"></div>
  </div>
</div>
