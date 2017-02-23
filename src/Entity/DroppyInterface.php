<?php
/**
 * @file
 * Contains \Drupal\droppy\DroppyInterface
 */

namespace Drupal\droppy\Entity;


use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a Droppy configuration entity.
 * @package Drupal\droppy\Entity
 */
interface DroppyInterface extends ConfigEntityInterface {

  /**
   * Gets the options.
   *
   * @return array
   *   The options array.
   */
  public function getOptions();

  /**
   * Gets the configuration list.
   *
   * @return array
   *   An array of Droppy configuration. The config ID is the key, and the
   *   config label the value.
   */
  public static function getConfigList();
}