<?php


$im = imagecreatetruecolor(800, 44);
imagesavealpha($im, true);

$white = imagecolorallocate($im, 0xff, 0xff, 0xff);

$transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $transparent);

$text = $_GET['title'];
$font = './dirtyheadline.ttf';

imagettftext($im, 24, 0, 0, 34, $white, $font, $text);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
