<?php

require_once 'ImageTools.php';
require_once 'Coordinate.php';
require_once 'Triangle.php';

$fileName = 'avatar.png';
$isValid = ImageTools::hasValidImageExtension($fileName);
var_dump($isValid);

echo '<br>';

$triangle = new Triangle(new Coordinate(0,0), new Coordinate(1,1), new Coordinate(1,0));
var_dump($triangle->getArea());
