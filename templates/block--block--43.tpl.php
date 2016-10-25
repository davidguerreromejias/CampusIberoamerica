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
              	<li> <a href="http://campusiberoamerica.upc.edu/"><img src="/sites/all/themes/zen/Nexos/assets/images/logo_campus_interior.png"></a></li>
                
                <li class="centrat blanc"> ADMINISTRACIÓN DE CONTENIDOS</li>

                <li class="horizontal-line-separator-top2">

                <li class="fletxa"><a class="blanc"href="#">Añadir Movilidad </a></li>

                <li class="horizontal-line-separator-top2">

                <li class="fletxa"><a class="blanc" href="#">Opción 2</a> </li> 

                <li class="horizontal-line-separator-top2">

                <li class="fletxa"><a class="blanc" href="#">Opción 3</a></li>

                <li class="horizontal-line-separator-top2">

                <li class="fletxa"><a class="blanc" href="#">Opción 4</a></li>

                <li class="horizontal-line-separator-top2">
              </ul>
            </div>

            <div>
            </div>

        </div>
   </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>