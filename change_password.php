<?php 
include_once('config.php');
$db = new DbConnect;
$dbh = $db->connect();
    if($_GET['user_id']!="" && $_GET['key']!=""){
        $user_id = $_GET['user_id'];
        $active_code = $_GET['key'];

        $stmt = $dbh->prepare("SELECT `user_username` FROM `users` WHERE user_id=:userid");
        $stmt->execute([':userid' => $user_id]); 
        $user = $stmt->fetch();
        $email_id = $user['user_username'];

        
        $fetch = $dbh->prepare("SELECT * FROM `forgot_pwd` WHERE email=:email
        AND `active_token`=:token");
        $fetch->execute([':email' => $email_id, ':token'=>$active_code]); 
        $pwd_details = $fetch->fetch();
        $pwd_reset_time = $pwd_details['time'];
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date( 'h:i:s', time () ); 
        $hourdiff = round((strtotime($pwd_reset_time) - strtotime($currentTime))/3600, 1);
        if($hourdiff>24){
          header("Location:index.php");
        }else {
            header("Location:set_new_password.php?uid=".$user_id);
        }
    }else {
        header("Location:index.php");
    }
?>