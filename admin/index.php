<?php
include "db.php";
session_start();



$mess='';
if(isset($_POST['submit']))
{
	$username= $_POST['username'];	
	$password=$_POST['password'];
	
	$otp = rand(1000,9999);
	
	
	$sql="SELECT * FROM adminb WHERE username='$username' and password='$password'";
	$res=$conn->query($sql);
	$ress=$res->fetch_assoc();
	
	
	
	if($res->num_rows == 1)
	{	   
	   $_SESSION['username'] = $_POST['username'];
       $_SESSION['id']= $ress['id'];     
	 

		$sqlotp="UPDATE adminb SET otp='$otp' WHERE id=".$ress['id']."";
		$resotp=$conn->query($sqlotp);
		
		
		
	require_once 'mailer/class.phpmailer.php'; 
  // creates object
  $mail = new PHPMailer(true); 
  if(isset($_POST['btn_send']))
  {
   $email      = 'sralli73@gmail.com';
   $subject    = 'layoutsfree OTP';
   $text_message    = $otp;      
   $message  = $otp ;
 try
   {
    $mail->IsSMTP(); 
    $mail->isHTML(true);
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port        = '465';             
    $mail->AddAddress($email);
    $mail->Username   ="phonebecho1@gmail.com";  
    $mail->Password   ="9868513510";            
    $mail->SetFrom('sralli73@gmail.com','shubham ralli');
    $mail->AddReplyTo("sralli73@gmail.com","shubham ralli");
    $mail->Subject    = $subject;
    $mail->Body    = $message;
    $mail->AltBody    = $message;
     
    if($mail->Send())
    {
     
     $msg = "Hi, Your mail successfully sent to".$email." ";
     
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
  } 
		
		
       header('location: otp.php'); 
	   
	   
	   
	   
	            
	 }	
	else{		
		$mess= "username and password wrong";	
	}
	
	

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LayoutsFree</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style>
  .errorline{
	  font-size: 14px;
color: red;
font-weight: bold;
  }
  .hide{
	  display:none;
  }
  .show{
	  display:block;
  }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Layouts</b>Free</a>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
  
	  	<p class="errorline text-center"><?= isset($mess)?$mess:'' ?> </p>

      <form method="post">
	  
	  
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
			<input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block"/>
          </div>
        </div>
		
	
	
	

	
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>

</script>

</body>
</html>
