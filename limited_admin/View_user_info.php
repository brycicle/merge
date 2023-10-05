<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "includes/Header.php";
	include "includes/Navbar.php";
	include "includes/Topbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	body{
	   background-color: #f3f3f3;
	}

	.wrapper{
		margin-top: 3%;
		margin-left: 10%;
	  position: absolute;
	  top: 40%;
	  left: 40%;
	  transform: translate(-50%,-50%);
	  width: 900px;
	  display: flex;
	  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
	}

	.wrapper .left{
	  width: 40%;
	  background: linear-gradient(to right,#01a9ac,#01dbdf);
	  padding: 30px 25px;
	  border-top-left-radius: 5px;
	  border-bottom-left-radius: 5px;
	  text-align: center;
	  color: #fff;
	}

	.wrapper .left img{
	  border-radius: 5px;
	  margin-bottom: 10px;
	}

	.wrapper .left h4{
	  margin-bottom: 10px;
	  font-size: 15px;
	}

	.wrapper .left p{
	  font-size: 12px;
	}

	.wrapper .right{
	  width: 70%;
	  background: #fff;
	  padding: 30px 25px;
	  border-top-right-radius: 5px;
	  border-bottom-right-radius: 5px;
	}

	.wrapper .right .info,
	.wrapper .right .projects{
	  margin-bottom: 25px;
	}

	.wrapper .right .info h3,
	.wrapper .right .projects h3{
	    margin-bottom: 15px;
	    padding-bottom: 5px;
	    border-bottom: 1px solid #e0e0e0;
	    color: #353c4e;
	  text-transform: uppercase;
	  letter-spacing: 5px;
	}

	.wrapper .right .info_data,
	.wrapper .right .projects_data{
	  display: flex;
	  justify-content: space-between;
	}

	.wrapper .right .info_data .data,
	.wrapper .right .projects_data .data{
	  width: 45%;
	}

	.wrapper .right .info_data .data h4,
	.wrapper .right .projects_data .data h4{
	    color: #353c4e;
	    margin-bottom: 5px;
	    font-size: 15px;
	}

	.wrapper .right .info_data .data p,
	.wrapper .right .projects_data .data p{
	  font-size: 13px;
	  margin-bottom: 10px;
	  color: #919aa3;
	}
	.right .Pro{
		color: #01a9ac;
	}
</style>
<body>
	<?php 
		if(isset($_GET['accountid'])){
	       $accountid = $_GET['accountid'];
	       $sql = "SELECT * FROM register WHERE accountid = '$accountid'";
	       $result = mysqli_query($conn, $sql);
	       $row = mysqli_fetch_assoc($result);
	    }
	?>
	<div class="wrapper">
	    <div class="left">
	        <img src="../admin/user-icon.png" alt="admin" width="100">
	        <h4><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h4>
	         <p><?php echo $row['address']; ?></p>
	    </div>
	    <div class="right">
	        <div class="info">
	            <h3><bold class="Pro">Profile</bold> Information</h3>
	            <div class="info_data">
	                 <div class="data">
	                    <h4>User Name</h4>
	                    <p><?php echo $row['username']; ?></p>
	                 </div>
	              <div class="data">
                    <h4>Email</h4>
                    <p><?php echo $row['email']; ?></p>
                 </div>
	            </div>
	             <div class="info_data">
	             	<div class="data">
	                    <h4>Contact No.</h4>
	                    <p><?php echo $row['contact']; ?></p>
	                 </div>
	                 <div class="data">
	                    <h4>Sponsor ID.</h4>
	                    <p><?php echo $row['sponsorid']; ?></p>
	                 </div>
	                 <div class="data">
	                    <h4>Password</h4>
	                    <p><?php echo $row['password']; ?></p>
	                 </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>