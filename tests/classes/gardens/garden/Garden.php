<?php
namespace tests\classes\garden;

require_once('tests/classes/abstract/TestAbstract.php');
require_once('classes/gardens/garden/Garden.php');
require_once('classes/trees/apple/Apple.php');
require_once('classes/fruits/apple/Apple.php');

use tests\classes\abstract\TestAbstract as TestAbstract;
use classes\trees\apple\Apple as AppleTree;
use classes\fruits\apple\Apple as AppleFruit;
use classes\gardens\garden\Garden as GardenTest;

class Garden extends TestAbstract
{
	public static function run()
	{
		static::displayErrors();
		static::displayAsTextPlain();
		
		$errorMessage = '';

		try
		{
			print "\r\n\r\n === Начало тестирования класса \classes\gardens\Garden === \r\n\r\n";
			
			$isStaticMethod = false;
			$testData = [new AppleTree(new AppleFruit()),2];
			$expectedResponses = ['NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 2;
			static::test($testData,'\classes\gardens\garden\Garden','seed',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','plantAll',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [new AppleTree(new AppleFruit()),2];
			$expectedResponses = ['NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 2;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','plant',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['array','NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','harvest',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = ['hash',100];
			$expectedResponses = ['boolean'];
			$quantityArgumentsWhichRecivedInMockMethod = 2;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','addFruitToContainer',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = ['hash'];
			$expectedResponses = ['boolean'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','makeContainerForTree',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = ['hash'];
			$expectedResponses = ['array','NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','quantityFruitsByTreeType',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['array','NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','weightFruitsByTreeType',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

			$isStaticMethod = false;
			$testData = [''];
			$expectedResponses = ['array','NULL'];
			$quantityArgumentsWhichRecivedInMockMethod = 1;
			static::test($testData,'\classes\gardens\garden\Garden(new \classes\trees\apple\Apple(new \classes\fruits\apple\Apple()))','topFruitWeight',$isStaticMethod,$quantityArgumentsWhichRecivedInMockMethod,$expectedResponses);

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