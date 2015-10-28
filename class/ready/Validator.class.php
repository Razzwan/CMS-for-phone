<?php
class Validator{
		
		private $validationArray; 
		private static $errorArray=[
			'arrayCounterMissmatched' => 'Не верное число входящих данных в массиве!',
			'name' => 'Вы не ввели имя, или ввели его не корректно! Имя не может содержать меньше 2-х символов!'
		];
	   
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
		
		private static function validationResult($booleanResult, $error){
			return [$booleanResult, $error];
		}
		
		public function arrayValidator($data, $compareArrayType = null){

			if(count($data)!= count($this->validationArray[$compareArrayType]))
				return self::validationResult(false, self::$errorArray['arrayCounterMissmatched']);
				
			foreach($data as $key => $value)
				if(
					!isset($this->validationArray[$compareArrayType]) || 
					!($result=$this->validationArray[$compareArrayType][$key]($value))[0]
				)
					return $result;
						
				return self::validationResult(true,'Валидация типа "'.$compareArrayType.'" выполнена успешно');
		}
			
		public static function validateName($data){
			return self::validationResult(is_string($data), self::$errorArray[$data]);
		}
		
		public static function validatePhone($data){
			return self::validationResult((is_string($data) and preg_match('#^\+[0-9]{2}\([0-9]{3}\)[0-9]{7}$#',$data)), self::$errorArray[$data]);
		}
	}