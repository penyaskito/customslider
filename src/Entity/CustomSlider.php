<?php

namespace Drupal\customslider\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use \Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the node entity class.
 *
 * @ContentEntityType(
 *   id = "customslider",
 *   label = @Translation("Custom Slider"),
 *   base_table = "customslider",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "langcode" = "langcode",
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\customslider\Entity\Controller\CustomSliderListBuilder",
 *     "form" = {
 *       "add" = "Drupal\customslider\Form\CustomSliderForm",
 *       "edit" = "Drupal\customslider\Form\CustomSliderForm",
 *       "delete" = "Drupal\customslider\Form\CustomSliderDeleteForm",
 *     },
 *   },
 *   admin_permission = "administer customslider",
 *   field_ui_base_route = "customslider.customslider_settings",
 *   links = {
 *     "canonical" = "/customslider/{customslider}",
 *     "delete-form" = "/customslider/{customslider}/delete",
 *     "edit-form" = "/customslider/{customslider}/edit",
 *   },
 *   translatable = TRUE,
 * )
 **/
class CustomSlider extends ContentEntityBase implements ContentEntityInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Slider ID'))
      ->setDescription(t('The slider ID.'))
      ->setReadOnly(TRUE)
      ->setSetting('unsigned', TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -5,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -5,
      ))
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    $fields['description'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Slider description'))
      ->setDescription(t('A brief description of your slider.'))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -2,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -2,
      ))
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language'))
      ->setDescription(t('The node language code.'))
      ->setTranslatable(TRUE)
      ->setDisplayOptions('view', array(
        'type' => 'hidden',
      ))
      ->setDisplayOptions('form', array(
        'type' => 'language_select',
        'weight' => 2,
      ));

    return $fields;
  }

  public function label() {
    return $this->get('name')->value;
  }


}