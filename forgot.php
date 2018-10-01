<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).on('click','.forgot_password',function(){
  var url = "reset_password.php";       
  if($('#form_reset_pwd').validate()){ 
    $.ajax({
    type: "POST",
    url: url,
    data: $("#form_reset_pwd").serialize(), // serializes the form's elements.
    success: function(data) { 
        console.log(data);                   
      if(data==1)
      {
        $('#error_result').html('Check your email');
      } 
      else
      {
        $('#error_result').html('Invalid email id. Please check your email id.');
      }
    }
    });
  }
  return false;
});
</script>
</head>
<body>
<form class="form-horizontal"  action="#" id="form_reset_pwd">  
  <label class="col-sm-3 control-label">Email :</label>
  <input type="text" class="form-control required email" name="email" placeholder="Email"/>
  <button type="button" class="forgot_password">Send Email</button> 
  <div id="error_result" ></div>         
</form>
</body>
</html>

