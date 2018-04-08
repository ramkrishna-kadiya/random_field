<?php

namespace Drupal\random_field\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'random_field_default_widget' widget.
 *
 * @FieldWidget(
 *   id = "random_field_default_widget",
 *   label = @Translation("Random field select"),
 *   field_types = {
 *     "random_field"
 *   }
 * )
 */
class RandomFieldDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta,
    Array $element,
    Array &$form,
    FormStateInterface $formState
  ) {
    
    $attributes = array();
    $random_value = NULL;
    $placeholder_text = NULL;

    if ($this->isDefaultValueWidget($formState)) {
      $items->setValue(NULL);
      $attributes = array(
        'readonly' => 'readonly',
        'disabled' => 'disabled',
      );
      $placeholder_text = t('No default value needed');
    } else {
      $uuid = \Drupal::service('uuid');
      $random_value = $uuid->generate();
      $attributes = array(
        'readonly' => 'readonly',
      );
      $placeholder_text = t('Random value');
    }

    $element['random_value'] = [
      '#type' => 'textfield',
      '#attributes' => $attributes,
      '#title' => t('Random value'),
      '#default_value' => isset($items[$delta]->random_value) ? 
          $items[$delta]->random_value : $random_value,
      '#empty_value' => '',
      '#placeholder' => $placeholder_text,
    ];

    return $element;
  }

} // class