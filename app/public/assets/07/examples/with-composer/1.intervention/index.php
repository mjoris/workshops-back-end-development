<?php

// require composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// import Intervention Image Manager Class and Gd Driver
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

// create image manager with desired driver
$manager = new ImageManager(new Driver());

// read image from file system
$image = $manager->read('assets/procla_ict_oct_2022.jpg');

// resize the image to a width of 1024 pixels and maintain aspect ratio
$image->scale(1024, null);

// insert a watermark
$image->place('assets/odisee.png', 'bottom-right');

// finally we save the image as a new file
$image->save('output/procla_ict_oct_2022_watermark.jpg');

?>
<a href="output/procla_ict_oct_2022_watermark.jpg" target="_blank">Click here for the result</a>
