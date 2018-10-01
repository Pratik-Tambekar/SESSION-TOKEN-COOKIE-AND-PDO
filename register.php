<?php
include_once('config.php');
$db = new DbConnect;
$dbh = $db->connect();
if(isset($_POST['btn-save'])) {
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_mobile = $_POST['user_mob'];
$user_password = $_POST['password'];

$stmt = $dbh->prepare("SELECT `user_email` FROM `users` WHERE user_email =:email");
      $stmt->execute([':email' => $user_email]); 
      $user = $stmt->fetch();
      //$user_id = $user['user_id'];
      $count = $stmt->rowCount();
      if($count == 0){
        $statement = $dbh->prepare("INSERT INTO `users`( `user_username`, `user_password`, `user_status`, `user_email`,`user_mobile`) VALUES (:username,:userpwd,:status,:useremail,:usermobile)");
        $statement->execute(array(
            ":username" => $user_name,
            ":userpwd" => $user_password,
            ":status" => "1",
            ":useremail" => $user_email,
            ":usermobile" => $user_mobile

        ));
        echo "registered";
      }
      else {
        echo "1";
        }


} 

?>