<?php namespace Cravat;
use Rain\Tpl;
abstract class View{
    protected $scripts = array();
    protected $styles = array();
    protected $tpl = null;
    protected $template;
    function __construct(){
        $config = array(
        "tpl_dir"       => "app/views/templates/",
        "cache_dir"     => "vendor/rain/raintpl/cache/"
        );
        Tpl::configure( $config );
        $this->tpl = new Tpl;
        $this->add('style','css/main');
    }
    function __destruct(){
        if(is_null($this->template)){
            error::log_cravat('No template set for '.Router::$controller);
        } else {
            Cravat::$template = $this->template;
            try{
                $this->tpl->draw($this->template);
            } catch(Tpl\NotFoundException $e){
                error::log_cravat($e->getMessage());
            }              
        }
    }
    protected function add($type,$object,$absolute = false){
        if($type=='css'){$type='styles';}
        else if($type=='js'){$type='scripts';}
        if(!$absolute){
            $object = APP_BASE.'/public/'.$object.$extension;
        }
        array_push($this->$type,$object);
        array_push(Cravat::$$type, $object);
        $this->tpl->assign($type,$this->$type); 
    }
    abstract public function render();
}
