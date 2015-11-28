<?php

namespace Drupal\customslider\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\image\Plugin\Field\FieldType\ImageItem;

/**
 * @FieldType(
 *   id = "slideitem",
 *   label = @Translation("Slide item"),
 *   description = @Translation("This field stores a slide."),
 *   category = @Translation("Slide"),
 *   default_widget = "slide_image",
 *   default_formatter = "slide",
 *   list_class = "\Drupal\file\Plugin\Field\FieldType\FileFieldItemList",
 * )
 */
class SlideItem extends ImageItem {

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);

    $properties['slide_text'] = DataDefinition::create('string')
      ->setLabel(t('Slide Text'))
      ->setDescription(t("Slide text."));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);
    $schema['columns']['slide_text'] = array(
      'description' => "Slide text.",
      'type' => 'varchar',
      'length' => 1024,
    );
    return $schema;
  }



}
