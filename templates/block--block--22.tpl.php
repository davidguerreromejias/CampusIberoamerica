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

      <!-- footer:inicio -->
<div class="site-footer-logos">
  <a href="http://www.segib.org" target="_blank"><img class="u-mr" src="/sites/all/themes/zen/Nexos/assets/images/segib.svg" alt="SEGIB"></a>
  <a href="http://www.oei.es" target="_blank"><img class="u-mr" src="/sites/all/themes/zen/Nexos/assets/images/oei.svg" alt="OEI"></a>
  <a href="" target="_blank"><img src="/sites/all/themes/zen/Nexos/assets/images/cuib.svg" alt="CUIB"></a>
</div>

<div class="site-footer-menu display-only-up-sm u-f u-f-align-center">
  <div>
    <ul class="list-inline u-mb0">
      <li>
        <a href="https://twitter.com/Segibdigital" class="btn">
          <svg width="23px" height="19px" viewBox="0 1 23 19" version="1.1">
            <desc>Twitter</desc>
            <path d="M22.3561644,3.46805556 L20.260274,5.54583333 C20.260274,5.54583333 20.260274,5.35694444 20.260274,5.89166667 C20.260274,6.27083333 20.1987945,6.63333333 20.1093699,6.9875 C20.0604658,9.84722222 19.1424658,13.6375 15.369863,16.6291667 C7.9490137,22.5138889 0,17.3222222 0,17.3222222 C6.28767123,17.3222222 6.28767123,15.2430556 6.28767123,15.2430556 C4.89041096,15.2430556 2.09589041,12.4736111 2.09589041,12.4736111 C2.79452055,13.1652778 4.19178082,12.4736111 4.19178082,12.4736111 C0.698630137,10.3944444 0.698630137,8.31527778 0.698630137,8.31527778 C1.39726027,9.00833333 2.79452055,8.31527778 2.79452055,8.31527778 C-0.698630137,5.54583333 1.39726027,2.08194444 1.39726027,2.08194444 C2.09589041,5.54583333 11.1780822,6.93055556 11.1780822,6.93055556 L11.2940548,6.87361111 C11.2227945,6.55555556 11.1780822,5.88333333 11.1780822,5.54583333 C11.1780822,3.05833333 13.2110959,1.38888889 15.7191781,1.38888889 C17.0996712,1.38888889 18.3208767,2.0125 19.1536438,2.97777778 L19.5616438,2.775 L21.6575342,1.38888889 L20.260274,4.15972222 L22.3561644,3.46805556 L22.3561644,3.46805556 Z" id="Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
          </svg>
        </a>
      </li>
      <li>
        <a href="https://www.facebook.com/SEGIB/" class="btn">
          <svg width="12px" height="21px" viewBox="44 0 12 21" version="1.1">
              <desc>Facebook</desc>
              <path d="M48.9041096,20.8277778 L48.9041096,11.1055556 L44.7123288,11.1041667 L44.7123288,8.32777778 L48.9041096,8.32777778 L48.9041096,4.16111111 C48.9041096,0.913888889 50.5556712,0 53.415863,0 C54.7851781,0 55.5061644,0.148611111 55.8498904,0.195833333 L55.8498904,3.48194444 L53.4242466,3.48194444 C51.8690959,3.48194444 51.6986301,5.84027778 51.6986301,6.93888889 L51.6986301,8.32777778 L55.890411,8.32777778 L55.1917808,11.1041667 L51.6986301,11.1041667 L51.6986301,20.8263889 L48.9041096,20.8277778 L48.9041096,20.8277778 Z" id="Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
          </svg>
        </a>
      </li>
    </ul>
  </div>
  
  <div class="text-right u-f-g1 ">
    <ul class="list-inline u-uppercase u-mb0">
      <?php
      global $user;

      if ( $user->uid ) {
        ?><li>
          <a href="/es/intranet/" class="btn u-fs-small u-bold"><?php print t('Area privada')?></a>
        </li><?php
      }
      else {
        ?><li>
          <a href="/es/content/login#" class="btn u-fs-small u-bold"><?php print t('Area privada')?></a>
        </li><?php
      } ?>
      <li>
        <a href="<?php print url('aviso-legal') ?>" class="btn u-fs-small u-bold"><?php print t('Aviso legal')?></a>
      </li>
      <li>
        <a href="<?php print url('politica-privacidad') ?>" class="btn u-fs-small u-bold"><?php print t('Politica de privacidad')?></a>
      </li>
      <li>
        <a href="<?php print url('acerca-de') ?>" class="btn u-fs-small u-bold"><?php print t('Acerca de ...')?></a>
      </li>
      <li>
        <a href="<?php print url('contacto') ?>" class="btn u-fs-small u-bold"><?php print t('Contacto')?></a>
      </li>
    </ul>
  </div>
</div>
<!-- footer:fin -->
