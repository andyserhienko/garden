<?php
namespace classes\fruits\abstract;
require_once('interfaces/fruits/Fruit.php');

use \interfaces\fruits\Fruit as FruitInterface;

abstract class Fruit implements FruitInterface
{
	private $minWeight;
	private $maxWeight;
	private $weight;

	abstract public function weight() : Int;
	abstract public function initWeight() : Int;
}