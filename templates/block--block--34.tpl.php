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
            <span class="u-color-gris"><?php print t('Información de los paises')?></span>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-9">
        <div class="page-content-container u-mb++ ">
          <div class="u-mb u-fs-h2 u-bold"><?php print t('Información de los países')?></div>
          <div class="horizontal-line-separator-top horizontal-line-separator-bottom u-pv u-align-right@md">
            <ul class="list-inline u-mb0 u-fs-xsmall u-uppercase">
              <li>
                <span class="u-color-gris-claro u-fs-xxsmall">
                  <?php print t('Compartir')?>
                </span>
              </li>
              <li>
                <a href="https://twitter.com/segibdigital?lang=es" class="u-color-turquesa">
                  <i class="icon-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/SEGIB/" class="link u-color-turquesa">
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

          <div class="u-pv u-relative u-align-right">
            <div class=" display-only-up-lg">
              <div id="mapContainer" class= "u-inline-block">
                <img id="mapa" name="mapa" src="/sites/all/themes/zen/Nexos/assets/images/mapa-iberoamerica.png" usemap="#m_mapaiberoamerica" alt="Mapa Iberoamérica">

                <map name="m_mapaiberoamerica">
                  <area shape="poly" coords="475,19,475,19,469,22,471,26,479,26,478,22" href="<?php print url('info-pais') ?>/Andorra" alt="Andorra" data-state="andorra" data-full="Andorra">

                  <area shape="poly" coords="408,14,408,13,404,19,401,18,396,20,397,25,399,29,400,33,409,36,417,34,421,41,415,49,417,60,413,63,415,71,412,78,414,83,411,91,420,96,426,107,437,99,451,100,459,96,461,90,467,90,470,80,473,74,471,66,477,57,486,44,499,39,498,32,485,28,477,27,469,28,452,18,436,19,427,17,422,15,416,17,411,16,408,14" href="<?php print url('info-pais') ?>/españa" alt="España" data-state="españa" data-full="España">

                  <area shape="poly" coords="401,35,400,36,410,38,416,36,419,42,413,48,415,59,412,63,411,64,413,71,411,78,411,84,409,88,409,93,404,93,402,92,397,95,400,89,401,82,399,76,397,72,395,71,400,62,402,58,399,45,402,40" href="<?php print url('info-pais') ?>/portugal" alt="Portugal" data-state="portugal" data-full="Portugal">

                  <area shape="poly" coords="357,179,356,179,349,185,342,187,337,189,333,187,335,197,331,203,318,208,315,205,312,201,298,202,298,206,296,209,299,215,298,239,293,238,280,242,274,258,276,264,283,273,290,269,292,275,298,281,304,275,321,270,326,272,325,278,329,286,353,294,357,300,357,311,368,312,372,326,372,335,373,344,374,351,377,347,388,354,387,358,394,364,393,372,398,370,399,384,390,390,377,401,383,408,395,414,402,421,399,428,406,420,413,404,418,408,423,396,429,390,429,373,443,363,454,357,466,356,473,351,483,337,489,314,489,288,495,290,500,278,513,264,513,248,503,243,488,232,477,229,463,225,454,230,454,221,432,214,430,213,428,213,425,213,418,212,407,221,399,222,411,213,421,202,416,196,410,186,402,198,396,197,387,196,384,198,377,199,370,201,364,205,359,199,358,189,361,185,358,181" href="<?php print url('info-pais') ?>/brasil" alt="Brasil" data-state="brasil" data-full="Brasil">

                  <area shape="poly" coords="320,272,320,272,310,275,300,280,303,289,302,301,303,309,300,317,302,320,305,333,307,342,310,354,315,351,321,346,330,351,332,348,342,347,343,337,352,332,367,331,370,334,370,325,366,313,355,312,355,302,350,295,337,290,328,288,322,279,323,273" href="<?php print url('info-pais') ?>/bolivia" alt="Bolivia" data-state="bolivia" data-full="Bolivia">

                  <area shape="poly" coords="369,338,368,338,366,333,352,332,345,342,343,349,347,355,357,361,373,372,370,382,380,384,388,378,392,370,392,363,386,361,384,352,379,350,373,354,371,349,371,339" href="<?php print url('info-pais') ?>/paraguay" alt="Paraguay" data-state="paraguay" data-full="Paraguay">

                  <area shape="poly" coords="378,404,378,404,374,405,371,413,368,431,378,437,395,434,399,428,397,420,385,410,381,410,379,405" href="<?php print url('info-pais') ?>/uruguay" alt="Uruguay" data-state="uruguay" data-full="Uruguay">

                  <area shape="poly" coords="314,353,315,354,315,363,308,370,304,385,296,401,294,410,297,430,294,443,292,450,293,462,287,469,284,491,285,499,286,510,286,517,282,525,280,542,275,546,274,549,276,555,281,556,282,565,294,567,303,569,299,561,305,551,309,545,316,537,321,527,308,523,310,514,321,508,326,498,327,492,326,479,334,482,342,480,344,470,341,465,359,464,371,458,378,448,374,444,374,440,366,431,368,424,370,411,374,403,383,394,390,386,397,382,397,372,392,373,388,381,381,386,367,384,371,372,365,368,356,362,343,354,339,349,332,350,330,354,325,351,318,349,316,352" href="<?php print url('info-pais') ?>/argentina" alt="Argentina" data-state="argentina" data-full="Argentina">

                  <area shape="poly" coords="298,320,297,321,294,329,295,344,293,357,290,381,287,395,286,404,286,420,282,437,273,455,274,468,272,480,273,485,281,490,278,493,277,502,276,515,272,525,267,517,262,524,271,528,271,531,273,535,269,540,269,548,274,555,274,546,280,538,280,525,285,515,286,506,283,494,283,485,286,468,291,459,291,447,294,440,296,428,294,414,293,405,297,392,304,382,305,369,309,365,314,360,313,356,307,356,302,340,303,333,300,323" href="<?php print url('info-pais') ?>/chile" alt="Chile" data-state="chile" data-full="Chile">

                  <area shape="poly" coords="264,216,258,225,248,231,241,242,236,242,231,238,228,234,225,240,228,247,248,278,254,295,270,312,289,324,293,324,300,313,300,303,301,293,300,287,294,279,291,278,288,271,281,275,274,266,271,259,273,253,278,242,291,237,290,230,285,226,274,228,272,220" href="<?php print url('info-pais') ?>/peru" alt="Perú" data-state="peru" data-full="Perú">

                  <area shape="poly" coords="237,205,237,205,231,212,229,218,230,225,233,226,231,233,232,238,239,242,243,232,248,228,260,220,261,214,256,210,248,209,241,203,240,202" href="<?php print url('info-pais') ?>/ecuador" alt="Ecuador" data-state="ecuador" data-full="Ecuador">

                  <area shape="poly" coords="278,142,286,135,282,134,276,139,268,142,263,141,258,152,252,158,248,162,247,165,251,173,250,178,250,186,245,195,241,200,249,208,259,208,267,215,273,218,275,226,286,224,287,225,295,228,292,235,296,237,297,223,298,215,293,208,298,205,297,203,296,200,309,200,313,199,308,192,308,189,306,180,307,174,297,174,291,168,283,167,278,161,276,156,273,151,276,145" href="<?php print url('info-pais') ?>/colombia" alt="Colombia" data-state="colombia" data-full="Colombia">

                  <area shape="poly" coords="333,145,333,145,324,149,312,146,304,145,300,140,288,142,285,146,290,152,284,155,282,149,283,140,281,141,276,148,274,152,277,155,280,159,280,163,286,167,292,165,299,173,310,172,308,181,311,188,310,192,313,202,319,207,329,203,332,199,334,196,333,194,330,186,328,186,337,187,340,189,341,186,349,183,354,179,349,175,352,169,355,167,355,162,358,159,355,156,346,159,351,154,349,152,343,148,337,146" href="<?php print url('info-pais') ?>/venezuela" alt="Venezuela" data-state="venezuela" data-full="Venezuela">

                  <area shape="poly" coords="285,86,283,86,284,96,287,99,291,94,294,95,301,94,305,94,302,89" href="<?php print url('info-pais') ?>/republica-dominicana" title="República Dominicana" alt="República Dominicana"  data-state="republica-dominicana" data-full="República Dominicana">

                  <area shape="poly" coords="215,63,214,63,202,71,206,73,215,68,221,70,230,71,240,76,250,81,246,86,253,84,267,84,266,81,252,75,236,68,224,64,213,64,218,62" href="<?php print url('info-pais') ?>/cuba" alt="Cuba" data-state="cuba" data-full="Cuba">

                  <area shape="poly" coords="215,152,215,160,225,163,232,165,231,159,238,155,245,158,242,163,247,163,249,157,239,152,231,152,224,156,217,152" href="<?php print url('info-pais') ?>/panama" alt="Panamá" data-state="panama" data-full="Panamá">

                  <area shape="poly" coords="203,143,201,142,197,143,198,148,201,150,202,148,209,155,214,159,213,150,209,144,204,143" href="<?php print url('info-pais') ?>/costa-rica" alt="Costa Rica" data-state="costa-rica" data-full="Costa Rica">

                  <area shape="poly" coords="211,118,203,122,201,121,194,125,191,129,186,131,194,140,198,134,205,143,208,141,211,130,211,119" href="<?php print url('info-pais') ?>/nicaragua" alt="Nicaragua" data-state="nicaragua" data-full="Nicaragua">

                  <area shape="poly" coords="184,113,177,115,176,120,182,122,186,129,190,129,191,124,197,123,202,118,204,121,209,117,199,110,186,112" href="<?php print url('info-pais') ?>/honduras" alt="Honduras" data-state="honduras" data-full="Honduras">

                  <area shape="poly" coords="174,126,174,125,181,129,183,128,181,123,175,121,170,125" href="<?php print url('info-pais') ?>/el-salvador" alt="El Salvador" data-state="el-salvador" data-full="El Salvador">

                  <area shape="poly" coords="157,121,157,122,166,125,170,124,175,120,175,117,181,112,174,111,173,101,164,102,163,104,168,110,163,111,159,114,156,121" href="<?php print url('info-pais') ?>/guatemala" alt="Guatemala" data-state="guatemala" data-full="Guatemala">

                  <area shape="poly" coords="3,2,8,16,17,27,16,32,15,36,21,40,25,39,30,45,31,52,47,65,46,59,42,56,37,50,32,40,24,27,14,16,14,8,15,5,24,10,32,25,40,33,50,42,48,47,61,54,72,73,72,84,78,90,92,98,119,108,129,113,140,108,148,111,156,119,157,114,159,111,167,109,160,103,163,99,173,100,181,92,183,96,185,89,184,84,189,78,184,75,172,75,166,81,164,89,161,95,153,93,142,97,134,92,132,95,121,75,120,63,120,53,124,47,111,43,106,34,100,23,93,19,87,26,79,20,72,10,64,6,55,7,53,11,30,6,12,0,4,0" href="<?php print url('info-pais') ?>/mexico" alt="México" data-state="mexico" data-full="México">
                </map>
              </div>
            </div>
            <div class="p-paises_listado-container">
              <div class="u-mb u-fs-large u-bold">
                <?php print t('Escoge el país')?> <br class="display-only-up-lg"/>
                <?php print t('sobre el que quieres')?> <br class="display-only-up-lg"/>
                <?php print t('obtener información')?>
              </div>

              <ul class="list-inline u-fs-small">
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/andorra" class="link u-block"><?php print t('Andorra')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/españa" class="link u-block"><?php print t('España')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/brasil" class="link u-block"><?php print t('Brasil')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/nicaragua" class="link u-block"><?php print t('Nicaragua')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/el-salvador" class="link u-block"><?php print t('El salvador')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/ecuador" class="link u-block"><?php print t('Ecuador')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/peru" class="link u-block"><?php print t('Perú')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/mexico" class="link u-block"><?php print t('México')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/venezuela" class="link u-block"><?php print t('Venezuela')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/uruguay" class="link u-block"><?php print t('Uruguay')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/colombia" class="link u-block"><?php print t('Colombia')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/guatemala" class="link u-block"><?php print t('Guatemala')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/bolivia" class="link u-block"><?php print t('Bolivia')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/argentina" class="link u-block"><?php print t('Argentina')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/chile" class="link u-block"><?php print t('Chile')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/cuba" class="link u-block"><?php print t('Cuba')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/republica-dominicana" class="link u-block"><?php print t('Republica dominicana')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/panama" class="link u-block"><?php print t('Panamá')?></a>
                </li>
                <li class="p-paises_pais horizontal-line-separator-bottom u-pv-- u-ph-">
                  <a href="<?php print url('info-pais') ?>/costa-rica" class="link u-block"><?php print t('Costa Rica')?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-3">
        <div class="u-mb">
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