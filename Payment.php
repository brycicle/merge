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
	    margin: 0;
	    padding: 0;
	}
	.table-container {
	    position: relative;
	    width: 100%;
	    height: 100vh;
	    overflow: auto;
	}

	table {
	    position: sticky;
	    top: 0;
	    background-color: #ffffff;
	    width: 90%;
	    margin: 0 auto;
	    border: 1px solid #bdc3c7;
	    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
	}
	tr {
		transition: all .2s ease-in;
		cursor: pointer;
	}
	th {
		position: sticky;
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}
	td {
		background-color: #fff;
		color: #000;
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}
	td a{
		text-decoration: none;
	}
	#header {
		background-color: #2c578f;
		color: #fff;
	}
	.pagination{
		position: absolute;
		padding: 0;
		margin-top: 3%;
		margin-left: 10.5%;
	}
	.p-10{
		padding: 0;
		position: absolute;
		margin-top: 3%;
		margin-left: 80%;
		color: #000;
	}
	.bold{
		font-weight: bold;
	}
	.badge-warning{
		background: #ffa500;
	}
	.badge-success{
		background: #3cb371;
	}
	.card-title{
		color: #2c578f;
	}
	@media(max-width: 768px){
    	.ta{
    		max-width: 450px;
    		margin-bottom: 10%;
    	}
        .ta thead{
            display: none;
        }
        .ta, .ta tbody,.ta tr,.ta td{
            display: block;
            width: 100%;
        } 
        .ta tr{
            margin-bottom: 15px;
        }
        .ta tbody tr td{
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .ta .hidden_id {
	        display: none;
	    }
        .ta td:before{
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
        }
    }
    .mdc-card {
    	margin-left: 12px;
		border-radius: 5px;
	  	width: 500px;
	}
	hr:not([size]) {
	    height: 1px;
	    width: 440px;
	}
</style>
<body>
	
    <main class="content-wrapper">
	    <div class="mdc-layout-grid">
	      	<div class="mdc-layout-grid__inner">
	        	<div class="mdc-layout-grid__cell--span-12">
	          		<div class="mdc-card">
	            		<div class="template-demo">            			
	              			<div class="mdc-layout-grid__inner">
	                			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
	                				<form action="Payment_code.php" method="POST" enctype="multipart/form-data"> 
	                					<h6 class="card-title">Mode of Payment</h6>
	            						<hr>
	                					<?php 
	                						$sql = "SELECT * FROM mode_payment";
									        $result = mysqli_query($conn, $sql);

									        if (mysqli_num_rows($result) > 0) {
									        while($row = mysqli_fetch_assoc($result)) {
										?>
										<h6><?php echo $row['bank_name'] ?></h6>
	                					<label>Account Name: <bold class="bold"><?php echo $row['account_name'] ?></bold></label><br>
	                					<label>Accout Number: <bold class="bold"><?php echo $row['account_num'] ?></bold></label><br>
	                					<label>Amount: <bold class="bold"><?php echo number_format($row['amount']) ?></bold><input type="hidden" name="amount" value="<?php echo $row['amount'] ?>"></label>
	                					<?php 
	                						}
	                					}
	                					?>
	                					<?php
									        $username = $_SESSION['username'];
									        $sql = "SELECT * FROM register WHERE username='$username'";
									        $result = mysqli_query($conn, $sql);

									        if (mysqli_num_rows($result) > 0) {
									        while($row = mysqli_fetch_assoc($result)) {
									    ?>
	                					<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
	                					<input type="hidden" name="username" value="<?php echo $row['username']; ?>">
	                					<input type="hidden" name="limitedadminid" value="<?php echo $row['limitedadminid']; ?>">
	                					<div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
	                						<i class="mdc-text-field__icon uil uil-postcard"></i>		
		                    				<input type="text" name="sponsor_id" class="mdc-text-field__input" id="text-field-hero-input" value="<?php echo $row['sponsorid']; ?>" readonly>
		                    				<div class="mdc-notched-outline">
		                      					<div class="mdc-notched-outline__leading"></div>
		                      					<div class="mdc-notched-outline__notch">
		                        					<label for="text-field-hero-input" class="mdc-floating-label">Sponsor ID</label>
		                      					</div>
		                      					<div class="mdc-notched-outline__trailing"></div>
		                   					</div>
		                  				</div>

						                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
		                  					<i class="mdc-text-field__icon uil uil-postcard"></i> 			
		                    				<input type="text" name="ref_num" class="mdc-text-field__input" id="text-field-hero-input" required>
		                    				<div class="mdc-notched-outline">
		                      					<div class="mdc-notched-outline__leading"></div>
		                      					<div class="mdc-notched-outline__notch">
		                        					<label for="text-field-hero-input" class="mdc-floating-label">Reference Number</label>
		                      					</div>
		                      					<div class="mdc-notched-outline__trailing"></div>
		                   					</div>
		                  				</div>

                    					<label>Upload Payment Receipt</label>
                    					<input type="file" name="upload" class="form-control" required>
                    					<input type="hidden" name="description" value="Payment for Activation Account">
                    					<input type="hidden" name="status" value="Waiting">
                    					<hr>
                    					<?php
								         	$switch = $row['switch'];
								        	$disableButton = ($switch === "1") ? "disabled" : "";
								        ?>

										<button type="submit" class="btn btn-primary col-sm-4 offset-md-4 <?php echo $disableButton; ?>" name="submit">Submit</button>
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
    	}
    }
    ?>
    <div class="table-container" id="Payment_display">
		
	</div>
    <?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>