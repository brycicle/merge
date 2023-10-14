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
        body {
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            margin-top: 3%;
            margin-left: 10%;
            position: absolute;
            top: 45%;
            left: 42%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 900px; /* Changed to percentage */
            display: flex;
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, .08);
        }

        .wrapper .left {
            width: 40%;
            background: linear-gradient(to right, #01a9ac, #01dbdf);
            padding: 30px 25px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            text-align: center;
            color: #fff;
        }

        .wrapper .left img {
            border-radius: 5px;
            margin-bottom: 10px;
            max-width: 100%; /* Make images responsive */
        }

        .wrapper .left h4 {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .wrapper .left p {
            font-size: 12px;
        }

        .wrapper .right {
            width: 60%; /* Adjusted the width for better mobile compatibility */
            background: #fff;
            padding: 30px 25px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .wrapper .right .info,
        .wrapper .right .projects {
            margin-bottom: 25px;
        }

        .wrapper .right .info h3,
        .wrapper .right .projects h3 {
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
            color: #353c4e;
            text-transform: uppercase;
            letter-spacing: 5px;
        }

        .wrapper .right .info_data,
        .wrapper .right .projects_data {
            display: flex;
            flex-wrap: wrap; /* Added for better mobile layout */
        }

        .wrapper .right .info_data .data,
        .wrapper .right .projects_data .data {
            width: 45%;
            padding: 0 10px; /* Added for better spacing on mobile */
        }

        .wrapper .right .info_data .data h4,
        .wrapper .right .projects_data .data h4 {
            color: #353c4e;
            margin-bottom: 5px;
            font-size: 15px;
        }

        .wrapper .right .info_data .data p,
        .wrapper .right .projects_data .data p {
            font-size: 13px;
            margin-bottom: 10px;
            color: #919aa3;
        }

        .right .Pro {
            color: #01a9ac;
        }

        .modal-title,
        .col-form-label {
            color: #000;
        }

        @media screen and (max-width: 768px) {
            /* Add your responsive styles for screens with a maximum width of 768px here */
            .wrapper {
                margin-top: 20%;
                margin-bottom: 100px;
                max-width: 100%; /* Adjust to full width on smaller screens */
                flex-direction: column; /* Stack elements vertically on small screens */
                align-items: center; /* Center elements horizontally on small screens */
            }

            .wrapper .left,
            .wrapper .right {
                width: 100%;
                border-radius: 5px; /* Adjust border-radius for both containers */
                padding: 20px; /* Adjust padding for better spacing on small screens */
            }

            .wrapper .left img {
                max-width: 80%; /* Make images responsive */
            }

            .wrapper .right {
                margin-top: 20px; /* Add spacing between the left and right sections */
            }
        }
    </style>
<body>
	<?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM register WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        	while($row = mysqli_fetch_assoc($result)) {
    ?>
	<div class="wrapper">
	    <div class="left">
	        <img src="user (2).png" alt="admin" width="100">
	        <h4><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h4>
	         <p><?php echo $row['address']; ?></p>
	         <h3 data-bs-toggle="modal" data-bs-target="#editmodal"><i class="mdc-drawer-arrow material-icons" style="cursor: pointer;">edit</i></h3>
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
	        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#passmodal">Change Password</button>
	    </div>
	</div>

	<!-- Start Edit Modal -->
	<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="Profile_code.php" method="POST">
        				<div class="container-fluid">
						    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				      		<label for="recipient-name" class="col-form-label">Email:</label>
    						<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
				      	
				      		<label for="recipient-name" class="col-form-label">Address:</label>
    						<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">

    						<label for="recipient-name" class="col-form-label">Contact:</label>
    						<input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>">
						</div>
        			
	      			</div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        			<button type="submit" class="btn btn-primary" name="update">Update</button>
	      			</div>
      			</form>
    		</div>
  		</div>
	</div>
	<!-- End Edit Modal -->
	
	<!-- Start Change Pass Modal -->
	<div class="modal fade" id="passmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="Profile_change_pass.php" method="POST">
        				<div class="container-fluid">
						    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				      		<label for="recipient-name" class="col-form-label">Old Password:</label>
    						<input type="password" class="form-control password" name="old_password" required>
    						<span class="availability" style="color: green;"></span>
				      		<br>
				      		<label for="recipient-name" class="col-form-label">New Password:</label>
    						<input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" required>
    
    						<label for="recipient-name" class="col-form-label">Confirm Password:</label>
    						<input type="password" class="form-control" name="confirmpassword" required>
						</div>
        			
	      			</div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        			<button type="submit" class="btn btn-primary" name="update">Update</button>
	      			</div>
      			</form>
    		</div>
  		</div>
	</div>
	<!-- End Change Pass Modal -->
		<?php 
		} 
	} 
	?>
    <?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>