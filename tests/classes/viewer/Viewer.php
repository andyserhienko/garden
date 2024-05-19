<?php
namespace tests\classes\viewer;

require_once('tests/classes/abstract/TestAbstract.php');
require_once('classes/viewer/Viewer.php');

use tests\classes\abstract\TestAbstract as TestAbstract;

class Viewer extends TestAbstract
{
	public static function run()
	{
		static::displayErrors();
		static::displayAsTextPlain();
		
		$errorMessage = '';

		try
		{
			print "\r\n\r\n === Начало тестирования класса \classes\\viewer\Viewer === \r\n\r\n";

			$isStaticMethod = true;

			$testData = [['hasfOfTree'=>[1,3,8]]];
			$expectedResponses = ['string'];
			static::test($testData,'\classes\viewer\Viewer','commonQuantityInfo',$isStaticMethod,1,$expectedResponses);

			$testData = [['hasfOfTree'=>[1,3,8]]];
			$expectedResponses = ['string'];
			static::test($testData,'\classes\viewer\Viewer','commonWeightInfo',$isStaticMethod,1,$expectedResponses);

			$testData = [['hasfOfTree'=>[1,3,8]]];
			$expectedResponses = ['string'];
			static::test($testData,'\classes\viewer\Viewer','hardestFruitAndTree',$isStaticMethod,1,$expectedResponses);
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