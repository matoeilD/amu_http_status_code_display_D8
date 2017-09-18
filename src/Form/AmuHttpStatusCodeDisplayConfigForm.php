<?php

namespace Drupal\amu_http_status_code_display\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class AmuHttpStatusCodeDisplayConfigForm extends ConfigFormBase {


  public function getFormId() {
    return 'AmuHttpStatusCodeDisplayConfigForm';
  }


  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('amustatuscode.settings');


    $form = parent::buildForm($form, $form_state);

    $form['404_message'] = array(
      '#type' => 'textarea',
      '#title' => t('404 error message'),
      '#description' => t('error 404 message.'),
      '#default_value' => '404 error',
    );

    $form['403_message'] = array(
      '#type' => 'textarea',
      '#title' => t('403 error message'),
      '#description' => t('error 403 message.'),
      '#default_value' => '403 error',
    );

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('amustatuscode.settings');
    $config->set('404_message', $form_state->getValue('404_message'));
    $config->set('403_message', $form_state->getValue('403_message'));
    $config->save();

    return parent::submitForm($form, $form_state);

  }

  public function getEditableConfigNames() {
    return ['amustatuscode.settings'];
  }

}