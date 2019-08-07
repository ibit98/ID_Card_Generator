<?php
// File and new size
$filename = 'images/background1.jpg';
$percent = 1.5;

// Content type
header('Content-Type: image/jpeg');

// Get new sizes
list($width, $height) = getimagesize($filename);
$newwidth = $width * 1.05;
$newheight = $height * 1.5;
//$black = imagecolorallocate($im, 0, 0, 0);

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth,$newheight, $width, $height);

//$font = 'fonts/RobotoMono-Regular.ttf';

// First we create our bounding box
//$bbox = imageftbbox(10, 0, $font, 'The PHP Documentation Group');

// This is our cordinates for X and Y
//$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 5;
//$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

//imagefttext($thumb, 10, 0, $x, $y, $black, $font, 'The PHP Documentation Group');

// Output
imagejpeg($thumb);
?>