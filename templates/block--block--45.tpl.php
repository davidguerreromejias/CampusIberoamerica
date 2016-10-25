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

<?php
  global $user; 
  $node = array('uid' => $user->uid, 'name' => (isset($user->name) ? $user->name : ''), 'type' => 'movilitat', 'language' => '');     
  print_r (drupal_get_form('movilitat_node_form', $node));
?>