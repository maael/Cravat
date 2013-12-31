<?php namespace Cravat;
class Debug{
    static private $logged = '';
    static private function is_assoc($var)
    {
        return is_array($var) && array_diff_key($var,array_keys(array_keys($var)));
    }
    static public function log($data,$type='') {
        $style = array();
        if($type=='header'){array_push($style,"border-bottom:1px solid black;font-weight:bold");}
        if($type=='controller'){array_push($style,"color:blue;font-size:0.85em;line-height:1em;");}
        if($type=='entity'){array_push($style,"color:darkblue;font-size:0.85em;line-height:1em;");}
        if($type=='model'){array_push($style,"color:CornflowerBlue;font-size:0.85em;line-height:1em;");}
        if($type=='view'){array_push($style,"color:CadetBlue;font-size:0.85em;line-height:1em;");}
        if($type=='cravat'){array_push($style,"color:purple;font-size:0.85em;line-height:1em;");}
        if($type=='controller'|$type=='entity'|$type=='model'|$type=='view'|$type=='cravat')
            {array_push($style,"color:black;");}
        if(self::is_assoc($data)){
            $tempData = '';
            foreach ($data as $key => $value) {
                $tempData .= $key.'=>'.$value.', ';
            }
            $data = substr($tempData, 0, -2);;
        }
        if(is_array($data)){$data = implode(', ', $data);}
        if($type=='header'||$type='file'){$data = '%c'.$data;}
        self::$logged .= "console.log('Cravat: ".addslashes($data)."','".implode("','", $style)."');";
    }
    static public function output(){
        $time = microtime(true) - Cravat::$startTime;
        self::log('Misc Data','header');
        self::log('Execution Time | '.$time);
        self::log('Controller | '.Router::$controller);
        self::log('Action | '.Router::$action);
        print_r(Cravat::$entityManager->getUnitOfWork()->computeChangeSets());
        self::log('Autoloaded - '.count(Cravat::$autoloader->loaded).' Files loaded','header');
        foreach (Cravat::$autoloader->loaded as $loaded) {
            $type = '';
            $parts = explode(DS, $loaded);
            if(in_array('controllers',$parts)){
                $type = 'controller';
            } elseif(in_array('entities',$parts)) {
                $type = 'entity';
            } elseif(in_array('models',$parts)) {
                $type = 'model';
            }  elseif(in_array('views',$parts)) {
                $type = 'view';
            } elseif(in_array('cravat',$parts)) {
                $type = 'cravat';
            }
            self::log('('.$type.')%c '.$loaded,$type);
        }
        echo '<script>'.self::$logged.'</script>';
    }
}
