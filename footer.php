<?php 
include_once('header.php'); 
include_once('config.php'); 
include_once('functions.php');
$db = new DbConnect;
$dbh = $db->connect(); 
?>
<footer>
<?php

echo '
<a href="index.php">Index</a> |';
if(func::checkLoginState($dbh))  
echo '<a href="admin.php">Admin</a> | <a href="logout.php">Logout</a>';
else 
echo '<a href="login.php">Login</a> | <a href="forgot.php">Forgot Password</a> | <a href="signup.php">Signup</a>';

?>

</footer>



