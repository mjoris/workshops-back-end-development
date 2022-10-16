<?php

// require composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

// open an image file
$image = Image::make('assets/procla_ict_oct_2022.jpg');

// resize the image to a width of 1024 pixels and maintain aspect ratio
$image->resize(1024, null, function ($constraint) {
    $constraint->aspectRatio();
});

// insert a watermark
// As of 15 Oct. 2022, this method generates 2 deprecated errors, as Intervention 2.* is not optimized for PHP 8.1
@ $image->insert('assets/odisee.png', 'bottom-right');

// finally we save the image as a new file
$image->save('output/procla_ict_oct_2022_watermark.jpg');

?>
<a href="output/procla_ict_oct_2022_watermark.jpg" target="_blank">Click here for the result</a>
