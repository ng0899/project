<?php


namespace app\controllers;


use app\models\News;
use system\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $news = new News();
        $arNews = $news->findAll();

        $this->setVars(['news' => $arNews]);
    }


}

