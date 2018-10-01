<?php

class func{

        public static function checkLoginState($dbh){

            if(!isset($_SESSION['userid']) || !isset($_COOKIE['PHPSESSID'])){

                session_start();
            }

            if(isset($_COOKIE['user_id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])){

                    $query = "SELECT * from sessions Where sessions_userid= :userid AND sessions_token=:token AND sessions_serial =:serial";
                    $userid = $_COOKIE['user_id'];
                    $token = $_COOKIE['token'];
                    $serial = $_COOKIE['serial'];
                   // $stmt = $dbh->prepare("Select * from users");
                    $stmt = $dbh->prepare($query);
                    $stmt->execute(array(':userid'=>$userid,':token'=>$token,':serial'=>$serial));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row['sessions_userid'] > 0){

                        if($row['sessions_userid'] == $_COOKIE['user_id'] && 
                        $row['sessions_token'] == $_COOKIE['token']  &&
                        $row['sessions_serial'] == $_COOKIE['serial']
                        )
                        {
                        if($row['sessions_userid'] == $_SESSION['userid'] && 
                            $row['sessions_token'] == $_SESSION['token']  &&
                            $row['sessions_serial'] == $_SESSION['serial']){

                                    return true;
                            }else{
                                
                                func::createSession($_COOKIE['user_username'], $_COOKIE['user_id'], $_COOKIE['token'], $_COOKIE['serial']);
                                return true;

                            }
                        }

                    }

            }

        }
         public static function createRecord($dbh, $user_username, $user_id){

            $query = "INSERT INTO `sessions`(`sessions_id`, `sessions_userid`, `sessions_token`, `sessions_serial`, `sessions_date`) VALUES (null,:userid,:token,:serial,:date)";

            $dbh->prepare("Delete from sessions where sessions_userid=:sessionuserid")->execute(array(':sessionuserid'=>$user_id));

            $token = func::createString(32);
            $serial = func::createString(32);

            func::createCookie($user_username, $user_id, $token, $serial);
            func::createSession($user_username, $user_id, $token, $serial);

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':userid'=>$user_id,':token'=>$token,':serial'=>$serial,':date'=>date('Y-m-d')));
        }

        public static function createCookie($user_username, $user_id, $token, $serial){
           
            setCookie('user_id', $user_id, time()+ (86400) * 30, "/");
            setCookie('user_username', $user_username, time()+ (86400) * 30, "/");
            setCookie('token', $token, time()+ (86400) * 30, "/");
            setCookie('serial',$serial, time()+ (86400) * 30, "/");
        }

        public static function deleteCookie(){

            setCookie('user_id', '' , time() - 1, "/");
            setCookie('user_username', '' , time() - 1, "/");
            setCookie('token', '' , time() - 1 , "/");
            setCookie('serial', '' , time() -1 , "/");
        }

        public static function createSession($user_username, $user_id, $token, $serial){
             if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID'])){

                 //session_start();
             }
            $_SESSION['username'] = $user_username;
            $_SESSION['userid'] = $user_id;
            $_SESSION['token'] = $token;
            $_SESSION['serial'] = $serial;
            
        }


        public static function createString($len){

            $string = "lq6446sdfjsfdhgvdshj87dfjhd943hjdh5087bsdfbhdbh456546kdfkdfkjdfjkfdkjfjk";
            // $s = '';
            // $r_new = '';
            // $r_old = '';

            // for($i = 1;$i < $len;$i++){

            //     while($r_old == $r_new){
            //         $r_new = rand(0,60);
            //     }
            //     $r_old = $r_new;
            //     $s = $s.$string[$r_new];            
            // }

            return substr(str_shuffle($string),0,$len);



        }

       







}









?>