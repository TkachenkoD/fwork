<?php
namespace vendor\core\base;

class View{

    /**
     * current route and params (controller, action, params)
     * @var array
     */

    public $route = [];

    /**
     * curret view
     * taken from route->action, if not defined some other by user
     * @var string
     */
    public $view;

    /**
     * curret layout
     * 
     * set by default if it is not set by user
     * @var string
     */
    public $layout;


    public function __construct($route, $layout = "", $view = ""){

        $this->route = $route;

        if($layout === false){
            $this->layout = false;//if layout should not be rendered (exp: ajax requests)
        }else{
            $this->layout = $layout ?: LAYOUT; //const LAYOUT is in index.php (define default layout)
        }
       
        $this->view = $view;
    }

    public function render($vars){

        // vars - is array, with passed data to be used in the view
        if(is_array($vars)) extract($vars);


        $file_view = APP."/views/{$this->route['controller']}/{$this->view}.php";
        
        ob_start();
        //buffering view
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "<p>view for {$file_view} is not set...</p>";
        }

        $content = ob_get_clean();

        if(false !== $this->layout){
            //include template (layout) -> inside it might be $content(view)
            $file_layout = APP . "/views/layouts/{$this->layout}.php";

            if(is_file($file_layout)){
                require $file_layout;
            }else{
                echo "<p>layout {$file_layout} is not set....</p>";
            }
        }
    }
}

?>