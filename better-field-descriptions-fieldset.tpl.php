<?php

/**
 * @file
 * Better field descriptions theme implementation of a fieldset description.
 *
 * Available variables:
 * - $variables['label']: The label of the description.
 * - $variables['description']: The description itself.
 */
?>

<?php $rand = rand();?>

<fieldset class="collapsible collapsed form-wrapper better-descriptions">
  <legend><span class="fieldset-legend"><?php print ($variables['label']); ?></span></legend>
  <div class="fieldset-wrapper"><?php print ($variables['description']); ?></div>
</fieldset>

<!-- Button trigger modal -->
<button type="button" id="ayuda" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal<?php print $rand;?>">
  ?
</button>


<!-- Modal -->
  <div class="modal form-wrapper better-descriptions" id="myModal<?php print $rand;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <legend><span class="fieldset-legend"><?php print ($variables['label']); ?></span></legend>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="fieldset-wrapper"><?php print ($variables['description']); ?></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>