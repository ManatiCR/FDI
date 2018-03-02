<?php

/**
 * @file
 * Defines fdi controller.
 */

namespace Drupal\fdi_default_content\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Creates fdi admin page Controller.
 */
class FdiAdminPage extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function fdiAdminPageTheme() {
    return [
      '#theme' => 'fdi_admin_page',
    ];
  }

}
