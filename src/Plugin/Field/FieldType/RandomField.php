<?php

namespace Drupal\random_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'address' field type.
 *
 * @FieldType(
 *   id = "random_field",
 *   label = @Translation("Random field"),
 *   description = @Translation("Stores a random value."),
 *   default_widget = "random_field_default_widget",
 *   default_formatter = "random_field_default_formatter"
 * )
 */
class RandomField extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['random_value'] = DataDefinition::create('string')
      ->setLabel(t('Random value'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['random_value'] = [
      'type' => 'varchar',
      'length' => 255,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {

    $isEmpty = empty($this->get('random_value')->getValue());

    return $isEmpty;
  }

} // class