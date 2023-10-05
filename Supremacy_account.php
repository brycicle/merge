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
	<title>Project</title>
</head>
<style type="text/css">
	 hr:not([size]) {
      width: 480px;
  }
  .mdc-text-field {
      position: relative;
    }

    .invalid-feedback {
      top: 40px;
      position: absolute;
      bottom: 0;  
    }
	.mdc-layout-grid{
      width: 50%;
    }
</style>
<body>
	<center>
		<h2 style="color: #d7385e;">Welcome To Our Company</h2>
		<p><b>Click below to download PDF</b></p>
	</center>
    <ul>
     <?php
        $sql = "SELECT * FROM pdf_files";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li><center><a href="admin/' . $row['file_path'] . '" target="_blank">Dowload Now</a></center></li>';
            }
        } else {
            echo '<li>No PDF files found in the database.</li>';
        }
        ?>
    	</ul>
    	
     	<main class="content-wrapper">
	    	<div class="mdc-layout-grid">
	      	<div class="mdc-layout-grid__inner">
	        		<div class="mdc-layout-grid__cell--span-12">
	          		<div class="mdc-card">
	            		<div class="template-demo">            			
	              			<div class="mdc-layout-grid__inner">
	                			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
	                				<form action="Supremacy_code.php" method="POST" enctype="multipart/form-data"> 
	                					<h6 class="card-title">Request Form</h6>
	            						<hr>
	            						<?php 
								        	$sql = "SELECT * FROM register WHERE username='$username'";
								       	$result = mysqli_query($conn, $sql);

								        	if (mysqli_num_rows($result) > 0) {
								        	while($row = mysqli_fetch_assoc($result)) {
								    	?>
	            						<input type="hidden" name="accountid" value="<?php echo $row['accountid'] ?>">
	            						<input type="hidden" name="username" value="<?php echo $row['username'] ?>">
	            						<input type="hidden" name="sponsorid" value="<?php echo $row['sponsorid'] ?>">
	            						<input type="hidden" name="limitedadminid" value="<?php echo $row['limitedadminid'] ?>">
	            						<input type="hidden" name="status" value="Waiting">
                    					<label>Upload Your Request Form: </label>
                    					<input type="file" name="upload" class="form-control" required>
                    					<?php 
											}
										}
										?>
                    					<?php
											$sql = mysqli_query($conn, "SELECT * FROM commission");

											while ($row = mysqli_fetch_array($sql)) {
												?>
												<input type="hidden" name="si_payment" value="<?php echo $row['si_payment'] ?>">
												<?php 
													}
												?>
                    					<hr>
                    					<?php 
								        	$sql = "SELECT * FROM register WHERE username='$username'";
								       	$result = mysqli_query($conn, $sql);

								        	if (mysqli_num_rows($result) > 0) {
								        	while($row = mysqli_fetch_assoc($result)) {
								    	?>
                    					<?php
								         	$si_switch = $row['si_switch'];
								        	$disableButton = ($si_switch === "1") ? "disabled" : "";
								        ?>
                    					<button type="submit" class="btn btn-primary col-sm-2 offset-md-10 <?php echo $disableButton; ?>" name="submit">Submit</button>
                    					<?php 
											}
										}
										?>
		                  			</form>
	                			</div>
	              			</div>
	            		</div>
	          		</div>
	        		</div>
	      	</div>
	    	</div>
		</main>
		
   <?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>