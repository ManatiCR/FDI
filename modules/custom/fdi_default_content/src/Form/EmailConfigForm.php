<?php

/**
 * @file
 * Defines a config form.
 */

namespace Drupal\fdi_default_content\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EmailConfigForm.
 */
class EmailConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'fdi_default_content.emailconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'email_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('fdi_default_content.emailconfig');
    $form['message_subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Asunto del correo'),
      '#default_value' => $config->get('message_subject'),
    ];
    $form['message_intro'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Intro del mensaje del correo'),
      '#default_value' => $config->get('message_intro'),
    ];
    $form['email'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Direcciones de correo'),
      '#default_value' => $config->get('email'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $emails = explode(PHP_EOL, $form_state->getValue('email'));
    foreach ($emails as $email) {
      $email = preg_replace('/\s+/', '', $email);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_state->setErrorByName('email', $this->t('Esta dirección de correo es invalida: ' . $email));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('fdi_default_content.emailconfig')
      ->set('email', $form_state->getValue('email'))
      ->set('message_subject', $form_state->getValue('message_subject'))
      ->set('message_intro', $form_state->getValue('message_intro'))
      ->save();
  }

}
