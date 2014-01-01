<?php namespace Cravat;
class error{
    static private function log($type,$message){
        $file = preg_replace(addslashes('/^'.BASE.'/'), '', debug_backtrace()[1]['file']);
        if(preg_match('/autoload.php$/', $file)){
            $file = preg_replace(addslashes('/^'.BASE.'/'), '', get_class(debug_backtrace()[4]['object']));
        }
        $message = "MESSAGE ".$message;
        $message .= ' | FILE '.$file.' | REQUEST '.$_SERVER['REQUEST_URI'].' | FROM '.$_SERVER['REMOTE_ADDR'].'@'.date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']).PHP_EOL;
        file_put_contents(BASE.DS.'logs'.DS.$type.'.log', $message, FILE_APPEND | LOCK_EX);
        header('Location: http://'.DOMAIN.APP_BASE.'/');
        die();
    }
    static public function log_cravat($message){
        self::log('cravat',$message);
    }
    static public function log_database(){
        self::log('database',$message);
    }
    static public function log_route($message){
        self::log('route',$message);
    }      
}