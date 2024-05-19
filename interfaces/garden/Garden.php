<?php
namespace interfaces\garden;

require_once('interfaces/trees/Tree.php');

use \interfaces\trees\Tree as TreeInterface;

interface Garden
{
	public function plantAll();
	public function plant(TreeInterface $Tree, Int $quantity);
	public function seed(TreeInterface $Tree, Int $quantity);
}