<?php
namespace tests\classes\fruits\apple;

require_once('tests/classes/abstract/TestAbstract.php');
require_once('classes/trees/apple/Apple.php');
require_once('classes/fruits/apple/Apple.php');

use tests\classes\abstract\TestAbstract as TestAbstract;
use classes\fruits\apple\Apple as FruitApple;

class Apple extends TestAbstract
{
	public static function run()
	{
		static::displayErrors();
		static::displayAsTextPlain();
		
		$errorMessage = '';

		try
		{
			print "\r\n\r\n === Начало тестирования класса \classes\\fruits\apple\Apple === \r\n\r\n";
			
			$isStaticMethod = false;
			$testData = [new FruitApple()];
			$expectedResponses = ['integer'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\fruits\apple\Apple','initWeight',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);
		
		}
		catch(\Exception $e)
		{
		    $errorMessage = static::buildMessage($e->getMessage(),$e->getFile(),$e->getLine());
		}catch(\FatalErrorException $e){
		    $errorMessage = static::buildMessage($e->getMessage(),$e->getFile(),$e->getLine());
		}catch (\Throwable $e) {
		    $errorMessage = static::buildMessage($e->getMessage(),$e->getFile(),$e->getLine());
		}

		if (!empty($errorMessage)) {
		    print $errorMessage;
		    exit;
		}
	}

}