<?php
namespace App\controllers;
// use \vendor\core\base\Controller;

class PageController extends AppController{
    public function viewAction(){
        echo "this is in page Right Here and debug below";
        debug($this->route);
    }
}


?>