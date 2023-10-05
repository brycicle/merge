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
	    overflow: auto;
	}

	table {
	    position: sticky;
	    top: 0;
	    background-color: #ffffff;
	    width: 100%;
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
	h1 {
		font-weight: 600;
		text-align: center;
		background-color: #16a085;
		color: #fff;
		padding: 10px 0px;
	}
	.badge-warning{
		background: #ffa500;
	}
	.badge-success{
		background: #3cb371;
	}
    .cl{
    	margin-left: 5%;
    	margin-top: 6.5%;
    	margin-bottom: 2%;
    	margin-right: 20%;
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
    .active_account{
    	color: #3cb371;
    	text-transform: uppercase;
    }
    .inactive_account{
    	color: #dc3545;
    	text-transform: uppercase;
    }
</style>
<body>
	<div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          	<div class="mdc-layout-grid">
            	<div class="mdc-layout-grid__inner">

              		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--success">
                  			<div class="card-inner">
                    			<h5 class="card-title">Wallet Balance</h5>
                    			<?php
								    $username = $_SESSION['username'];
								    $sql = mysqli_query($conn, "SELECT SUM(wallet) AS total_wallet FROM wallet_balance WHERE username='$username'");
								    
								    $row = mysqli_fetch_assoc($sql);
							        $wallet = $row['total_wallet'];

								    echo '<h5 class="border-bottom">&#8369;'.number_format($wallet,2) .'</h5>';
								?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-bill-stack material-icons"></i>
                    			</div>
                  			</div>
                		</div>
              		</div>

              		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--danger">
                  			<div class="card-inner">
                    			<h5 class="card-title">Total Direct Referral</h5>
                    			<?php
								    $username = $_SESSION['username'];
								    $accountid = $_GET['accountid'];
								    $sql = mysqli_query($conn, "SELECT SUM(DRB) AS total_DRB FROM genealogy WHERE groupid='$accountid'");
								    
								    $row = mysqli_fetch_assoc($sql);
							        $DRB = $row['total_DRB'];

								    echo '<h5 class="border-bottom">&#8369;'.number_format($DRB,2) .'</h5>';
								?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-receipt material-icons"></i>
                    			</div>
                  			</div>
                		</div>
              		</div>

              		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--primary">
                  			<div class="card-inner">
                    			<h5 class="card-title">Total Pairing</h5>
                    			<?php
								    $username = $_SESSION['username'];
								    $accountid = $_GET['accountid'];
								    $sql = mysqli_query($conn, "SELECT SUM(pairing) AS total_pairing FROM genealogy WHERE groupid='$accountid'");
								    
								    $row = mysqli_fetch_assoc($sql);
							        $pairing = $row['total_pairing'];

								    echo '<h5 class="border-bottom">&#8369;'.number_format($pairing,2) .'</h5>';
								?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-book-reader material-icons"></i>
                    			</div>
                  			</div>
                		</div>
              		</div>

              		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--info">
                  			<div class="card-inner">
                    			<h5 class="card-title">Total Encashment</h5>
                    			<?php
		                    		$username = $_SESSION['username'];
									$sql = mysqli_query($conn, "SELECT SUM(net_balance) AS total_balance FROM encashment WHERE username='$username' AND status='Approved'");

							        $row = mysqli_fetch_assoc($sql);
							        $net_balance = $row['total_balance'];

								echo '<h5 class="border-bottom">&#8369;'.number_format($net_balance,2) .'</h5>';
								
								?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-folder-open material-icons"></i>
                    			</div>
                  			</div>
                		</div>
              		</div>

            	</div>
            	<hr>
        		<?php
        			$username = $_SESSION['username'];
        			$sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
					while($row = mysqli_fetch_array($sql))
					{
                ?>

                <form action="Move_to_wallet_code.php" method="POST">
                	<input type="hidden" name="accountid" value="<?php echo $row['accountid'] ?>">
					<input type="hidden" name="usertype" value="<?php echo $row['usertype'] ?>">
                	<input type="hidden" name="username" value="<?php echo $row['username'] ?>">
                	<input type="hidden" name="DRB" value="<?php echo $DRB ?>">
                	<input type="hidden" name="pairing" value="<?php echo $pairing ?>">
                	<input type="submit" name="submit" value="Move to Wallet" class="btn btn-primary">
                </form><br>


                <form action="Encashment_code.php" method="POST">
                	<input type="hidden" name="accountid" value="<?php echo $row['accountid'] ?>">
					<input type="hidden" name="usertype" value="<?php echo $row['usertype'] ?>">
	                <input type="hidden" name="username" value="<?php echo $row['username'] ?>">
	                <input type="hidden" name="wallet" value="<?php echo $wallet ?>">
	                <?php
	        			$username = $_SESSION['username'];
	        			$sql = mysqli_query($conn,"SELECT * FROM wallet_balance WHERE username='$username'");
						while($row = mysqli_fetch_array($sql))
						{
	                ?>
	                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	                <?php 
	                	}
	                ?>
	                <input type="hidden" name="status" value="Waiting">
					<?php 
						}
					?>
	            	<label>Withdrawal Amount:</label>
					<input type="number" name="amount" class="form-control" style="width: 30%;" required><br>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
            	</form>

				<div class="cl">
		
				</div>
				<?php 
					$username = $_SESSION['username'];
					$sql = "SELECT * FROM encashment WHERE username='$username' ORDER BY id DESC";
					$result = mysqli_query($conn, $sql);
				?>
				<h6>Transaction History: </h6>
				<div class="table-container">
					<table class="ta">
						<thead>
							<tr id="header">

								<th>Request</th>
								<th>Amount</th>
								<th>Tax</th>
								<th>Net Balance</th>
								<th>Approved</th>
								<th>Status</th>

							</tr>
						</thead>
						<?php    
						    if (mysqli_num_rows($result) > 0) {
						        while($row = mysqli_fetch_assoc($result)) {
				        ?>
						<tbody>
							<tr>
								<td data-label = "Request At"><?php echo date('M  j, o | g:i A', strtotime($row["date_request"])); ?></td>
								<td data-label = "Amount"><?php echo $row['amount'] ?></td>
								<td data-label = "Tax"><?php echo $row['tax'] ?></td>
								<td data-label = "Net Balance"><?php echo $row['net_balance'] ?></td>
								<td data-label="Approved At">
							    <?php
								    $date_approve = $row["date_approve"];
								    if ($date_approve === '0000-00-00 00:00:00' || empty($date_approve)) {
								        echo '';
								    } else {
								        echo date('M j, o | g:i A', strtotime($date_approve));
								    }
								    ?>
								</td>

								<td data-label = "Status">
									<?php 
										$status=$row['status'];
										if($status=="" or $status=="Waiting"){
									?>
									<span class="badge badge-warning">Waiting</span>
									<?php 
									    }
									    if($status=="Approved"){ 
									?>
									<span class="badge badge-success">Approved</span>
								    <?php 
								    	}
									?>
								</td>
							</tr>
							<?php 
								}
							} else {
							?>
						    <tr>
						     	<td colspan="6" style="text-align: center;">No Record Found</td>
						    </tr>
						    <?php
						      	} 
						    ?>
						</tbody>
					</table>
				</div>
          	</div>
        </main>
    </div>
    
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>