<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>

  <!-- ORDENAR POR -->
    <?php if (!empty($sort_by)): ?>

			<div style="display: inline;" class="form-item form-type-select form-item-sort-by">
			  	<?php print_r($sort_by); ?>
			<div>
  	
  	<?php endif; ?>

<div class="p-rdo-busqueda_filtros">
	<p class="u-bold u-fs-xsmall u-color-gris-claro u-mb--"><?php print t('Filtros y busqueda avanzada')?></p>
	<div class="views-exposed-form">
	  <div class="views-exposed-widgets clearfix">

	  	<!-- DIRIGIDO A... -->

	      <div id="<?php print $widgets['filter-field_instituci_n_que_promueve_value']->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
	      	<div class="search-filter is-open">
	          <div class="search-filter__name">
	            <span class="u-semibold"><?php print t('Dirigido a...')?></span>
	            <span  class="search-filter__down-arrow">
	              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
					  <desc>down arrow</desc>
					  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
					  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
				  </svg>
				</span>
	          </div>
	          <div class="search-filter__summary u-hide">
	          </div>
	        <div class="search-filter__blocks-container">
	            <div class="search-filter__fixed-block">
	            
	          
	        <?php if (!empty($widgets['filter-tid']->operator)): ?>
	          <div class="views-operator">
	            <?php print $widgets['filter-tid']->operator; ?>
	          </div>
	        <?php endif; ?>
	        <div class="views-widget">
		          <?php print $widgets['filter-tid']->widget; ?>
	          </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- PAÍS ORIGEN -->

	      <div id="<?php print $widgets['filter-field_ambito_pais_tid']->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
	      	<div class="search-filter is-open">
	          <div class="search-filter__name">
	            <span class="u-semibold"><?php print t('País de origen')?></span>
	            <span  class="search-filter__down-arrow">
	              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
					  <desc>down arrow</desc>
					  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
					  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
				  </svg>
				</span>
	          </div>
	          <div class="search-filter__summary u-hide">
	          </div>
	        <div class="search-filter__blocks-container">
	            <div class="search-filter__fixed-block">
	            
	          
	        <?php if (!empty($widgets['filter-field_ambito_pais_tid']->operator)): ?>
	          <div class="views-operator">
	            <?php print $widgets['filter-field_ambito_pais_tid']->operator; ?>
	          </div>
	        <?php endif; ?>
	        <div class="views-widget">
	        	<div class="input-action">
		          <?php print $widgets['filter-field_ambito_pais_tid']->widget; ?>
		          </div>
	          </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- PAÍS DESTINO -->

	      <div id="<?php print $widgets['filter-field_ambito_pais_tid_1']->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
	      	<div class="search-filter is-open">
	          <div class="search-filter__name">
	            <span class="u-semibold"><?php print t('País al que quieres ir')?></span>
	            <span  class="search-filter__down-arrow">
	              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
					  <desc>down arrow</desc>
					  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
					  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
				  </svg>
				</span>
	          </div>
	          <div class="search-filter__summary u-hide">
	          </div>
	        <div class="search-filter__blocks-container">
	            <div class="search-filter__fixed-block">
	            
	          
	         <?php if (!empty($widgets['filter-field_ambito_pais_tid_1']->operator)): ?>
	          <div class="views-operator">
	            <?php print $widgets['filter-field_ambito_pais_tid_1']->operator; ?>
	          </div>
	        <?php endif; ?>
	        <div class="views-widget">
	        	<div class="input-action">
		          <?php print $widgets['filter-field_ambito_pais_tid_1']->widget; ?>
		          </div>
	          </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- UNIVERSIDAD O CENTRO -->

	      <div id="<?php print $widgets['filter-field__mbito_univ_centro_tid']->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
	      	<div class="search-filter is-open">
	          <div class="search-filter__name">
	            <span class="u-semibold"><?php print t('Universidad o centro')?></span>
	            <span  class="search-filter__down-arrow">
	              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
					  <desc>down arrow</desc>
					  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
					  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
				  </svg>
				</span>
	          </div>
	          <div class="search-filter__summary u-hide">
	          </div>
	        <div class="search-filter__blocks-container">
	            <div class="search-filter__fixed-block">
	            
	          
	        <?php if (!empty($widgets['filter-field__mbito_univ_centro_tid']->operator)): ?>
	          <div class="views-operator">
	            <?php print $widgets['filter-field__mbito_univ_centro_tid']->operator; ?>
	          </div>
	        <?php endif; ?>
	        <div class="views-widget">
	        	<div class="input-action">
		          <?php print $widgets['filter-field__mbito_univ_centro_tid']->widget; ?>
		          </div>
	          </div>
	          </div>
	        </div>
	      </div>
	    </div>


	    <!-- NOMBRE DEL PROGRAMA -->

	      <div id="<?php print $widgets['filter-keys']->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
	      	<div class="search-filter is-open">
	          <div class="search-filter__name">
	            <span class="u-semibold"><?php print t('Nombre del programa')?></span>
	            <span  class="search-filter__down-arrow">
	              <svg width="9px" height="5px" viewBox="288 25 9 5" version="1.1" xmlns="http://www.w3.org/2000/svg"; xmlns:xlink="http://www.w3.org/1999/xlink">;
					  <desc>down arrow</desc>
					  <path d="M295.906276,25.5424944 L292.259406,29.5188965 C292.248066,29.5349061 292.252069,29.5575865 292.237393,29.571595 C292.171353,29.6383019 292.084634,29.6669859 291.998582,29.6629835 C291.913197,29.6663188 291.827145,29.6369678 291.762439,29.571595
					  C291.747764,29.5575865 291.751099,29.5355732 291.740426,29.5195635 L288.093557,25.5431614 C287.968814,25.4190865 287.968814,25.2182985 288.093557,25.0935565 C288.218299,24.9694816 288.418419,24.9694816 288.543161,25.0935565 L292.000583,28.863167 L295.458672,25.0935565 C295.582747,24.9688145 295.783535,24.9688145 295.90761,25.0935565 C296.031018,25.2176315 296.031018,25.4190865 295.906276,25.5424944 L295.906276,25.5424944 Z" stroke="none" fill="#656565" fill-rule="evenodd"></path>
				  </svg>
				</span>
	          </div>
	          <div class="search-filter__summary u-hide">
	          </div>
	        <div class="search-filter__blocks-container">
	            <div class="search-filter__fixed-block">
	            
	          
	        <?php if (!empty($widgets['filter-field_nombre_del_programa_value']->operator)): ?>
	          <div class="views-operator">
	            <?php print $widgets['filter-field_nombre_del_programa_value']->operator; ?>
	          </div>
	        <?php endif; ?>
	        <div class="views-widget">
	        	<div class="input-action">
	        		<button class="input-action__button">
	                  <i class="icon-lupa"></i>
	                </button>
		          <?php print $widgets['filter-field_nombre_del_programa_value']->widget; ?>
		          </div>
	          </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    

	    <!-- OTRO WIDGET -->
	    <?php if (!empty($items_per_page)): ?>
	      <div class="views-exposed-widget views-widget-per-page">
	        <?php print $items_per_page; ?>
	      </div>
	      <!--<div class="views-exposed-widget views-widget-sort-order">-->
	        <?php// print $sort_order; ?>
	      <!--</div> -->
	    <?php endif; ?>
	    <?php if (!empty($offset)): ?>
	      <div class="views-exposed-widget views-widget-offset">
	        <?php print $offset; ?>
	      </div>
	    <?php endif; ?>
	    <div class="views-exposed-widget views-submit-button">
	      <?php print $button; ?>
	    </div>
	    <?php if (!empty($reset_button)): ?>
	      <div class="views-exposed-widget views-reset-button">
	        <?php print $reset_button; ?>
	      </div>
	    <?php endif; ?>
	  </div>
	</div>
</div>


