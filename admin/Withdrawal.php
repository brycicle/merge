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
                    			<h5 class="card-title">Admin Fee</h5>
                    		<?php
                    		$username = $_SESSION['username'];
							  $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
							  while($row = mysqli_fetch_array($sql)){
							?>	
			                <h5 class="border-bottom">&#8369;<?php echo number_format($row['admin_fee'],2) ?></h5>
			               	<?php 
						     	}
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
                    			<h5 class="card-title">Total SI Payment</h5>
                    			<?php
                    			$username = $_SESSION['username'];
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                while($row = mysqli_fetch_array($sql)){
              ?>  
                      <h5 class="border-bottom">&#8369;<?php echo number_format($row['si_payment'],2) ?></h5>
                      <?php 
                  }
                ?> 
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-withdrawal material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--primary">
                  			<div class="card-inner">
                    			<h5 class="card-title">Total Tax Payment</h5>
                    			<?php
                    			$username = $_SESSION['username'];
								  $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
								  while($row = mysqli_fetch_array($sql)){
								?>	
				                <h5 class="border-bottom">&#8369;<?php echo number_format($row['tax'],2) ?></h5>
				               	<?php 
							     	}
							    ?> 
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-briefcase material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--info">
                  			<div class="card-inner">
                    			<h5 class="card-title">Members Payment</h5>
                    			<?php
                    			$username = $_SESSION['username'];
								  $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
								  while($row = mysqli_fetch_array($sql)){
								?>	
				                <h5 class="border-bottom">&#8369;<?php echo number_format($row['member_payment'],2) ?></h5>
				               	<?php 
							     	}
							    ?> 
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-briefcase material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>
             		
             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--success">
                  			<div class="card-inner">
                    			<h5 class="card-title">Admin Withdraw</h5>
                    			<?php
				                    $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_admin_withdraw FROM admin_withdraw");
				                      
				                    $row = mysqli_fetch_assoc($sql);
				                    $total_admin_withdraw = $row['total_admin_withdraw'];

				                    echo "<h5 class='border-bottom'>&#8369;".number_format($total_admin_withdraw,2)."</h5>";
				                  ?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-withdrawal material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--danger">
                  			<div class="card-inner">
                    			<h5 class="card-title">SI Withdraw</h5>
                    			<?php
				                    $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_si_payment_withdraw FROM si_withdraw");
				                      
				                    $row = mysqli_fetch_assoc($sql);
				                    $total_si_payment_withdraw = $row['total_si_payment_withdraw'];

				                    echo "<h5 class='border-bottom'>&#8369;".number_format($total_si_payment_withdraw,2)."</h5>";
				                  ?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-withdrawal material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--primary">
                  			<div class="card-inner">
                    			<h5 class="card-title">Tax Withdraw</h5>
                    			<?php
				                    $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_tax_withdraw FROM tax_withdraw");
				                      
				                    $row = mysqli_fetch_assoc($sql);
				                    $total_tax_withdraw = $row['total_tax_withdraw'];

				                    echo "<h5 class='border-bottom'>&#8369;".number_format($total_tax_withdraw,2)."</h5>";
				                  ?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-withdrawal material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

             		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--info">
                  			<div class="card-inner">
                    			<h5 class="card-title">Member Withdraw</h5>
                    			<?php
				                    $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_member_withdraw FROM member_withdraw");
				                      
				                    $row = mysqli_fetch_assoc($sql);
				                    $total_member_withdraw = $row['total_member_withdraw'];

				                    echo "<h5 class='border-bottom'>&#8369;".number_format($total_member_withdraw,2)."</h5>";
				                  ?>
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-withdrawal material-icons"></i>
                    			</div>
                  			</div>
                		</div>
             		</div>

            	</div>
            	<hr>
            	<?php 
            	$username = $_SESSION['username'];
					$sql = mysqli_query($conn, "SELECT * FROM genealogy WHERE username='$username'");
					while ($row = mysqli_fetch_array($sql)) {
				?>
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
					    $selected_withdraw = $_POST["selected_withdraw"];
					    $amount = $_POST["amount"];

					    // Check which form was selected and process accordingly
					    if ($selected_withdraw === "".$row['admin_fee']."") {
					        include "Withdrawal_code_admin_fee.php";
					    } elseif ($selected_withdraw === "".$row['si_payment']."") {
					        include "Withdrawal_code_si_payment.php";
					    } elseif ($selected_withdraw === "".$row['tax']."") {
					        include "Withdrawal_code_tax_payment.php";
					    } elseif ($selected_withdraw === "".$row['member_payment']."") {
					        include "Withdrawal_code_members_payment.php";
					    } else {
					        echo "Invalid selection";
					    }
					}
				?>
				<h6>Withdraw Tpye:</h6>
				<form id="withdrawalForm" method="POST">
			        <input type="radio" name="selected_withdraw" value="<?php echo $row['admin_fee'] ?>"
			               data-form-id="adminFeeForm" data-action="Withdrawal_code_admin_fee.php">
			        <label>Admin Fee</label><br>

			        <input type="radio" name="selected_withdraw" value="<?php echo $row['si_payment'] ?>"
			               data-form-id="siPaymentForm" data-action="Withdrawal_code_si_payment.php">
			        <label>Total SI Payment</label><br>

			        <input type="radio" name="selected_withdraw" value="<?php echo $row['tax'] ?>"
			               data-form-id="taxPaymentForm" data-action="Withdrawal_code_tax_payment.php">
			        <label>Total Tax Payment</label><br>

			        <input type="radio" name="selected_withdraw" value="<?php echo $row['member_payment'] ?>"
			               data-form-id="membersPaymentForm" data-action="Withdrawal_code_members_payment.php">
			        <label>Members Payment</label><br>

			        <h6>Withdraw Amount:</h6>
			        <input type="number" class="form-control" style="width: 30%;" name="amount" required><br>
			        <input type="submit" class="btn btn-primary" name="submit" value="Withdraw">
			    </form>
				<?php 
					}
				?>    
          	</div>
        </main>
    </div>
   
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>