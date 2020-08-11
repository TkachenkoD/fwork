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
                self::$route = $route;
                // debug(self::$route);           
                return true;
            }
        }
        return false;
    }

    
    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = "App\controllers\\".self::$route['controller'];
            debug(self::$route);  
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::toLowCamelCase(self::$route["action"]) ."Action";
                if(method_exists($cObj, $action)){
                    $cObj->$action();
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



}
?>