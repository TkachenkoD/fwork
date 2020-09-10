<?php
namespace App\controllers;

// use \vendor\core\base\Controller;
// for testing - main model used
use App\models\Main;

class PostsController extends AppController{

    public $testVar = "some here for testing from Posts controller";

    public function indexAction(){
        echo $this->testVar." <--runs from index";
    }

    public function testPageAction(){

        debug($this->route);
        echo $this->testVar." <-- fires from testPage";
    }
    
    public function showAction(){

        $model = new Main;
        debug($this->route);
        $post = \R::load('posts', $this->route['post_item']);
        // $posts = \R::findAll('posts');
        echo $this->testVar." <-- fires from showAction";
        // $p = $post['content'];
        $this->setVars(compact("post"));
    }

    public function just(){
        echo $this->testVar." fires from just";
    }
    
}
?>