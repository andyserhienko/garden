<?php

namespace traits;

trait Harvester
{
	protected $container = [];

    public function pickNext($pick)
    {
        while($val = $pick())
        {
            yield $val;
        }        
    }

	/**
	 * Собрать урожай со всех деревьев сада
	 * 
	 * @return Array|null
	 */
    public function harvest()
    {
    	if(is_array($this->plants) && !empty($this->plants))
    	{
	    	foreach($this->plants as $treeId => $Tree)
		    {
		    	$this->makeContainerForTree($treeId);
		        
		        $pick = $Tree->pick();
		        $pickNext = $this->pickNext($pick);

		        foreach ($pickNext as $fruit) {
		        	$this->addFruitToContainer($treeId, $fruit->weight());
		        }
	        }
    	}
		
		return $this->container;
    }

	/**
	 * 
	 * @return bool
	 */
    public function addFruitToContainer($treeId, Int $weight) : bool
    {
    	$out = false;

    	if(is_string($treeId) || is_numeric($treeId) && is_numeric($weight))
    	{
    		$out = true;
    		$this->container[$treeId][] = $weight;
    	}

    	return $out;
    }

    public function makeContainerForTree($treeId)
    {
    	$out = false;

    	if(is_string($treeId) || is_numeric($treeId) && is_array($this->container) && !empty($this->container))
    	{
	    	if(!isset($this->container[$treeId]))
	    	{
	    		$this->container[$treeId] = [];
	    		$out = true;
	    	}
    	}

    	return $out;
    }

	/**
	 * Вывести на экран общее кол-во собранных фруктов каждого вида
	 * 
	 * @return Array|null
	 */		
    public function quantityFruitsByTreeType()
    {
    	$out = [];

    	if(is_array($this->container) && !empty($this->container))
    	{
	    	foreach($this->container as $treeId => $fruits)
	    	{
	    		$treeType = $this->getTypeByTreeId($treeId);

	    		if(isset($out[$treeType])){
	    			$out[$treeType]+= count($fruits);
	    			continue;
	    		}

	    		$out[$treeType] = count($fruits);
	    	}
    	}
    	return count($out) ? $out : null;
    }

	/**
	 * Вывести на экран общий вес собранных фруктов каждого вида
	 * 
	 * @return Array|null
	 */		
    public function weightFruitsByTreeType()
    {
    	$out = [];

    	if(is_array($this->container) && !empty($this->container))
    	{
	    	foreach($this->container as $treeId => $fruits)
	    	{
	    		$treeType = $this->getTypeByTreeId($treeId);

	    		if(isset($out[$treeType])){
	    			$out[$treeType]+= array_sum($fruits);
	    			continue;
	    		}

	    		$out[$treeType] = array_sum($fruits);
	    	}
    	}

    	return count($out) ? $out : null;    	
	}

	/**
	 * Вывести вес самого тяжелого яблока и ID дерева с которого яблоко было собрано 
	 * 
	 * @return Array|null
	 */			
    public function topFruitWeight()
    {
    	$out = [];

     	if(is_array($this->container) && !empty($this->container))
    	{
	    	foreach($this->container as $treeId => $fruits)
	    	{
	    		$treeType = $this->getTypeByTreeId($treeId);

	    		if(isset($out[$treeId])){
	    			$out[$treeId] = max($fruits);
	    			continue;
	    		}

	    		$out[$treeId] = max($fruits);
	    	}
		}

    	if(count($out))
    	{
	    	$treeId = key(max($out, true));
	    	$out = [$treeId => $out[$treeId]];
    	}else{
    		$out = null;
    	}

    	return $out;    	
	}

}