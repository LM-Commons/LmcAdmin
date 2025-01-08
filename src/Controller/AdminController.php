<?php

declare(strict_types=1);

namespace Lmc\Admin\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

/**
 * Placeholder controller
 *
 * This controller is just here in case you have not defined a controller
 * behind the 'admin' route yourself. If you haven't, you would otherwise
 * get a 404: Page not found error.
 *
 * If you want to override this controller (and action), create a module and
 * put this in the module configuration:
 *
 * <code>
 * <?php
 * return array(
 *     'router' => array(
 *         'routes' => array(
 *             'lmcadmin' => array(
 *                 'options' => array(
 *                     'defaults' => array(
 *                         'controller' => 'MyFoo\Controller\OtherController',
 *                         'action'     => 'custom',
 *                     ),
 *                 ),
 *             ),
 *         ),
 *     ),
 * );
 * </code>
 */
class AdminController extends AbstractActionController
{
    public function indexAction(): ViewModel
    {
        $view = new ViewModel();
        $view->setTemplate('lmc-admin/admin/index');
        return $view;
    }
}
