<?php


namespace app\controllers;


use app\models\News;
use system\libs\Pagination;

class MainController extends AppController
{

    public function indexAction()
    {
        //$this->layout = false;
        $title = 'Home Page 123';
        //$this->view = '_index';


//        $news = new News();
//
//        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
//        $perPage = 3; //количество записей на странице
//        $total = $news->count();
//
//        $pagination = new Pagination($page, $perPage, $total);
//
//
//        $start = $pagination->getStart();
//
//        $arNews = $news->findLimit($start, $perPage);
//
//
//
        $this->setVars(['title' => $title]);
    }

}

