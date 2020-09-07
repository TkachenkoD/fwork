<?php
namespace App\controllers;

use \vendor\core\base\Controller;

class PostsController extends Controller{

    public $testVar = "some here for testing from Posts controller";

    public function indexAction(){
        echo $this->testVar." <--runs from index";
    }

    public function testPageAction(){

        debug($this->route);
        echo $this->testVar." <-- fires from testPage";
    }

    public function just(){
        echo $this->testVar." fires from just";
    }
    
}
?>