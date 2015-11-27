<?php
/**
 * @file
 * Contains Drupal\customslider\Form\CustomSliderForm.
 */

namespace Drupal\customslider\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the customslider entity edit forms.
 *
 * @ingroup customslider
 */
class CustomSliderForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.customslider.collection');
    $entity = $this->getEntity();
    $entity->save();
  }
}

?>