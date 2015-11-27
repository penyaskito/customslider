<?php

/**
 * @file
 * Contains \Drupal\customslider\Entity\Controller\CustomSliderListBuilder.
 */

namespace Drupal\customslider\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for customslider_contact entity.
 *
 * @ingroup customslider
 */
class CustomSliderListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('customslider implements a Custom Slider model. These Custom Slider are fieldable entities. You can manage the fields on the <a href="@adminlink">Custom Slider admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()->generateFromRoute('customslider.customslider_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the contact list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\customslider\Entity\Contact */
    $row['id'] = $entity->id();
    $row['name'] = $entity->link();
    return $row + parent::buildRow($entity);
  }

}
?>