<?php namespace Cravat;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
class Cravat{
    public static $entityManager = null;
    public static $database = array();
    public static $routes = array();
    public static function initialize(){
        define('BASE',dirname(dirname(__FILE__)));
        define('DS',DIRECTORY_SEPARATOR);
        require('autoload.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'database.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'routes.php');
        require_once(BASE.DS.'app'.DS.'config'.DS.'general.php');
        require(BASE.DS.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
        date_default_timezone_set($config['timezone']);
        define('DOMAIN',$config['domain']);
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