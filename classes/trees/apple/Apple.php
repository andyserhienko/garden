<?php
namespace classes\trees\apple;

require_once('classes/trees/abstract/Tree.php');
require_once('classes/fruits/apple/Apple.php');

use \classes\trees\abstract\Tree as AbstractTree;
use \classes\fruits\apple\Apple as AppleFruit;

class Apple extends AbstractTree
{
	protected $minFruit = 40;
	protected $maxFruit = 50;
	protected $fruit;
	private $fruits = [];
	private $typeName;

	public function __construct(AppleFruit $Fruit)
	{
		$this->fruit = $Fruit;
	}

	public function getType()
	{
		return 'Apple';
	}

	public function __clone()
	{
		return new self($this->fruit);
	}	
}