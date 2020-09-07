<?php
namespace vendor\core;
class Router{

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url){
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach($matches as $k=>$v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route["action"])){
                    $route["action"] = "index";
                }

                $route['controller'] = self::toCamelCase($route['controller']); 
                $route['action'] = self::toLowCamelCase($route['action']); 
                self::$route = $route;
                // debug(self::$route);           
                return true;
            }
        }
        return false;
    }

    
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = "App\controllers\\".self::$route['controller']."Controller";      
            if(class_exists($controller)){
                $cObj = new $controller(self::$route); //pass into controller class params about name of controller and name of action method
                $action = self::toLowCamelCase(self::$route["action"]) ."Action";
                if(method_exists($cObj, $action)){
                    $cObj->$action();//call action method
                    $cObj->getView();//render view
                }else{
                    echo "the method {$action}() of controller {$controller} not found...";    
                }
            }else{
                echo "the {$controller} not found...";
            }
        }else{
            http_response_code(404);
            include "404.html";
        }

    }

    protected static function toCamelCase($name){
        return str_replace(" ", "", ucwords(str_replace("-", " ", $name)));
    }
    protected static function toLowCamelCase($name){
        return lcfirst(self::toCamelCase($name));
    }

    protected static function removeQueryString($url){
        //separate implicit get parameters from url
        //[0] param - controller/action, rest - xtra data (avliable in $_GET)
        //exp: post-new/wtf?page=2&some=here33
        if($url){
            $params = explode("&", $url, 2);
            if(false === strpos($params[0], "=")){
                debug($params);
                return rtrim($params[0], "/");
            }else{
                return "";
            }
        }
    }



}
?>