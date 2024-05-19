<?php 
require_once('tests/classes/viewer/Viewer.php');
require_once('tests/classes/trees/pear/Pear.php');
require_once('tests/classes/trees/apple/Apple.php');
require_once('tests/classes/fruits/pear/Pear.php');
require_once('tests/classes/fruits/apple/Apple.php');
require_once('tests/classes/gardens/garden/Garden.php');


use tests\classes\viewer\Viewer;
use tests\classes\trees\pear\Pear;
use tests\classes\trees\apple\Apple;
use tests\classes\fruits\apple\Apple as FruitApple;
use tests\classes\fruits\pear\Pear as FruitPear;
use tests\classes\garden\Garden;

Viewer::run();
Pear::run();
Apple::run();
FruitApple::run();
FruitPear::run();
Garden::run();