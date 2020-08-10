<?php
namespace App\controllers;
class Posts{

    public $testVar;
    public function __construct(){
        $this->testVar = "the Posts constructor here";
    }

    public function indexAction(){
        echo $this->testVar." runs from index";
    }

    public function testPageAction(){
        echo $this->testVar." fires from testPage";
    }

    public function just(){
        echo $this->testVar." fires from just";
    }
    
}
?>