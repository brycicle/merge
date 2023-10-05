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
	h1 {
		font-weight: 600;
		text-align: center;
		background-color: #16a085;
		color: #fff;
		padding: 10px 0px;
	}
	.badge-success{
		background: #3cb371;
	}
	.badge-danger{
		background: #dc3545;
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

</style>
<body>
	

	<div class="cl">
		<?php 
		    $sql = "SELECT * FROM genealogy WHERE username='$username'";
		    $result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		      	while($row = mysqli_fetch_assoc($result)) {
		?>
		<?php
			$accountid = $row['accountid'];
			$referralLink = "http://localhost/Project1/Signup.php?sponsorid=" . $accountid;
         	$status = $row['status'];

        	$disableButton = ($status === "inactive account") ? "disabled" : "";

        ?>
	    <?php 
	    	}
	    }
	    ?>
	    <?php if(isset($referralLink)) { ?>
	        <h6>Your Referral Link:</h6>
	        <div class="input-group mb-3">
			  	
			  	<button class="btn btn-primary" id="button-addon2" onclick="copyToClipboard()">Copy</button><input type="text" class="form-control" value="<?php echo $referralLink; ?>" id="referral-link" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
			</div>
	    <?php } ?>
	</div>
	<div class="table-container">
		<table class="ta">
			<thead>
				<tr id="header">

					<th>Account ID</th>
	                <th>User Name</th>
	                <th>Sponsor ID</th>
	                <th>Status</th>

				</tr>
			</thead>
			<?php    
				$sql = "SELECT * FROM genealogy WHERE username='$username'";
				$result = mysqli_query($conn, $sql);

			    if (mysqli_num_rows($result) > 0) {
			        while($row = mysqli_fetch_assoc($result)) {
	        ?>
			<tbody>
				<tr>

					<td data-label = "Account ID"><?php echo $row['accountid'] ?></td>
					<td data-label = "User Name"><?php echo $row['username'] ?></td>
					<td data-label = "Sponsor ID"><?php echo $row['sponsorid'] ?></td>
					<td data-label = "Status"><?php 
							$status=$row['status'];
							if($status=="" or $status=="active"){
						?>
						<span class="badge badge-success">Activated</span>
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
			     	<td colspan="4" style="text-align: center;">No Record Found</td>
			    </tr>
			    <?php
			      	} 
			    ?>   
			</tbody>
		</table>
	</div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>