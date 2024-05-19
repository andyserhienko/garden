<?php
namespace classes\fruits\pear;

require_once('classes/fruits/abstract/Fruit.php');
use \classes\fruits\abstract\Fruit as AbstractFruit;

class Pear extends AbstractFruit
{
	private $minWeight = 130;
	private $maxWeight = 170;
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