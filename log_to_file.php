<?php
    $dir = "calibration_files/";
    if(!empty($_REQUEST['position']) ) {$position = $_REQUEST['position'];} 
    else {$position = "?";}
    if(!empty($_REQUEST['speed']) ) {$speed = $_REQUEST['speed'];} 
    else {$speed = "?";}
    if(!empty($_REQUEST['status']) ) {$status = $_REQUEST['status'];} 
    else {$status = "?";}
    if(!empty($_REQUEST['time']) ) {$time = $_REQUEST['time'];} 
    else {$time = "?";}
    if(!empty($_REQUEST['user']) ) {$user = $_REQUEST['user'];} 
    else {$user = "?";}
    if(!empty($_REQUEST['today']) )
    {
        $today = $_REQUEST['today'];
        $filename =  $dir . $today . '_cute_calibration_log.txt' ;
    }    
    else {$today = "?";}

    if (!file_exists($filename) && !empty($_REQUEST['today'])  ) {
        $file = fopen($filename,'w');
        $txt = "Date \t Time \t User \t Posiiton \t Source speed \t Security \n";
        fwrite($file,$txt);
        fclose($file);
    }
    $data = $today . "\t" . $time . "\t" . $user . "\t" . $position . "\t" . $speed . "\t" . $status . "\n";
    if(!empty($_REQUEST['position']) && !empty($_REQUEST['speed']) && !empty($_REQUEST['status'])) file_put_contents($filename,$data, FILE_APPEND);
?>
