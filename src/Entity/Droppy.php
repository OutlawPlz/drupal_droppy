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
   * The human-redable name of this Droppy configuration.
   * @var string
   */
  protected $label;

  /**
   * A valid CSS selector of your dropdown.
   * @var string;
   */
  protected $dropdown_selector;

  /**
   * A valid CSS selector of your parent element.
   * @var string
   */
  protected $parent_selector;

  /**
   * A valid CSS selector of your trigger element.
   * @var string
   */
  protected $trigger_selector;

  /**
   * Keep open only one dropdown at a time.
   * @var boolean
   */
  protected $close_others;

  /**
   * Close all the dropdowns by clicking on the outside of the menu.
   * @var boolean
   */
  protected $click_out_to_close;

  /**
   * Close all the dropdowns by clicking ESC.
   * @var boolean
   */
  protected $click_esc_to_close;

  /**
   * A CSS class where is declared an animation.
   * @var string
   */
  protected $animation_in;

  /**
   * A CSS class where is declared an animation.
   * @var string
   */
  protected $animation_out;

  /**
   * Prevent the execution of the trigger element default behaviour.
   * @var boolean
   */
  protected $prevent_default;
}