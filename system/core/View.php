<?php


namespace system\core;


class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = "", $view = "")
    {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    public function render($vars)
    {
        extract($vars);
        // /app/views/Main/index.php
        ob_start();
        $path_view = ROOT . '/app/views/' . $this->route['controller'] . '/' . $this->view . '.php';
        if(file_exists($path_view)){
            require $path_view;
        }else{
            echo 'представление ' .$path_view. ' не найдено';
        }

        $content = ob_get_clean();

        // /app/views/layouts/default.php
        $path_layout = ROOT . '/app/views/layouts/' . $this->layout . '.php';
        if(is_file($path_layout)){
            require $path_layout;
        }else{
            echo 'шаблон ' . $this->layout . ' не найден';
        }

    }
}