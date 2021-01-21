<?php


namespace app\controllers;


use system\core\Controller;

class MainController extends Controller
{


    public function indexAction()
    {
        pr($this->route);
        echo 'Main::index';
    }

    public function testAction()
    {
        echo 'Main::test';
    }


    public function check()
    {

    }

}

