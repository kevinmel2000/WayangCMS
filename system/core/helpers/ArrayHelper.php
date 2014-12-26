<?php

namespace system\core\helpers;

class ArrayHelper
{
	public static function flatten($array, $return = array()){
        foreach($array as $key => $value){
            if(is_array($value) || is_object($value)){
                $return  = self::flatten($value, $return);
            }else{
                $return[] = $value;
            }
        }
        return $return;
    }
}
