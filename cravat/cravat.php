<?php namespace Cravat;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
class Cravat{
    public static $autoloader = null;
    public static $entityManager = null;
    public static $database = array();
    public static $devMode = false;
    public static $routes = array();
    public static $startTime = null;
    public static function initialize(){
        $startTime = microtime(true);
        define('BASE',dirname(dirname(__FILE__)));
        define('DS',DIRECTORY_SEPARATOR);
        self::$autoloader = require('autoload.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'database.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'routes.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'general.php');
        require(BASE.DS.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
        if(array_key_exists('timezone', $config)){
            date_default_timezone_set($config['timezone']);
        }
        if(array_key_exists('domain', $config)){
            define('DOMAIN',$config['domain']);
        } else {
            define('DOMAIN','localhost');
        }
        if(array_key_exists('devMode', $config)){
            self::$devMode = $config['devMode'];
        }
        self::$database = $database;
        self::$routes = $routes;
        self::initialize_entity_manager();
    }
    public static function get_cli(){
        return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(self::$entityManager);
    }
    private static function initialize_entity_manager(){
        $isDevMode = true;
        $config = Setup::createYAMLMetadataConfiguration(array(BASE.DS."app".DS."config".DS."yaml"), $isDevMode);
        $conn = array();
        if(self::$database['driver']=="sqlite"){
            $conn['driver'] = 'pdo_sqlite';
            $conn['path'] = self::$database['path'];
        } elseif(self::$database['driver']=="mysql"){
            $conn['driver'] = 'pdo_mysql';
            $conn['user'] = self::$database['user'];
            $conn['password'] = self::$database['password'];
            $conn['dbname'] = self::$database['dbname'];
        }
        self::$entityManager = EntityManager::create($conn, $config);
    }
}