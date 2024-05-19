<?php
namespace tests\classes\trees\apple;

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
			print "\r\n\r\n === Начало тестирования класса \classes\\trees\apple\Apple === \r\n\r\n";

			$isStaticMethod = false;
			$testData = [new FruitApple()];
			$expectedResponses = ['string'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\apple\Apple','',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\apple\Apple(new classes\fruits\apple\Apple())','growFruits',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['integer'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\apple\Apple(new classes\fruits\apple\Apple())','quantityFruits',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);				
		
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