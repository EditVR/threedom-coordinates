<?php

namespace Drupal\threedom_coordinates\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides 3D Coordinates widget.
 *
 * @FieldWidget(
 *   id = "threedom_coordinates_widget",
 *   label = @Translation("3D Coordinates"),
 *   field_types = {
 *     "threedom_coordinates"
 *   }
 * )
 */
class ThreedomCoordinatesWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $element['#theme_wrappers'][] = 'fieldset';

    $element['xAxis'] = [
      '#type' => 'number',
      '#title' => t('X-Axis Value'),
      '#size' => 6,
      '#default_value' => isset($items[$delta]->xAxis) ? $items[$delta]->xAxis : '',
      '#delta' => $delta,
      '#description' => 'Pitch - Rotation about the X-axis'
//      '#element_validate' => [[$this, 'validate']],
    ];
    $element['yAxis'] = [
      '#type' => 'number',
      '#title' => t('Y-Axis Value'),
      '#size' => 6,
      '#default_value' => isset($items[$delta]->yAxis) ? $items[$delta]->yAxis : '',
      '#delta' => $delta,
      '#description' => 'Yawn - Rotation about the Y-axis'
//      '#element_validate' => [[$this, 'validate']],
    ];
    $element['zAxis'] = [
      '#type' => 'number',
      '#title' => t('Z-Axis Value'),
      '#size' => 6,
      '#default_value' => isset($items[$delta]->zAxis) ? $items[$delta]->zAxis : '',
      '#delta' => $delta,
      '#description' => 'Roll - Rotation about the Z-axis'
//      '#element_validate' => [[$this, 'validate']],
    ];

    return $element;

  }

// @todo need to do some kind of validation for the fields to make sure data is correct
  public function validate($element, FormStateInterface $form_state) {
//    $values = [];
//    $form_state->setValueForElement($element, $value);

  }

}