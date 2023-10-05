<?php 
  	$page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
  	if(!isset($_SESSION['ADMIN_LOGIN'])){
?>
<script>
    window.location.href='../Signin.php';
</script>
<?php
  	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<title>M.E.R.G.E.</title>
  	<!-- plugins:css -->
  	<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  	<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  	<!-- endinject -->
  	<!-- Plugin css for this page -->
  	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  	<link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  	<!-- End plugin css for this page -->
  	<!-- Layout styles -->
  	<link rel="stylesheet" href="assets/css/demo/style.css">
  	<!-- End layout styles -->
  	<link rel="shortcut icon" href="../M.png" />
  	<!-- Bootstrap -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<!-- Icon -->
  	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  	<!-- Alertify Js -->
  	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<style type="text/css">
   @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    *{
     	margin: 0;
      	padding: 0;
      	box-sizing: border-box;
      	list-style: none;
      	font-family: 'Poppins', sans-serif;
    }
  	.mdc-drawer--open, .mdc-drawer__drawer {
    	width: 255px;
	}
	.mdc-drawer {
  		background: #2c578f;
  		position: fixed;
	}
	.brand-logo .logo{
  		width: 200px;
	}
	
</style>
<body>
	<script src="assets/js/preloader.js"></script>
  	<div class="body-wrapper">