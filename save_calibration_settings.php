<?php
$speed = $_POST['speed'];
$pos = $_POST['position'];
$file_speed = fopen('calibration_files/calibration_speed.txt', 'w');
$file_pos = fopen('calibration_files/calibration_pos.txt', 'w');
fwrite($file_speed,$speed);
fwrite($file_pos,$pos);
fclose($file_speed);
fclose($file_pos);
?>
