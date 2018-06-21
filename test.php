<?php
header("Content-type: image/png");  
$im = @imagecreatetruecolor(200, 200);  
$red = imagecolorallocate($im, 255, 0, 0);  
//用 $red 颜色填充图像  
imagefill( $im, 0, 0, $red );  
imagepng($im);  
imagedestroy($im);  