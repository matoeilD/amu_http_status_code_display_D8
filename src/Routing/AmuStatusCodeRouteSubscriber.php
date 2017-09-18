<?php
namespace Drupal\amu_http_status_code_display\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    print('entering?');
    if ($route = $collection->get('system.site_information_settings'))

      $route->setDefault('_form', 'Drupal\amu_http_status_code_display\Form\AmuHttpStatusCodeDisplayConfigForm');
  }

}