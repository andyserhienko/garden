<?php
namespace interfaces\trees;

interface Tree
{
	public function growFruits() : void;
	public function pick();
	public function quantityFruits();
	public function getType();
}