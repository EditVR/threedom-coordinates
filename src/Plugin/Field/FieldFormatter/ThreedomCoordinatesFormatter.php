<?php

namespace Drupal\threedom_coordinates\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Provides 3D Coordinates formatter.
 *
 * @FieldFormatter (
 *   id = "threedom_coordinates_formatter",
 *   label = @Translation("3D Coordinates"),
 *   field_types = {
 *     "threedom_coordinates"
 *   }
 * )
 */
class ThreedomCoordinatesFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode = NULL) {
    $elements = array();

    foreach ($items as $delta => $item) {

      if (!empty($item->xAxis && $item->yAxis && $item->zAxis)) {
        // This is just outputting the value as regular markup for now.
        $markup = 'x value: '. $item->xAxis . ', ' .
        'y value: '. $item->yAxis . ', ' .
        'z value: '. $item->zAxis;
      }

      $elements[$delta] = array(
        '#type' => 'markup',
        '#markup' => $markup,
      );
    }

    return $elements;
  }
}