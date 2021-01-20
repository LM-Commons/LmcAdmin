<?php
/**
 * Copyright (c) 2012 Jurian Sluiman.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     LmcAdmin
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2012 Jurian Sluiman.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        https://github.com/LM-Commons
 */

namespace LmcAdmin;

use Laminas\Loader;
use Laminas\EventManager\EventInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\Router\RouteMatch as V3RouteMatch;
use Laminas\ServiceManager\Factory\InvokableFactory;

/**
 * Module class for LmcAdmin
 *
 * @package LmcAdmin
 */
class Module
{

    /**
     * @{inheritdoc}
     */
    public function getConfig()
    {
        $provider = new ConfigProvider();

        return [
            'service_manager' => $provider->getDependencyConfig(),
            'view_manager' => $provider->getViewManagerConfig(),
            'lmcadmin' => $provider->getModuleConfig(),
            'controllers' => [
                'factories' => [
                    Controller\AdminController::class => InvokableFactory::class,
                ],
            ],
            'navigation' => [
                'admin' => [],
            ],
            'router' => [
                'routes' => [
                    'lmcadmin' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/admin',
                            'defaults' => [
                                'controller' => Controller\AdminController::class,
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * @{inheritdoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var \Laminas\Mvc\Application $app */
        $app = $e->getParam('application');
        $em  = $app->getEventManager();

        $em->attach(MvcEvent::EVENT_DISPATCH, [$this, 'selectLayoutBasedOnRoute']);
    }

    /**
     * Select the admin layout based on route name
     *
     * @param  MvcEvent $e
     * @return void
     */
    public function selectLayoutBasedOnRoute(MvcEvent $e)
    {
        /** @var \Laminas\Mvc\Application $app */
        $app    = $e->getParam('application');
        $sm     = $app->getServiceManager();
        $config = $sm->get('config');

        if (false === $config['lmcadmin']['use_admin_layout']) {
            return;
        }

        $match      = $e->getRouteMatch();
        $controller = $e->getTarget();
        if (!($match instanceof V3RouteMatch)
            || 0 !== strpos($match->getMatchedRouteName(), 'lmcadmin')
            || $controller->getEvent()->getResult()->terminate()
        ) {
            return;
        }

        $layout     = $config['lmcadmin']['admin_layout_template'];
        $controller->layout($layout);
    }
}
