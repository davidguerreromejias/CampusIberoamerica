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
    <div class="menu">
        <div class="container-fluid">

            <div class="responsive-menu"> 
                <?php 
                    $block = block_load('superfish', 1);
                    $output = render(_block_get_renderable_array(_block_render_blocks(array($block))));
                    print $output;
                ?>
            </div>
            <div class="row">
                <!--Menú
                <div class="hamburguer-menu2">
                    <button class="hamburger" data-target="#hamburger">&#9776; </button>
                    <button class="cross" data-target="#cross">&#735;</button>
                </div>-->
                
                <div class="col-sm-3 col-md-2 sidebar" style="overflow: visible">
                    <ul class="nav nav-sidebar">
                        <li> <a href="/intranet" style="margin-top: 11%; margin-left: -13%;"><img src="/sites/all/themes/zen/Nexos/assets/images/logo_campus_interior.png" style="max-width: 75%"></a></li>
                        <!--Working on it-->
                        <li class="centrat blanc"> ADMINISTRACIÓN DE CONTENIDOS</li>
                        <div class="non-responsive-menu" style="margin-left: 11%; font-size: 16px; max-width: 75%">
                            <?php 
                                $block = block_load('superfish', 1);
                                $output = render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                print $output;
                            ?>
                        </div>

                        <!--
                        

                        <li  data-toggle="collapse" data-target="#contenidos" class="collapsed active menu-contenidos">
                            <a href="#"></i> Gestión de contenidos <span class="arrow"></span></a>
                        </li>

                        <ul class="sub-menu collapse" id="contenidos">
                            <li  data-toggle="collapse" data-target="#movilidades" class="collapsed active">
                                <a href="#"></i> Movilidades <span class="arrow"></span></a>
                                <ul class="sub-sub-menu collapse" id="movilidades">
                                    <li>
                                        <a class="blanc" href="/es/intranet/movilidades">Publicadas<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                                    </li>
                                    <li>
                                        <a class="blanc" href="/es/intranet/movilidades-no-publicadas">No Publicadas<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/prepara-tu-viaje">Prepara tu viaje<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>   
                            <li>
                                <a class="blanc" href="/es/intranet/lista-info-paises">Info de los países<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/preguntas-frecuentes">Preguntas frecuentes<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/campus-plus">Campus Plus<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/aviso-legal">Aviso Legal<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/política-de-privacidad">Política de Privacidad<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/acerca-de">Acerca De...<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                        </ul>

                        <li  data-toggle="collapse" data-target="#listados" class="collapsed active">
                            <a href="#"></i> Gestión de listados <span class="arrow"></span></a>
                        </li>

                        <ul class="sub-menu collapse" id="listados">
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/universidad">Universidades<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/institucion-que-promueve">Institución que promueve<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/institucion-que-promueve">País<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/area-de-conocimiento">Área de conocimiento<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/subarea-de-conocimiento">Subárea de conocimiento<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                            <li>
                                <a class="blanc" href="/es/intranet/taxonomia/nacionalidad">Nacionalidad<span class="icon-angle-right" style="float: right; margin: 5px;"></span></a>
                            </li>
                        </ul> -->
                	</ul>
                </div>
            </div>
        </div>
    </div>
</div> 

