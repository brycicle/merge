<?php 
	session_start();
	include "msqliconnect/connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project</title>
	<meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="icon" href="bg.jpg">
    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
	padding: 0px;
	margin: 0px;
	box-sizing: border-box;
}
body {
	margin: 0;
	padding: 0;
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
	font-family: 'Poppins', sans-serif;
	padding-left: 18%;
	background: #f3f5f4;
}
.btn {
	font-family: 'Poppins', sans-serif;
	font-size: 18px;
	font-weight: bold;
	background: #fff;
	width: 160px;
	padding: 20px;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	color: #000;
	border-radius: 5px;
	cursor: pointer;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	-webkit-transition-duration: 0.3s;
	transition-duration: 0.3s;
	-webkit-transition-property: box-shadow, transform;
	transition-property: box-shadow, transform;
}
.btn:hover, .btn:focus, .btn:active {
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
	-webkit-transform: scale(1.1);
	transform: scale(1.1);
	color: #000;
}
.p {
	font-size: 12px;
	position: absolute;
	text-align: center;
	font-weight: normal;
	margin-top: 18%;
	margin-left: 34%;
	padding: 0;
}
.p1 {
	font-size: 12px;
	position: absolute;
	text-align: center;
	font-weight: normal;
	margin-top: 17%;
	margin-left: -33%;
	padding: 0;
}
.bold {
	font-weight: bold;
}
</style>
<body>

	<?php include "Navigation.php"; ?>
	<a href="Newcustomer.php" class="btn"><img src="user.png" style="width:120px; height: 120px;"></a>
	<p class="p1">Register as New Customer</p>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="#" class="btn"><img src="box.png" style="width:100px; height: 120px;"></a>
	<?php
        $email = $_SESSION['email'];
        
        $sql = "SELECT * FROM register WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>
	<p class="p">Choose this to register your <bold class="bold">2nd</bold> personal account/head<br>under the name of <bold class="bold"><?php echo $row['fname'] . ' ' . $row['lname']; ?>.</bold></p>
	<?php } } ?>
</body>
</html>