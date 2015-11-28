<?php

namespace Drupal\customslider\Plugin\Field\FieldWidget;

use Drupal\Core\Form\FormStateInterface;
use Drupal\image\Plugin\Field\FieldWidget\ImageWidget;

/**
 * Plugin implementation of the 'image_image' widget.
 *
 * @FieldWidget(
 *   id = "slide_image",
 *   label = @Translation("Slide Image"),
 *   field_types = {
 *     "slideitem"
 *   }
 * )
 */
class SlideWidget extends ImageWidget {

  /**
   * {@inheritdoc}
   */
  public static function process($element, FormStateInterface $form_state, $form) {
    $item = $element['#value'];
    $element['slide_text'] = array(
      '#type' => 'textarea',
      '#title' => t('Slide Text'),
      '#default_value' => isset($element['#default_value']['slide_text']) ? $element['#default_value']['slide_text'] : '',
      '#maxlength' => 1024,
      '#weight' => -2,
    );
    $element = parent::process($element, $form_state, $form);
    return $element;
  }

}