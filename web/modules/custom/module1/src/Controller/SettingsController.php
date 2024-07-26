<?php

namespace Drupal\module1\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Class for displaying name of current user.
 */

class SettingsController extends ControllerBase {

  /**
   *  Instance variable for storing current user.
   */
  protected $currentUser;

  /**
   * Constructor function for initializing $currentUser.
   *
   * @param AccountInterface $currentUser
   *   To display the name of the current user.
   */
  public function __construct(AccountInterface $currentUser) {
    $this->currentUser = $currentUser;
  }
  /**
   * Returns the content for MyModule settings page.
   *
   * @return array
   *   A render array containing the page content.
   */
  public function displayName() {
    if ($this->currentUser->hasPermission('custom permission')) {
      // Get specific user information.
      $name = $this->currentUser->getDisplayName();
      $uid = $this->currentUser->id();
      $build = [
        '#markup' => $this->t("<h3>Hey this is {$name} I have a user-id {$uid} </h3>"),
      ];
    }
    else {
      $build = [
        '#markup' => $this->t("<h3>Permission Denied</h3>"),
      ];
    }
    return $build;
  }
}
