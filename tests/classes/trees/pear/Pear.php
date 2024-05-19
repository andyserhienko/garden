<?php
namespace tests\classes\trees\pear;

require_once('tests/classes/abstract/TestAbstract.php');
require_once('classes/trees/pear/Pear.php');
require_once('classes/fruits/pear/Pear.php');

use tests\classes\abstract\TestAbstract as TestAbstract;
use classes\fruits\pear\Pear as FruitPear;

class Pear extends TestAbstract
{
	public static function run()
	{
		static::displayErrors();
		static::displayAsTextPlain();
		
		$errorMessage = '';

		try
		{
			print "\r\n\r\n === Начало тестирования класса \classes\\trees\pear\Pear === \r\n\r\n";
			
			$isStaticMethod = false;
			$testData = [new FruitPear()];
			$expectedResponses = ['string'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\pear\Pear','',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\pear\Pear(new classes\fruits\pear\Pear())','growFruits',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['integer'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\trees\pear\Pear(new classes\fruits\pear\Pear())','quantityFruits',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);				
		
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