<?php


namespace app\controllers;


use system\core\Controller;

class MainController extends Controller
{


    public $layout = 'main';

    public function indexAction()
    {
        //echo 'Main::index';
        $arr = [
            'n1' => 1,
            'n2' => 2
        ];
        $this->setVars(['name' => 'vasya', 'arArray' => $arr]);
    }

    public function testAction()
    {
        //echo 'Main::test';
    }


    public function check()
    {

    }

}

