<?php 
require_once('classes/fruits/apple/Apple.php');
require_once('classes/fruits/pear/Pear.php');
require_once('classes/trees/apple/Apple.php');
require_once('classes/trees/pear/Pear.php');
require_once('classes/gardens/garden/Garden.php');
require_once('classes/viewer/Viewer.php');
require_once('interfaces/fruits/Fruit.php');

use \classes\fruits\apple\Apple as AppleFruit;
use \classes\fruits\pear\Pear as PearFruit;
use \classes\trees\apple\Apple as AppleTree;
use \classes\trees\pear\Pear as PearTree;
use \classes\gardens\garden\Garden as Garden;
use \classes\viewer\Viewer as Viewer;

$GardenObj = new Garden();
$GardenObj->seed(new AppleTree(new AppleFruit()), 10);
$GardenObj->seed(new PearTree(new PearFruit()), 15);
$GardenObj->plantAll();
$GardenObj->ripening();
$GardenObj->harvest();

Viewer::formatAsTextPlain();
Viewer::print(Viewer::commonQuantityInfo($GardenObj->quantityFruitsByTreeType()));
Viewer::print(Viewer::commonWeightInfo($GardenObj->weightFruitsByTreeType()));
Viewer::print(Viewer::hardestFruitAndTree($GardenObj->topFruitWeight()));



