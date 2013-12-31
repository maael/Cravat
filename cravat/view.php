<?php namespace Cravat;
use Rain\Tpl;
abstract class View{
    protected $scripts = array();
    protected $styles = array();
    protected $template = null;
    function __construct(){
        $config = array(
        "tpl_dir"       => "app/views/templates/",
        "cache_dir"     => "vendor/rain/raintpl/cache/"
        );
        Tpl::configure( $config );
        $this->template = new Tpl;
        $this->add('style','main');
    }
    protected function add($type,$object){
        $type .='s';
        array_push($this->$type,$object);
        $this->template->assign($type,$this->$type); 
    }
    protected function draw($template){
        try{
            $this->template->draw($template);
        } catch(Tpl\NotFoundException $e){
            error::log_cravat($e->getMessage());
        }
    }
    abstract public function render();
}
