<html>
<body>

<?php 
    $msg = '';
    $access_lvl = 0;
    $username = '';
    $psoption = ['cost' => 8,]; 
    if (empty($_POST['uname']) || empty($_POST['psw']) ) {
        $msg= 'Username and/or password not entered.';  
        $username = "viewer";  
    }
    //Read hashed files to see users and passes 
    
    $hashed_dir = '/Users/cute/source/cute_calibration_system/hashes/';
    $shifter_users_file = $hashed_dir . 'users_shifter.txt';
    $shifter_pswds_file = $hashed_dir . 'pswds_shifter.txt';
    $expert_users_file = $hashed_dir . 'users_expert.txt';
    $expert_pswds_file = $hashed_dir . 'pswds_expert.txt';

    $shifter_user_file_lines = file("$shifter_users_file");
    $shifter_pswd_file_lines = file("$shifter_pswds_file");
    $expert_user_file_lines = file("$expert_users_file");
    $expert_pswd_file_lines = file("$expert_pswds_file");

    $shifter_users = array("");
    $shifter_pswds = array("");
    $expert_users = array("");
    $expert_pswds = array("");

    foreach ($shifter_user_file_lines as $line) {
        array_push($shifter_users, str_replace("\n","",$line));
    }
    foreach ($shifter_pswd_file_lines as $line) {
        array_push($shifter_pswds, str_replace("\n","",$line));
    }
    foreach ($expert_user_file_lines as $line) {
        array_push($expert_users, str_replace("\n","",$line));
    }
    foreach ($expert_pswd_file_lines as $line) {
        array_push($expert_pswds, str_replace("\n","",$line));
    }

    $msg = 'Username and/or password are incorrect!';
    $username = "viewer";
    $logged_in = "n";
    $count = count($shifter_users);
    for ($i=1; $i<$count; $i++){
        if ( (password_verify($_REQUEST['uname'],$shifter_users[$i])) && (password_verify($_REQUEST['psw'],$shifter_pswds[$i])) ){
            $msg= 'Username and Password are OK!';
            $access_lvl = 1;
            $username = $_REQUEST['uname'];
            $logged_in = "y";
        }
    }
    $count = count($expert_users);
    for ($i=1; $i<$count; $i++){
        if ( (password_verify($_REQUEST['uname'],$expert_users[$i])) && (password_verify($_REQUEST['psw'],$expert_pswds[$i])) ){
            $msg= 'Username and Password are OK!';
            $access_lvl = 2;
            $username = $_REQUEST['uname'];
            $logged_in ="y";
        }
    }
    /* //use this to hash passwords
    $hashed = password_hash('pasword',PASSWORD_DEFAULT);
    echo $hashed;
     */
    echo $msg;

?>

</body>
    
<script type="text/javascript">
var access_lvl = <?php echo json_encode($access_lvl)?>;
var uname = <?php echo json_encode($username)?>;
if (access_lvl ==0) {
    alert ("Login was unssuccessful. Press OK to return to calibration webpage as viewer!")
}
else {
    alert ("Login successfull. You can now use the features. Press OK to return to calibration webpage.")
}
localStorage.setItem("access_lvl",access_lvl);
localStorage.setItem("current_user",uname);
window.location = "cute_calibration_system.html";
</script>';
 

</html> 
