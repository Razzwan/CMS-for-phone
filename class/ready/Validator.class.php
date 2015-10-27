<?php
    class Validator{
        private $validation; 
        public function __construct(){

            $this->createValidationArray();
  
        }
        
        public function validate($data, $validationArray){
            return $this::validatorOfArray($data, $this->validation[$validationArray]);
        }
        
        private function createValidationArray(){
            $this->validation = [
                                    'register' => [
                                                    'name' => [$this, 'validateName'],
                                                    'fio' => [$this, 'validateName'],
                                                    'phone' => [$this, 'validatePhone']
                                    ]
                                ];
        }
        
        public function validatorOfArray($data, Array $compareArray){

            if(count($data)!== count($compareArray))
                return false;
                
            foreach($data as $key => $value)
                if(!isset($compareArray[$key]) || !$compareArray[$key]($value))
                    return false;
                        
                return true;
        }
            
        public static function validateName($data){
            return is_string($data);
        }
        
         public static function validatePhone($data){
            return preg_match('#^\+[0-9]{2}\([0-9]{3}\)[0-9]{7}$#',$data);
        }
    }