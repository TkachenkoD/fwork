<?php
namespace App\controllers;

use App\models\Main;

class MainController extends AppController{

    public $layout = "main";

    public function indexAction(){
        echo "hi from MAIN";

        $model = new Main;
        // $res = $model->query("CREATE TABLE posts SELECT * FROM mvc_site.news");

       $posts = \R::findAll('posts');
       $cat = \R::findAll('category_fw');
//for redbean php test
        // $posts = $model->findAll();
        // $post = $model->findOne(2);
        // $post = $model->findBySQL("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%Ferra%']);
        // $post = $model->findLike('Ferra', 'title');
//for redbean php test
        /**
         * might be defined on 'action level'
         * or all 'Class level' - set lauout/view into public class property
         * public $layout = "main";
         */


        // $this->layout = false; //in case layout (for ajax requests) should not be rendered

        // $this->layout = "main";
        // $this->view = "test";

        $movie = "Boardwalk Empire";
        $episode = "first Episode";
        $this->setVars(compact("movie", "episode", "posts", "cat"));

    }
    
}
?>