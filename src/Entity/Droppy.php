<?php
/**
 * @file
 * Contains \Drupal\droppy\Entity\Droppy
 */

namespace Drupal\droppy\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Droppy configuration entity.
 *
 * @ConfigEntityType(
 *   id = "droppy",
 *   label = @Translation("Droppy configuration"),
 *   handlers = {
 *     "list_builder" = "Drupal\droppy\DroppyListBuilder",
 *     "form" = {
 *       "add" = "Drupal\droppy\Form\DroppyForm",
 *       "edit" = "Drupal\droppy\Form\DroppyForm",
 *       "delete" = "Drupal\droppy\Form\DroppyDeleteForm"
 *     }
 *   },
 *   config_prefix = "droppy",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/user-interface/droppy/{droppy}",
 *     "add-form" = "/admin/config/user-interface/droppy/add",
 *     "edit-form" = "/admin/config/user-interface/droppy/{droppy}/edit",
 *     "delete-form" = "/admin/config/user-interface/droppy/{droppy}/delete",
 *     "collection" = "/admin/config/user-interface/droppy"
 *   }
 * )
 */
class Droppy extends ConfigEntityBase implements DroppyInterface {

  /**
   * The machine name of this Droppy configuration.
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of this Droppy configuration.
   * @var string
   */
  protected $label;

  /**
   * An array of Droppy options.
   * @var array
   */
  protected $options;
}
