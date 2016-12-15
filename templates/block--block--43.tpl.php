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

<div>
    <div class="container-fluid">
        <div class="row">
            <!--Menú-->
            <div class="col-sm-3 col-md-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li> <a href="/intranet"><img src="/sites/all/themes/zen/Nexos/assets/images/logo_campus_interior.png" style="max-width: 75%"></a></li>
                    
                    <li class="centrat blanc"> ADMINISTRACIÓN DE CONTENIDOS</li>

                    <li class="horizontal-line-separator-top2">

                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="/es/intranet/movilidades">Movilidades
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>

                    <li class="horizontal-line-separator-top2">


                    </li>
                <div>
                </div>
            </ul>
            </div>

            <div>
            </div>

        </div>
   </div>
</div>

