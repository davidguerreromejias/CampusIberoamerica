<?php
/**
 * @file
 * Field validation numeric or specific words validator.
 * David Guerrero Mejias
 * InLab-FIB
 */
$plugin = array(
  'label' => t('Numeric values or words'),
  'description' => t('Verifies that user-entered values are numeric or specific words'),
  'handler' => array(
    'class' => 'field_validation_numericOrword_validator',
  ),
);

class field_validation_numericOrword_validator extends field_validation_validator {

  /**
   * Validate field. 
   */
  public function validate() {
    $settings = $this->rule->settings;
    $specific_values = explode(',', $settings['data']);
    $specific_values = array_map('trim', $specific_values);
    if ($this->value != '' && (!in_array($this->value, $specific_values)) && (!is_numeric($this->value))) {
      $this->set_error();
    }
  }
  
  /**
   * Provide settings option
   */
  function settings_form(&$form, &$form_state) {
    $default_settings = $this->get_default_settings($form, $form_state);
    //print debug($default_settings);
    $form['settings']['data'] = array(
      '#title' => t('(Key) value'),
      '#description' => t("Specify the specific value(s) you want the field to contain. Separate multiple options by a comma. For fields that have keys, use the key value instead."),
      '#type' => 'textarea',
      '#default_value' => isset($default_settings['data']) ? $default_settings['data'] : '',
    );	
    parent::settings_form($form, $form_state);
  }
  
  /**
   * Provide token help info for error message.
   */
  public function token_help() {
    $token_help = parent::token_help();
    $token_help += array(
      '[data]' => t('Words'),
    );
    return $token_help;
  }
}