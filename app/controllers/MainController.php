<?php


namespace app\controllers;


use app\models\News;
use system\libs\Pagination;

class MainController extends AppController
{

    public function indexAction()
    {
        $news = new News();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 1;
        $total = $news->count();

        $pagination = new Pagination($page, $perPage, $total);


        $start = $pagination->getStart();

        $arNews = $news->findLimit($start, $perPage);


        $this->setVars(['news' => $arNews, 'pagination' => $pagination]);
    }

}

