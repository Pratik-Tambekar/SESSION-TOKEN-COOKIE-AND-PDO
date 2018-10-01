<?php

include_once('config.php');
include_once('header.php');


?>

<section class="parent">
    <div class="child">
    <?php
    $db = new DbConnect;
    $dbh = $db->connect();
    if(!func::checkLoginState($dbh)){
        header('location:login.php');
        exit();   
    }
    echo 'Welcome  '. $_SESSION['username']. "!";
   ?>
    </div>
</section>

<?php

include_once('footer.php');

?>


