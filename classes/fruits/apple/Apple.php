<?php
namespace classes\fruits\apple;

require_once('classes/fruits/abstract/Fruit.php');
use \classes\fruits\abstract\Fruit as AbstractFruit;

class Apple extends AbstractFruit
{
	private $minWeight = 150;
	private $maxWeight = 180;
	private $weight;

	public function __clone()
	{
		$this->weight = $this->initWeight();
	}

	public function weight() : Int
	{
		return $this->weight;
	}

	public function initWeight() : Int
	{
		return mt_rand($this->minWeight,$this->maxWeight);
	}
}