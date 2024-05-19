<?php
namespace classes\gardens\garden;

require_once('traits/Harvester.php');
require_once('classes/gardens/abstract/Garden.php');
require_once('interfaces/trees/Tree.php');

use \classes\gardens\abstract\Garden as AbstractGarden;
use \interfaces\trees\Tree as TreeInterface;

class Garden extends AbstractGarden
{
	protected $quantity = [];
	protected $trees = [];

	use \traits\Harvester;

	public function __construct()
	{}

	public function seed(TreeInterface $Tree, Int $quantity) : void
	{
		$this->trees[] = $Tree;
		$this->quantity[] = $quantity;
	}
}