<?php
namespace classes\trees\abstract;
require_once('interfaces/trees/Tree.php');

use \interfaces\trees\Tree as TreeInterface;

abstract class Tree implements TreeInterface
{
	private $fruits = [];

	public function growFruits() : void
	{
		$i = 0;

		while($i <= $this->quantityFruits())
		{
			$this->fruits[$this->id()] = clone $this->fruit();
			$i++;
		}
	}

	public function quantityFruits()
	{ 
		return mt_rand($this->minFruit,$this->maxFruit);
	}

	protected function fruit()
	{
		return $this->fruit;
	}

	protected function id()
	{
		return bin2hex(openssl_random_pseudo_bytes(5));
	}

    public function pick()
    {
        $fruits = $this->fruits;
        return function() use (&$fruits){
            return array_shift($fruits);
        };
    }    
}