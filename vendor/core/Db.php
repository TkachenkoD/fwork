<?php
namespace vendor\core;

class Db{

    protected $pdo;
    protected static $instance;

    protected function __construct(){
        $db = require ROOT. '/config/config_db.php';

//PDO connection removed for RedBeanPHP test purpose
        // $options = [
        //     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        //     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        // ];

        // $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
//PDO connection removed for RedBeanPHP test purpose

            require LIBS.'/rb-mysql.php';
            \R::setup($db['dsn'], $db['user'], $db['pass']);
            \R::freeze(true);
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * simple request, without data from DB
     * return true/false
     */
    public function execute($sql, $params = []){
        //(*)
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }
}