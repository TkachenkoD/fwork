<?php 
use \vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define("WWW", __DIR__);
define("CORE", dirname(__DIR__)."/vendor/core");
define("ROOT", dirname(__DIR__));
define("APP", dirname(__DIR__)."/App");
define("LIBS", dirname(__DIR__).'/vendor/libs');
define("LAYOUT", "default");

//test commit
// require "../vendor/core/Router.php";
require "../vendor/libs/functions.php";

//autoload
spl_autoload_register(function($class){
    // echo $class;die;
    $file = ROOT . "/".str_replace("\\", "/", $class).".php";
    // $file = APP . "/controllers/{$class}.php";
    if(is_file($file)){
        require_once $file;
    }

});

// custom rules for paths
Router::add('^page\b/?(?<alias>[a-z-]+)?$', ["controller" => "Page", "action" => "view"]); //nb for order of rules "pages contains page"
Router::add('^posts\b/?(?<post_item>[0-9]+)?$', ["controller" => "Posts", "action" => "show"]); //nb for order of rules "pages contains page"
Router::add('^pages/?(?<action>[a-z-]+)?$', ["controller" => "Posts"]); // NB for controller (it's Posts, but in URl - pages) 

// default rules for paths
Router::add('^$', ["controller" => "Main", "action" => "index"]);
Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');

Router::dispatch($query);

?>