<?php namespace Cravat;
class Autoload{
    public $loaded = array();
    function __construct(){
        spl_autoload_extensions(".php");
        $loaders = array_diff(get_class_methods($this),array("__construct","loader"));
        foreach($loaders as $loader){
            spl_autoload_register(array($this,$loader));
        }
    }
    private function loader($className,$path = null){
        $className = explode('\\', $className);
        $file = array_pop($className).'.php';
        if(!is_null($path)){$path=implode(DS,$path);$path .= DS;}
        if(file_exists($path.$file)){include($path.$file);array_push($this->loaded, $path.$file);}   
    }
    public function cravat_loader($className){
        $this->loader($className,array('cravat'));
    }
    public function config_loader($className){
        $this->loader($className,array('app','config'));
    }
    public function controller_loader($className){
        $this->loader($className,array('app','controllers'));
    }
    public function entity_loader($className){
        $this->loader($className,array('app','entities'));
    }
    public function model_loader($className){
        $this->loader($className,array('app','models'));
    }
    public function view_loader($className){
        $this->loader($className,array('app','views'));
    }
    public function error($className){
        error::log_cravat('Class '.$className.' could not be loaded');
    }
}
return new \Cravat\Autoload();