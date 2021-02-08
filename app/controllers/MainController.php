<?php


namespace app\controllers;


use app\models\News;

class MainController extends AppController
{

    public function indexAction()
    {
        $news = new News();
        $arNews = $news->findAll();

        $this->setVars(['news' => $arNews]);
    }

}

