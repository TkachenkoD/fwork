<?php
namespace vendor\core\base;

abstract class Controller{

    public $route = [];
    public $view;
    public $layout;

    /**
     * array for variables, using in views
     */
    public $vars = [];

    public function __construct($route){
        $this->route = $route;
        $this->view = $this->route['action'];

        // include APP."/views/{$this->route['controller']}/{$this->route['action']}.php";
    }

    public function getView(){
        debug($this->route);
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->vars);
    }

    //set variables - passed data to be used in the view
    public function setVars($vars){

        $this->vars = $vars; 
    }

}

?>