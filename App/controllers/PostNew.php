<?php
namespace App\controllers;
class PostNew extends \vendor\core\base\Controller{
    public function wtfAction(){
        echo "hi from Post New wtf !!!";
        debug($this->route);
    }
    
    public function indexAction(){
        debug($this->route);
        echo "hi from Post New Index";
    }
    
}
?>