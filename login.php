<?php include_once('header.php'); ?>

<section class="parent">
    <div class="child"></div>
    <?php
            $db = new DbConnect;
            $dbh = $db->connect();         
        if(!func::checkLoginState($dbh)){ 
            //header('location:index.php');
        

            if(isset($_POST['username']) && isset($_POST['password']))
            {
                
                $query = "SELECT * from users WHERE user_username = :username AND user_password = :password";
                $username = $_POST['username'];
                $password = $_POST['password'];

                $stmt = $dbh->prepare($query);
                $stmt->execute(array(':username'=>$username,':password'=>$password));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['user_id'] > 0){
                   
                    func::createRecord($dbh, $row['user_username'], $row['user_id']);
                    header("location:index.php");
                   //echo func::createString(32);
 
                }else
                {
                    echo "<span style='color:red'>invalid username and password</span>";
                    echo '
                        <form action="login.php" method="POST">
                            <label>Username</label></br>
                            <input type="text" name="username" required><br/>
                            <label>Passsword</label></br>
                            <input type="text" name="password" required><br/>
                            <input type="submit" name="Login" value="login">
                        </form>
                
                        ';
                }
            
           

            }else{
                    echo '
                        <form action="login.php" method="POST">
                            <label>Username</label></br>
                            <input type="text" name="username" required><br/>
                            <label>Passsword</label></br>
                            <input type="text" name="password" required><br/>
                            <input type="submit" name="Login" value="login">
                        </form>
                
                        ';
                      
                }
            }
             


    ?>

    </div>
</section>
<?php   include_once('footer.php');  ?>