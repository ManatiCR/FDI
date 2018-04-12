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
    $form['information'] = array(
      '#type' => 'vertical_tabs',
      '#default_tab' => 'contacto',
    );

    $form['contacto'] = array(
      '#type' => 'details',
      '#title' => $this
        ->t('Formulario De Contacto'),
      '#group' => 'information',
    );
    $form['contacto']['contacto_message_subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Asunto del correo'),
      '#default_value' => $config->get('contacto_message_subject'),
    ];
    $form['contacto']['contacto_message_intro'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Intro del mensaje del correo'),
      '#default_value' => $config->get('contacto_message_intro'),
    ];
    $form['contacto']['contacto_emails'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Direcciones de correo'),
      '#default_value' => $config->get('contacto_emails'),
    ];

    $form['reporte'] = array(
      '#type' => 'details',
      '#title' => $this
        ->t('Reportes'),
      '#group' => 'information',
    );
    $form['reporte']['reporte_message_subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Asunto del correo'),
      '#default_value' => $config->get('reporte_message_subject'),
    ];
    $form['reporte']['reporte_message_intro'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Intro del mensaje del correo'),
      '#default_value' => $config->get('reporte_message_intro'),
    ];
    $form['reporte']['reporte_emails'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Direcciones de correo'),
      '#default_value' => $config->get('reporte_emails'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $field_mails = [
      'contacto_emails',
      'reporte_emails',
    ];
    foreach ($field_mails as $field) {
      $emails = explode(PHP_EOL, $form_state->getValue($field));
      foreach ($emails as $email) {
        $email = preg_replace('/\s+/', '', $email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $form_state->setErrorByName($field, $this->t('Esta dirección de correo es invalida: ' . $email));
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('fdi_default_content.emailconfig')
      ->set('contacto_message_subject', $form_state->getValue('contacto_message_subject'))
      ->set('contacto_message_intro', $form_state->getValue('contacto_message_intro'))
      ->set('contacto_emails', $form_state->getValue('contacto_emails'))
      ->set('reporte_message_subject', $form_state->getValue('reporte_message_subject'))
      ->set('reporte_message_intro', $form_state->getValue('reporte_message_intro'))
      ->set('reporte_emails', $form_state->getValue('reporte_emails'))
      ->save();
  }

}
