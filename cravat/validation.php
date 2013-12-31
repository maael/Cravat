<?php namespace Cravat;
class Validation{
    static public function email($input){
        $output = false;
        if(version_compare(PHP_VERSION, '5.2.0') >= 0){
            $output = filter_var($input, FILTER_VALIDATE_EMAIL);
        } else {
            $pattern = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";
            $output = preg_match($pattern, $input);
        }
        return $output;
    }
    static public function alphanumeric($input){
        return ctype_alnum($input);
    }
    static public function numeric($input){
        return is_numeric($input);
    }   
    static public function alphabetic($input){
        return ctype_alpha($input);
    }
    static public function choice($choices,$choice){
        return in_array($choice, $choices);
    }
}