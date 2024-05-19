<?php
namespace classes\trees\pear;

require_once('classes/trees/abstract/Tree.php');
require_once('classes/fruits/pear/Pear.php');

use \classes\trees\abstract\Tree as AbstractTree;
use \classes\fruits\pear\Pear as PearFruit;

class Pear extends AbstractTree
{
	protected $minFruit = 0;
	protected $maxFruit = 20;
	protected $fruit;
	private $fruits = [];

	public function __construct(PearFruit $Fruit)
	{
		$this->fruit = $Fruit;
	}

	public function getType()
	{
		return 'Pear';
	}

	public function __clone()
	{
		return new self($this->fruit);
	}

}