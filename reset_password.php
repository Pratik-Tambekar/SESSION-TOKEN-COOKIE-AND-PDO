<?php 
include_once('config.php');
$db = new DbConnect;
$dbh = $db->connect();
  if($_POST['email']!=""){
      $email=trim($_POST['email']);
      $stmt = $dbh->prepare("SELECT * FROM `users` WHERE user_username =:email");
      $stmt->execute([':email' => $email]); 
      $user = $stmt->fetch();
      $user_id = $user['user_id'];
      $count = $stmt->rowCount();
      if($count==1) {
         
         $string = "lq6446sdfjsfdhgvdshj87dfjhd943hjdh5087bsdfbhdbh456546kdfkdfkjdfjkfdkjfjk";
         $active_code = substr(str_shuffle($string),0,32);
         $link = 'http://localhost:8080/securelogin/change_password.php?
         user_id='.$user_id.'&key='.$active_code; 
         $date = date('Y-m-d'); 
         date_default_timezone_set('Asia/Kolkata');
         $currentTime = date( 'h:i:s', time () ); 
        
         $stmt1 = $dbh->prepare("SELECT * FROM `forgot_pwd` WHERE email=:email");
         $stmt1->execute([':email' => $email]); 
         $count1 = $stmt1->fetchColumn();
         if($count1 == 0){
         $statement = $dbh->prepare("INSERT INTO `forgot_pwd` (active_token, date, time, email)
         VALUES(:token, :date, :time, :email)");
         $statement->execute(array(
            ":token" => $active_code,
            ":date" =>  $date,
            ":time" => $currentTime,
            ":email" => $email
        ));
         }else{
               $a= 'update';
            $data = [
                ":token" => $active_code,
                ":date" =>  $date,
                ":time" => $currentTime,
                ":email" => $email
            ];
            $sql = "UPDATE `forgot_pwd` SET active_token=:token, date=:date, time=:time WHERE email=:email";
            $stmt= $dbh->prepare($sql);
            $stmt->execute($data);
         }


         $to="$email"; //change to ur mail address
         $strSubject="Advertisement Media | Password Recovery Link";
         $message = '<p>Password Recovery Link : '.$link.'</p>' ;              
         $headers = 'MIME-Version: 1.0'."\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
         $headers .= "From: pratikt@ensivosolutions.com";            
         $mail_sent=mail($to, $strSubject, $message, $headers);  
          if($mail_sent) {echo 1;}
          else {echo '0';  }
      }
      else {
        echo '0';
      }
      
    }else {
      header("Location:login.php");
    }
  
?>