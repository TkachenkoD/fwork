<?php
namespace App\controllers;
class PostNewController extends \vendor\core\base\Controller{

    public function wtfAction(){
        echo "hi from Post New wtf !!! below is debug fuction call";
        // $this->route["newhere"] = "som xtra";

        // debug($this->route);
    }
    
    public function indexAction(){
        // debug($this->route);
        echo "hi from Post New Index";
    }
    
}
?>