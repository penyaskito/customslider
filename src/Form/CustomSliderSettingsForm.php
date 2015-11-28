<?php
/**
 * @file
 * Contains Drupal\customslider\Form\CustomSliderSettingsForm.
 */

namespace Drupal\customslider\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomSliderSettingsForm.
 * @package Drupal\customslider\Form
 * @ingroup customslider
 */
class CustomSliderSettingsForm extends ConfigFormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'customslider_settings';
  }

  /**
   * Define the form used for ContentEntityExample settings.
   * @return array
   *   Form definition array.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   An associative array containing the current state of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('customslider.settings');
    $form['customslider.settings']['next'] = [
      '#type' => 'textfield',
      '#title' => t('Next button label'),
      '#default_value' => $config->get('next'),
    ];
    $form['customslider.settings']['previous'] = [
      '#type' => 'textfield',
      '#title' => t('Previous button label'),
      '#default_value' => $config->get('previous'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('customslider.settings')
      ->set('next', $form_state->getValue('next'))
      ->set('previous', $form_state->getValue('previous'))
      ->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames() {
    return ['customslider.settings'];
  }
}
?>