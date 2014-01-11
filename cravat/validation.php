<?php namespace Cravat;
class Validation {
    protected $functions = array();
    public function __call($name,$arguments){
        array_push($this->functions,array('function'=>$name,'parameters'=>$arguments));
        return $this;
    }
    static public function make(){
        return new static;
    }
    public function validate($toValidate){
        foreach($this->functions as $test){
            $function_name = '_'.$test['function'];
            if(!$this->$function_name($toValidate,$test['parameters'])){return false;};
        }
        return true;
    }
    public function _between($test, $parameters){
        return ($test > $parameters[0])&&($test < $parameters[1]);
    }
    public function _less_than($test, $parameters){
        return ($test < $parameters[0]);
    }
    public function _greater_than($test, $parameters){
        return ($test > $parameters[0]);
    }
    public function _alphanum($test){
        return ctype_alnum($test);
    }
    public function _num($test){
        return is_numeric($test);
    }   
    public function _alpha($test){
        return ctype_alpha($test);
    }
    public function _bool($test){
        return in_array($test,array('true','false',0,1,'True','False'));
    }
    public function _choice($test, $parameters){
        return in_array($test, $parameters);
    }
    public function _noWhiteSpace($test){
        return !self::has($test,array(' ')) || ctype_space($test);
    }
    public function _has($test, $parameters){
        return ((strpos($test,$parameters[0])===false)?false:true);
    }
    public function _email($test){
        $output = false;
        if(version_compare(PHP_VERSION, '5.2.0') >= 0){
            $output = filter_var($test, FILTER_VALIDATE_EMAIL);
        } else {
            $pattern = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";
            $output = preg_match($pattern, $test);
        }
        return $output;        
    }
}