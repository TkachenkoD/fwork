<?php
namespace App\controllers;
// use \vendor\core\base\Controller;

class PageController extends AppController{

    public $layout = "page_pink";

    public function viewAction(){
        echo "this is in page Right Here and debug below";
        debug($this->route);
        extract($this->route);
        $this->view = $alias;
    }
}


?>