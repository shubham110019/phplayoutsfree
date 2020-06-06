<?php
include "db.php";
session_start();

if(!isset($_SESSION['username'])){	
	header('location: index.php');
}

$sqlotp="SELECT * FROM adminb WHERE id='".$_SESSION['id']."'";
$resotp=$conn->query($sqlotp);
$viewotp=$resotp->fetch_assoc();


if(isset($_POST['submit']))
{
	
	$otp=$_POST['otp'];
	
	if($viewotp['otp'] == $otp)
		{
			$_SESSION['otp'] = $viewotp['otp'];
			header('location: home.php'); 
			
		}
		else{
			
			header('location: logout.php');
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
    <a href="#"><b>Layouts</b>Free</a> <?= $viewotp['otp'];?>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
  
	  	<p class="errorline text-center"><?= isset($mess)?$mess:'' ?> </p>

      <form method="post">
	  
	  
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="OTP" name="otp" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
