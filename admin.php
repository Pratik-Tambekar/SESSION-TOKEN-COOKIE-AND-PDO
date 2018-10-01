<?php 
include_once('header.php'); 
$db = new DbConnect;
    $dbh = $db->connect();
?>
<?php

        if(!func::checkLoginState($dbh)){

            header('location:login.php');
            exit();
        }



?>

<section class="parent">
    <div class="child"></div>
    <p>Hello <?php echo $_COOKIE['user_username'];?> and welcome to your private admin</p>
    <ul>
        <li>Manager</li>
        <li>Manager1</li>
        <li>Manager2</li>
        <li>Manager3</li>
        <li>Manager4</li>
        <li>Manager5</li>
    </ul>

</section>




<?php 
include_once('footer.php'); 

?>