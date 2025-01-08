<?php

declare(strict_types=1);

namespace LmcTest\Admin\Assets;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class TestController extends AbstractActionController
{
    public function indexAction(): ViewModel
    {
        $view = new ViewModel();
        $view->setTemplate('home/index');
        return $view;
    }

    public function terminateAction(): ViewModel
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        $view->setTemplate('home/index');
        return $view;
    }
}
