<?php


namespace app\controllers;


use app\models\News;
use system\core\Controller;

class MainController extends Controller
{

    public $layout = 'main';

    public function indexAction()
    {
        $news = new News();

        $arNews =  $news->findOne("Текст новости 1", 'text');
        pr($arNews);
        $this->view = 'test';
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

