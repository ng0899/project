<?php


namespace system\core;


abstract class Controller
{
    protected $route;
    protected $layout;
    protected $view;
    public $vars = [];


    public function __construct($route, $view = '')
    {
        $this->route = $route;
        $this->view = $view ?: $route['action']; // определяем текущий вид
    }

    /**
     *
     */
    public function getView()
    {
        $objView = new View($this->route, $this->layout, $this->view);
        $objView->render($this->vars);

    }

    public function setVars($vars)
    {
        $this->vars = $vars;
    }

    public function isAjax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
}