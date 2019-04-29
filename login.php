<?php
include('login2.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: index-2.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:39:29 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Inspire - Admin and Dashboard Template</title>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="assets/css/main.css">

<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<style >
    span{
        color:#FF0000;

    }
</style> 
<body>
<div class="wrapper-page">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="card">
<div class="card-header border-bottom text-center">
<h4 class="card-title">Sign In</h4>
</div>
<div class="card-body" id="login">
<form class="form-horizontal m-t-20" method="POST" action="">
<div class="form-group">
<input class="form-control" type="text" name="username" placeholder="Enter the User Name" onblur="verifname(this)">
</div>
<div class="form-group">
<input class="form-control" type="password" name="password" placeholder="password" onblur="verifname(this)">
</div>
<div class="form-group">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1">
<label class="custom-control-label" for="customCheck1">Remember me</label>
</div>
</div>
<div class="form-group text-center m-t-20">
	  <input name="submit" type="submit" value=" Login " class="btn btn-common mr-3">
   
<span><?php echo $error; ?></span>
</div>

<div class="form-group">
<div class="float-right">
<a href="forgot-password.html" class="text-muted"><i class="lni-lock"></i> Forgot your password?</a>
</div>
<div class="float-left">
<a href="sign-up.html" class="text-muted"><i class="lni-user"></i> Create an account</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/controle_desaisie.js"></script>
</body>

<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:39:29 GMT -->
</html>