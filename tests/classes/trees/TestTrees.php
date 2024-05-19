<?php
namespace tests\classes\trees;

require_once('tests/classes/abstract/TestAbstract.php');
require_once('classes/viewer/Viewer.php');

use tests\classes\abstract\TestAbstract as TestAbstract;

class TestTrees extends TestAbstract
{
	public static function run()
	{
		static::displayErrors();
		static::displayAsTextPlain();
		
		$errorMessage = '';

		try
		{
			//$testData = $testData ? $testData : static::allTypesData();

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
		}finally{
		//    print "Тест не пройден \r\n\r\n";
		}

		if (!empty($errorMessage)) {
		    print $errorMessage;
		    exit;
		}
	}

}