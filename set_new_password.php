<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).on('click','#btn-pwd',function(){
  var url = "new_password.php";       
  if($('#password_form').validate()){
    $.ajax({
    type: "POST",
    url: url,
    data: $("#password_form").serialize(),
      success: function(data) {  
          console.log(data);                  
        if(data==1)
        {
          $('#error_result').html('Password reset successfully.');
          window.setTimeout(function() {
          window.location.href = 'index.php';
          }, 2500);
        } 
        else if(data==0)
        {
          $('#error_result').html('Password reset failed. Enter again.');              
        }
        else 
        {
            $('#error_result').html('password and confirmed password did not match.'); 
        }
      }
    });
  }
  return false;
});
</script>
</head>
<body>
<form method="post" autocomplete="off" id="password_form">
  <label>New Password</label>
  <input type="password" id="passwords" name="password"  class="form-control required">
  <label>Confirm password</label>
  <input type="password" id="cpassword" name="cpassword" equalto="#passwords"
  class=" required" value="">
  <div id="error_result"></div>
  <input type="hidden" name="id" value="<?php if(isset($_GET['uid'])){echo $_GET['uid'];} ?>" id="id">
  <button type="submit" id="btn-pwd" class="btn btn-primary">Submit</button>              
</form>
</body>
</html>

