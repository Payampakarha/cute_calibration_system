<?php
    $user = $_REQUEST['user'];
    $logged_in = $_POST['someone_using'];
    if ($user != "viewer") {
        $file_logged_in = fopen('calibration_files/someone_logged_in.txt','w');
        fwrite($file_logged_in, $logged_in);
        fclose($file_logged_in);
    }
?>
