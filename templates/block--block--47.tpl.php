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

                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                        <a href="#"></i> Movilidades <span class="arrow"></span></a>
                    </li>

                    <ul class="sub-menu collapse" id="products">
                        <li><a href="#">General</a></li>
                        <li><a href="#">Buttons</a></li>
                        <li><a href="#">Tabs & Accordions</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">FontAwesome</a></li>
                        <li><a href="#">Slider</a></li>
                        <li><a href="#">Panels</a></li>
                        <li><a href="#">Widgets</a></li>
                        <li><a href="#">Bootstrap Model</a></li>
                    </ul>

                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                        <a href="#"></i> Movilidades <span class="arrow"></span></a>
                    </li>

                    <ul class="sub-menu collapse" id="products">
                        <li><a href="#">General</a></li>
                        <li><a href="#">Buttons</a></li>
                        <li><a href="#">Tabs & Accordions</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">FontAwesome</a></li>
                        <li><a href="#">Slider</a></li>
                        <li><a href="#">Panels</a></li>
                        <li><a href="#">Widgets</a></li>
                        <li><a href="#">Bootstrap Model</a></li>
                    </ul>

                    <li class="fletxa">
                        
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/movilidades">Movilidades
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/prepara-tu-viaje">Prepara tu viaje
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/lista-info-paises">Info de los países
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/preguntas-frecuentes">Preguntas frecuentes
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/campus-plus">Campus Plus
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/aviso-legal">Aviso Legal
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/política-de-privacidad">Política de Privacidad
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/acerca-de">Acerca De...
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/universidad">Taxonomía: Universidades
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/institucion-que-promueve">Taxonomía: Institución que promueve
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/institucion-que-promueve">Taxonomía: País
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/area-de-conocimiento">Taxonomía: Área de conocimiento
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/subarea-de-conocimiento">Taxonomía: Subárea de conocimiento
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
                    <li class="fletxa">
                        <a class="blanc" href="https://movia.fib.upc.edu:8444/es/intranet/taxonomia/nacionalidad">Taxonomía: Nacionalidad
                            <span class="icon-angle-right" style="float: right; margin: 5px;"></span>
                        </a>
                    </li>
            	</ul>
            </div>
        </div>
   </div>
</div>

