<?php
  //Set the Content Type
  header('Content-type: image/jpeg');

  // Create Image From Existing File
  $jpg_image = imagecreatefromjpeg('tkt.jpg');

  // Allocate A Color For The Text
  $color = imagecolorallocate($jpg_image, 25, 136, 76);

  // Set Path to Font File
  $font_path = 'arial.ttf';

  // Set Text to Be Printed On Image
  
  
  
  require_once('function.php');
connectdb();
$tid = $_POST["tid"];

$tkt = mysql_fetch_array(mysql_query("SELECT id, busid, pname, pmobile, nkname, nkmobile, seats FROM ticket_details WHERE id='".$tid."'"));
$busdtls = mysql_fetch_array(mysql_query("SELECT route, time, date FROM bus_info WHERE id='".$tkt[1]."'"));
$route = mysql_fetch_array(mysql_query("SELECT routename FROM bus_route WHERE id='".$busdtls[0]."'"));

  $tnum = $tkt[0];
  $date = $busdtls[2];
  $tm = $busdtls[1];
  $route = $route[0];
  $st = $tkt[4];
  $dp = $tkt[5];
  $seats = $tkt[6];
  $name = $tkt[2];
  $phn = $tkt[3];
  $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
  
  // Print Text On Image
  imagettftext($jpg_image, 32, 0, 1300, 122, $color, $font_path, $tnum);
  imagettftext($jpg_image, 32, 0, 180, 255, $color, $font_path, $date);
  imagettftext($jpg_image, 32, 0, 1000, 255, $color, $font_path, $tm);
  imagettftext($jpg_image, 32, 0, 180, 364, $color, $font_path, $route);
  imagettftext($jpg_image, 32, 0, 720, 364, $color, $font_path, $st);
  imagettftext($jpg_image, 32, 0, 1210, 364, $color, $font_path, $dp);
  imagettftext($jpg_image, 32, 0, 180, 470, $color, $font_path, $seats);
  imagettftext($jpg_image, 32, 0, 190, 590, $color, $font_path, $name);
  imagettftext($jpg_image, 32, 0, 1100, 590, $color, $font_path, $phn);
  imagettftext($jpg_image, 7, 0, 1100, 50, $color, $font_path, $link);

  // Send Image to Browser
  imagejpeg($jpg_image);

  // Clear Memory
  imagedestroy($jpg_image);
?> 