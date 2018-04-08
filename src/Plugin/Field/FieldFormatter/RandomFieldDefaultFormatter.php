<?php

namespace Drupal\random_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;

/**
 * Plugin implementation of the 'AddressDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "random_field_default_formatter",
 *   label = @Translation("Random Field"),
 *   field_types = {
 *     "random_field"
 *   }
 * )
 */
class RandomFieldDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->random_value
      ];
    }

    return $elements;
  }
  
} // class