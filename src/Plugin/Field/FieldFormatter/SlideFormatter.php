<?php

namespace Drupal\customslider\Plugin\Field\FieldFormatter;


use Drupal\Core\Field\FieldItemListInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;

/**
 * Plugin implementation of the 'image' formatter.
 *
 * @FieldFormatter(
 *   id = "slide",
 *   label = @Translation("Slide"),
 *   field_types = {
 *     "slideitem"
 *   }
 * )
 */
class SlideFormatter extends ImageFormatter{


  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);
    $new_elements = [];
    foreach ($elements as $delta => $element) {
      $new_elements[$delta] = ['image' => $element];
    }
    foreach ($items as $delta => $item) {
      $new_elements[$delta]['text'] = ['#markup' => $item->slide_text];
    }
    return $new_elements;
  }
}