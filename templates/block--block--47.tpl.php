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

                    <li  data-toggle="collapse" data-target="#contenidos" class="collapsed active">
                        <a href="#"></i> Gestión de contenidos <span class="arrow"></span></a>
                    </li>

                    <ul class="sub-menu collapse" id="contenidos">
                        <li  data-toggle="collapse" data-target="#movilidades" class="collapsed active">
                            <a href="#"></i> Movilidades <span class="arrow"></span></a>
                            <ul class="sub-sub-menu collapse" id="movilidades">
                                <li>
                                    <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/movilidades">Publicadas<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                                </li>
                                <li>
                                    <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/movilidades-no-publicadas">No Publicadas<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/prepara-tu-viaje">Prepara tu viaje<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/lista-info-paises">Info de los países<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/preguntas-frecuentes">Preguntas frecuentes<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/campus-plus">Campus Plus<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/aviso-legal">Aviso Legal<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/política-de-privacidad">Política de Privacidad<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/acerca-de">Acerca De...<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                    </ul>

                    <li  data-toggle="collapse" data-target="#listados" class="collapsed active">
                        <a href="#"></i> Gestión de listados <span class="arrow"></span></a>
                    </li>

                    <ul class="sub-menu collapse" id="listados">
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/universidad">Universidades<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/institucion-que-promueve">Institución que promueve<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/institucion-que-promueve">País<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/area-de-conocimiento">Área de conocimiento<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/subarea-de-conocimiento">Subárea de conocimiento<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                        <li>
                            <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/nacionalidad">Nacionalidad<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                        </li>
                    </ul>
            	</ul>
            </div>
        </div>
   </div>
</div>

