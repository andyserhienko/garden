<?php

namespace classes\convertator;

class Convertator
{
	public static function gToKg(Int $weight)
	{
		return round($weight / 1000, 2);
	}
}