<?php namespace Cravat;
class Format {
    protected $functions = array();
    public function __call($name,$arguments){
        array_push($this->functions,array('function'=>$name,'parameters'=>$arguments));
        return $this;
    }
    static public function make(){
        return new static;
    }
    public function format($toFormat){
        foreach($this->functions as $test){
            $function_name = '_'.$test['function'];
            $toFormat = $this->$function_name($toFormat,$test['parameters']);
        }
        return $toFormat;   
    }
    public function _brackets($string){
        return '('.$string.')';
    }
    public function _braces($string){
        return '{'.$string.'}';
    }
    public function _start_tag($string){
        return '<'.$string.'>';
    }
    public function _end_tag($string){
        return '</'.$string.'>';
    }
    public function _tag($string,$parameters){
        return '<'.$parameters[0].'>'.$string.'</'.$parameters[0].'>';
    }
    public function _enclose($string,$parameters){
        (count($parameters)<2)?$final=$parameters[0]:$final=$parameters[1];
        return $parameters[0].$string.$final;
    }
    public function _comment_line($string){
        return '//'.$string;
    }
    public function _comment($string){
        return '/*'.$string.'*/';
    }
    public function _html_comment($string){
        return '<!--'.$string.'-->';
    }
    public function _eval_space($string){
        return str_replace('_',' ',$string);
    }
}