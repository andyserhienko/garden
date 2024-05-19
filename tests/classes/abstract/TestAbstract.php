<?php
namespace tests\classes\abstract;

class TestAbstract
{
	public static function displayErrors()
	{
		ini_set('display_errors',1);
		error_reporting(E_ALL);		
	}

	public static function displayAsTextPlain()
	{
		header('Content-Type: text/plain;');
	}

	public static function buildMessage($message,$file,$line)
	{
		$out = 'Сообщение об ошибке: ' . $message . "\r\n\r\n";
		$out.= 'Файл: ' . $file . "\r\n\r\n";
		$out.= 'Номер строки: ' . $line . "\r\n\r\n";
		return $out;
	}

	public static function succesMessage($className,$methodName,$typeName){
		return "\r\n Успешно! Класс: $className; Метод: $methodName; Тип ответа совпал с ожидаемым: $typeName \r\n";
	}

	public static function failMessage($className,$methodName,$typeName){
		return "\r\n Несоответсвие! Класс: $className; Метод: $methodName; Тип ответа не совпал с ожидаемым: $typeName \r\n";
	}

	public static function test($args = [],$className,$methodName,$isStaticMethod,$combinations = 1,$expectedResponses,$isReject = false,$argLevels = null,$accidentCount = 999)
	{
		if(!$accidentCount){
			print '--------- Аварийный выход ---------';
			exit;
		}
		$accidentCount--;

		if(!$argLevels)
		{
			$i = 0;
			$argLevels = [];

			while($i < $combinations)
			{
				$argLevels[] = count($args) - 1;
				$i++;
			}

		}


		$lastLevel = count($argLevels) - 1;

		$argLevels[$lastLevel]--;

		if(!$isReject)
		{
			if($argLevels[$lastLevel] - 1 < 0)
			{
				$argLevels[$lastLevel] = 0;
				$isReject = true;
			}

			$d = $lastLevel;
			$str = '';
			$argsParams = [];

			while($d >= 0)
			{				
				$str.= ' ' . gettype($args[$argLevels[$d]]) . ' ';
				$argsParams[] = $args[$argLevels[$d]];
				$d--;
			}

			$metodPointer = '->';
			if($isStaticMethod){
				$metodPointer = '::';
			}

			$response = '';
			$XObjStrArgs = '';
			$XObjStrBody = '()';
			if(strripos($className, '(') !== false){
				$XObjStrBody = '';
			}

			$XObjStr = '$XObj = new '. $className . $XObjStrBody . ';$response = $XObj' . $metodPointer . $methodName . '(';

			if($methodName == ''){
				$XObjStr = '$XObj = new '.$className.'(';
			}

			foreach ($argsParams as $key => $value) {
				$XObjStrArgs .= '$argsParams['.$key.'],';
			}

			if($XObjStrArgs){
				$XObjStrArgs = substr($XObjStrArgs, 0, -1);
			}

			$XObjStr .= $XObjStrArgs . ');';

			eval($XObjStr);

			$responseType = gettype($response);

			if(is_array($expectedResponses)){
				if(in_array($responseType, $expectedResponses)){
					print static::succesMessage($className,$methodName,$responseType);
				}else{
					print static::failMessage($className,$methodName,$responseType);
				}
			}else{
				if($responseType == $expectedResponses){
					print static::succesMessage($className,$methodName,$responseType);
				}else{
					print static::failMessage($className,$methodName,$responseType);
				}
			}
					
			static::test($args,$className,$methodName,$isStaticMethod,$combinations,$expectedResponses,$isReject,$argLevels,$accidentCount);
		
		}else{

			$d = $lastLevel;
			$isContinueOnNextIteration = false;
			$isCompleted = false;

			while(! ($d < 0) )
			{
				if($lastLevel != $d)
				{
					$argLevels[$d]--;
					$isContinueOnNextIteration = true;
				}

				if($argLevels[$d] < 0){
					$argLevels[$d] = count($args) - 1;
					$isContinueOnNextIteration = false;
				}

				if(!$d && !$isContinueOnNextIteration){
					$isCompleted = true;
				}

				if($isContinueOnNextIteration){
					break;
				}

				$d--;
			}
 
			if(!$isCompleted){
				static::test($args,$className,$methodName,$isStaticMethod,$combinations,$expectedResponses,$isReject,$argLevels,$accidentCount);
			}
		}
	}

	public static function allTypesData(){
		return [
			'',
			null,
			new \stdClass(),
			true,
			false,
			6E-8,
			[],
			9,
			'A',
			function(){},
		];		
	}
}
