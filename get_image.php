<?php

if(!isset($_SESSION)) session_start();

//$opcoes = get_option('Anderson_Makiyama_Codigo_No_Registro_options');

$text_color = isset($_SESSION['Anderson_Makiyama_Codigo_No_Registro_font_color'])?$_SESSION['Anderson_Makiyama_Codigo_No_Registro_font_color']:array('0','0','0');
$background = isset($_SESSION['Anderson_Makiyama_Codigo_No_Registro_background'])?$_SESSION['Anderson_Makiyama_Codigo_No_Registro_background']:0;

if(!is_array($text_color) || count($text_color)<3) $text_color = array('0','0','0');

if($background == 0) $background = mt_rand(1,8);

$code = isset($_SESSION['Anderson_Makiyama_Codigo_No_Registro_code'])?$_SESSION['Anderson_Makiyama_Codigo_No_Registro_code']:'';

$image = imagecreatefromjpeg("images/".$background.".jpg");

$width = 160;
$height = 60;

$font = 'fonts/chp-fire.ttf';

$font_size = $height * 0.60;

$text_color = imagecolorallocate($image, $text_color[0], $text_color[1], $text_color[2]);

$noise_color = imagecolorallocate($image, 100, 120, 180);

$textbox = imagettfbbox($font_size, 0, $font, $code) or die('Erro na funчуo imagettfbbox');

$x = ($width - $textbox[4])/2;

$y = ($height - $textbox[5])/2; $y = $y -12;

imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code) or die('Erro na funчуo imagettftext');

header('Content-Type: image/jpeg');

imagejpeg($image);

imagedestroy($image);

?>