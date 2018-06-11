<?php

namespace Drupal\threedom_coordinates\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Provides a field type for 3D Coordinates.
 *
 * @FieldType(
 *   id = "threedom_coordinates",
 *   label = @Translation("3D Coordinates Field"),
 *   description = @Translation("Stores 3D Coordinate values"),
 *   default_formatter = "threedom_coordinates_formatter",
 *   default_widget = "threedom_coordinates_widget",
 * )
 */
class ThreedomCoordinatesItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'xAxis' => [
          'type' => 'numeric',
          'precision' => 3
         ],
        'yAxis' => [
          'type' => 'numeric',
          'precision' => 3
        ],
        'zAxis' => [
          'type' => 'numeric',
          'precision' => 3
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $xAxisValue = $this->get('xAxis')->getValue();
    $yAxisValue = $this->get('yAxis')->getValue();
    $zAxisValue = $this->get('zAxis')->getValue();
    return empty($xAxisValue) && empty($yAxisValue) && empty($zAxisValue);
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['xAxis'] = DataDefinition::create('string')
      ->setLabel(t('X-Axis'))
      ->setDescription(t('X-Axis Value'));
    $properties['yAxis'] = DataDefinition::create('string')
      ->setLabel(t('Y-Axis'))
      ->setDescription(t('Y-Axis Value'));
    $properties['zAxis'] = DataDefinition::create('string')
      ->setLabel(t('Z-Axis'))
      ->setDescription(t('Z-Axis Value'));
    return $properties;

  }
}