<?php
session_start();

$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
$captcha = '';
for ($i = 0; $i < 5; $i++) {
    $captcha .= $chars[random_int(0, strlen($chars) - 1)];
}
$_SESSION['captcha'] = $captcha;

header('Content-type: image/png');

$img = imagecreatetruecolor(150, 50);
$bg = imagecolorallocate($img, 255, 255, 255);
$txt = imagecolorallocate($img, 0, 0, 0);

imagefilledrectangle($img, 0, 0, 120, 40, $bg);
imagestring($img, 5, 25, 10, $captcha, $txt);
imagepng($img);
imagedestroy($img);
?>