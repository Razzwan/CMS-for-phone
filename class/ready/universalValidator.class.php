<?php
    class universalValidator
    {
            public static function universalValidatorOfArray(Array $data, Array $compareArray){
               
               if(count($data)!=count($compareArray))
                    return false;
                
                foreach($data as $key=>$value)
                    if(!isset($compareArray[$key]))
                        return false;
                    else
                        if(!$compareArray[$key]($value))
                            return false;
                return true;
            }
    }