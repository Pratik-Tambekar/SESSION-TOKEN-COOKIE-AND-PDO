<?php 
include_once('config.php');
$db = new DbConnect;
$dbh = $db->connect();

if($_POST['password']!=""){
    $pass_encrypt = trim($_POST['password']);
    $cnf_pwd = trim($_POST['cpassword']);
    if(strcmp($pass_encrypt,$cnf_pwd)==0){
     $user_id = $_POST['id'];
    $data = [ ":password" => $pass_encrypt , ":userid" =>  $user_id];
    $sql = "UPDATE `users` SET `user_password` = :password WHERE user_id=:userid";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $no = $stmt->rowCount();
    if ($no == 1){
        
        $stmt1 = $dbh->prepare("SELECT `user_username` FROM `users` WHERE user_id=:userid");
        $stmt1->execute([':userid' => $user_id]); 
        $user1 = $stmt1->fetch();
        $email_id = $user1['user_username'];
        $sql1 = "DELETE FROM `forgot_pwd` WHERE email = :email";        
        $q = $dbh->prepare($sql1);
        $response = $q->execute([':email'=>$email_id]); 
        echo 1;

    } else{
        echo 0;
       
    }
    
}else {
    header("Location:index.php");
}
}else{
    echo 2;
}
?>