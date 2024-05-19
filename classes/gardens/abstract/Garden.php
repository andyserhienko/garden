<?php
namespace classes\gardens\abstract;

require_once('interfaces/garden/Garden.php');
require_once('interfaces/trees/Tree.php');

use \interfaces\garden\Garden as GardenInterface;
use \interfaces\trees\Tree as TreeInterface;

abstract class Garden implements GardenInterface
{
	protected $types;
	protected $plants;

	/**
	 * Подготовить дерево к выращиванию 
	 * 
	 * @param TreeInterface $Tree
	 * @param Int $quantity
	 * @return void
	 */		
	abstract public function seed(TreeInterface $Tree, Int $quantity) : void;

	/**
	 * Вырастить все посаженные деревья 
	 * 
	 * @return void
	 */	
	public function plantAll() : void
	{
		while($Tree = array_shift($this->trees))
		{
			$quantity = array_shift($this->quantity);
			$this->plant($Tree,$quantity);
		}

	}

	/**
	 * Вырастить необходимое количество деревьев заданного типа 
	 * 
	 * @return void
	 */	
	public function plant(TreeInterface $Tree, Int $quantity) : void
	{
		$i = 0;
		while($i <= $quantity)
		{
			$treeId = $this->id();
			$this->types[$treeId] = $Tree->getType();
			$this->plants[$treeId] = clone $Tree;
			$i++;
		}
	}

	/**
	 * Вырастить все плоды на каждом выращеном дереве 
	 * 
	 * @return void
	 */	
	public function ripening() : void
	{
		foreach ($this->plants as $plant) {
			$plant->growFruits();
		}	
	}

	/**
	 * @return String
	 */
	protected function id() : String
	{
		return bin2hex(openssl_random_pseudo_bytes(5));
	}

	/**
	 * @param String $treeId
	 * 
	 * @return String|null
	 */
	public function getTypeByTreeId(String $treeId)
	{
		$out = null;

		if(isset($this->types[$treeId]))
		{
			$out = $this->types[$treeId];
		}
		return $out;
	}

}