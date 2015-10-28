<?php
class Validator{
		
		private $validationArray; 
		public static $errorArray=[];
	   
		public function __construct(){

			$this->createValidationArray();
  
		}
		
		private function createValidationArray(){
			$this->validationArray = [
									'register' => [
													'name' => [$this, 'validateName'],
													'fio' => [$this, 'validateName'],
													'phone' => [$this, 'validatePhone']
									]
								];
		}
		
		public function arrayValidator($data, $compareArrayType = null){

			if(count($data)!= count($this->validationArray[$compareArrayType]))
				return false;
				
			foreach($data as $key => $value)
				if(
					!isset($this->validationArray[$compareArrayType]) || 
					!$this->validationArray[$compareArrayType][$key]($value)
				)
					return false;
						
				return true;
		}
			
		public static function validateName($data){
			return is_string($data);
		}
		
		public static function validatePhone($data){
			return is_string($data) and preg_match('#^\+[0-9]{2}\([0-9]{3}\)[0-9]{7}$#',$data);
		}
	}