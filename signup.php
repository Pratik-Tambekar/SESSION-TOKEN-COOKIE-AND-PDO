<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="script/login.js"></script>
    
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body>
<div class="register_container">
<form class="form-signin" method="post" id="register-form">
<h2 class="form-signin-heading">User Registration Form</h2><hr />
<div id="error">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
</div>
<div class="form-group">
<input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
<span id="check-e"></span>
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Phone Number" name="user_mob" id="user_mob" />
<span id="check-m"></span>
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
</div>
<hr />
<div class="form-group">
<button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
<span class="glyphicon glyphicon-log-in"></span>   Create Account
</button>
</div>
</form>
</div>
</body>
</html>
