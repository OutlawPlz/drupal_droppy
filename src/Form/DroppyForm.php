<?php
/**
 * @files
 * Contains \Drupal\droppy\Form\DroppyForm
 */

namespace Drupal\droppy\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form handler for the Droppy configuration add and edit forms.
 */
class DroppyForm extends EntityForm {

  /**
   * Gets the actual form array to be built.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @return array
   *   The form structure.
   */
  public function form(array $form, FormStateInterface $form_state) {

    /** @var \Drupal\droppy\Entity\DroppyInterface $entity */
    $entity = $this->entity;
    $form = parent::form($form, $form_state);

    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => EntityTypeInterface::ID_MAX_LENGTH,
      '#default_value' => $entity->label(),
      '#description' => $this->t(''),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $entity->id(),
      '#maxlength' => EntityTypeInterface::ID_MAX_LENGTH,
      '#machine_name' => array(
        'exists' => '\Drupal\droppy\Entity\Droppy::load',
        'source' => array('label')
      ),
      '#disabled' => !$entity->isNew(),
      '#description' => $this->t('')
    );

    $form['menu_structure'] = array(
      '#type' => 'details',
      '#title' => $this->t('Drop-down menu structure'),
      '#open' => TRUE
    );

    $form['menu_structure']['dropdown_selector'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Dropdown selector'),
      '#default_value' => $entity->get('dropdown_selector'),
      '#description' => $this->t('It\'s a valid CSS selector of your drop-down.'),
      '#required' => TRUE
    );

    $form['menu_structure']['parent_selector'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Parent selector'),
      '#default_value' => $entity->get('parent_selector'),
      '#description' => $this->t('It\'s a valid CSS selector of your parent element.'),
      '#required' => TRUE
    );

    $form['menu_structure']['trigger_selector'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Trigger selector'),
      '#default_value' => $entity->get('trigger_selector'),
      '#description' => $this->t('It\'s a valid CSS selector of the element that triggers the open / close event.'),
      '#required' => TRUE
    );

    $form['closing_options'] = array(
      '#type' => 'details',
      '#title' => $this->t('Closing options'),
      '#open' => TRUE
    );

    $form['closing_options']['close_others'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Close others'),
      '#default_value' => $entity->get('close_others'),
      '#description' => $this->t('Check if you want keep open only one drop-down at a time.'),
      '#required' => FALSE
    );

    $form['closing_options']['click_out_to_close'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Click out to close'),
      '#default_value' => $entity->get('click_out_to_close'),
      '#description' => $this->t('Check if you want to close all the drop-downs by clicking on the outside of the current menu.'),
      '#required' => FALSE
    );

    $form['closing_options']['click_esc_to_close'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Click ESC to close'),
      '#default_value' => $entity->get('click_esc_to_close'),
      '#description' => $this->t('Check if you want to close all the drop-downs by clicking ESC.'),
      '#required' => FALSE
    );

    $form['animation_css'] = array(
      '#type' => 'details',
      '#title' => $this->t('Animation CSS'),
    );

    $form['animation_css']['animation_in'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Animation in'),
      '#default_value' => $entity->get('animation_in'),
      '#description' => $this->t('A CSS class where is declared an animation.'),
      '#required' => FALSE
    );

    $form['animation_css']['animation_out'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Animation out'),
      '#default_value' => $entity->get('animation_out'),
      '#description' => $this->t('A CSS class where is declared an animation.'),
      '#required' => FALSE
    );

    $form['others'] = array(
      '#type' => 'details',
      '#title' => $this->t('Others'),
    );

    $form['others']['prevent_default'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Prevent default'),
      '#default_value' => $entity->get('prevent_default'),
      '#description' => $this->t('If the triggerSelector is an element that fires an event, you can prevent the execution of the default behavior by setting this option to true.'),
      '#required' => FALSE
    );

    return $form;
  }

  /**
   * Form submission handler for the 'save' action.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @return int
   *   Either SAVED_NEW or SAVED_UPDATED, depending on the operation performed.
   */
  public function save(array $form, FormStateInterface $form_state) {

    /** @var \Drupal\droppy\Entity\DroppyInterface $entity */
    $entity = $this->entity;
    $status = parent::save($form, $form_state);
    $label = array(
      '%label' => $entity->label()
    );

    if ($status == SAVED_NEW) {
      drupal_set_message($this->t('Created the %label Droppy configuration.', $label));
    }
    elseif ($status == SAVED_UPDATED) {
      drupal_set_message($this->t('Saved the %label Droppy configuration.'), $label);
    }

    $form_state->setRedirect('entity.droppy.collection');

    return $status;
  }
}