<?php
namespace classes\viewer;

require_once('classes/convertator/Convertator.php');

use \classes\convertator\Convertator as Convertator;

class Viewer
{
	public static function commonQuantityInfo(Array $treesAndQuantityFruits) : String
	{
		$out = static::notData();

		if(!empty($treesAndQuantityFruits))
		{
			$out = "Общее кол-во собранных фруктов: \r\n";
			foreach ($treesAndQuantityFruits as $treeId => $quantityFruits) {
				if(is_string($treeId) && is_numeric($quantityFruits)){
					$out.= "Тип плода: $treeId; Количество: $quantityFruits шт.; \r\n";
				}else{
					$out = static::incorrectData();
				}
			}
		}

		return $out;
	}

	public static function commonWeightInfo(Array $treesAndCommonWeightFruits) : String
	{
		$out = static::notData();

		if(!empty($treesAndCommonWeightFruits))
		{
			$out = "\r\nОбщий вес собранных фруктов: \r\n";
			foreach ($treesAndCommonWeightFruits as $treeId => $weightFruits) {
				if(is_string($treeId) && is_numeric($weightFruits)){
					$out.= "Тип плода: $treeId; Вес: " . Convertator::gToKg($weightFruits) . "кг; \r\n";
				}else{
					$out = static::incorrectData();
				}
			}
		}

		return $out;
	}

	public static function hardestFruitAndTree(Array $hardestFruitAndTree) : String
	{
		$out = static::notData();

		if(!empty($hardestFruitAndTree))
		{
			$out = "\r\nНаиболее увесистый плод: \r\n";
			foreach ($hardestFruitAndTree as $treeId => $weightFruits) {
				if(is_string($treeId) && is_numeric($weightFruits)){
					$out.= "Собран с дерева с ID: $treeId; Вес: " . $weightFruits . "г; \r\n";
				}else{
					$out = static::incorrectData();
				}
			}
		}

		return $out;
	}

	private static function notData() : String
	{
		return 'Сведенья отсутсвуют';
	}

	private static function incorrectData() : String
	{
		return 'Некорректные данные';
	}

	public static function print($string)
	{
		print($string);
	}

	public static function formatAsTextPlain()
	{
		header('Content-Type: text/plain;');
	}

}