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
	    padding-left: 5%;
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
	.badge-warning{
		background: #ffa500;
	}
	.badge-success{
		background: #3cb371;
	}
	.popup-image{
		position: fixed;
		top: 0; left: 0;
		background: rgba(0, 0, 0, .9);
		height: 100%;
		width: 100%;
		z-index: 100;
		display: none;
	}
	.popup-image span{
		position: absolute;
		top: 0; left: 0;
		font-size: 60px;
		font-weight: bolder;
		color: #fff;
		cursor: pointer;
		z-index: 100;
	}
	.popup-image img{
		position: absolute;
		top: 50%; left: 50%;
		transform: translate(-50%, -50%);
		border: 5px solid #fff;
		border-radius: 5px;
		width: 500px;
		object-fit: cover;
	}
	td .approve{
		padding: 5px;
		border-radius: 5px;
	}
	td .decline{
		padding: 5px;
		border-radius: 5px;
	}
	.modal-title, h4, .col-form-label{
		color: #000;
	}
	.hidden_id {
        display: none;
    }
    .cl{
    	margin-left: 5%;
    	margin-top: 6.5%;
    	margin-bottom: 2%;
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
    .encashmentapprovebtn{
		background-color: #0d6efd;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
	.a{
		background-color: #dc3545;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
</style>
<body>
	<!-- Start Approval Modal -->
	<div class="modal fade" id="encashmentapprovedmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Approved</h5>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="Encashment_code.php" method="POST">
        				<div class="container-fluid">
				      		<input type="hidden" name="encashmentapproved_id" id="encashmentapproved_id">
				      		<input type="hidden" name="tax" id="tax">
				      		<input type="hidden" name="net_balance" id="net_balance">

                    		<h6>Your prompt action in approving the payment request and providing all necessary information. Please confirm the successful approval.</h6>
						</div>
        			
	      			</div>
	      			<div class="modal-footer">
	        			<button type="submit" class="btn btn-primary" name="approve">Confirm</button>
	      			</div>
      			</form>
    		</div>
  		</div>
	</div>
	<!-- End Approval Modal -->
	<?php 
		$sql = "SELECT * FROM encashment WHERE status='Waiting' ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);

	?>
	<div class="cl">
		
	</div>
	<div class="table-container">
		<table class="ta">
			<thead>
				<tr id="header">

					<th>Request</th>
					<th>User Type</th>
					<th>UserName</th>
					<th>Amount</th>
					<th>Tax</th>
					<th>Net Balance</th>
					<th>Status</th>
					<th>Action</th>

				</tr>
			</thead>
			<?php    
		    	if (mysqli_num_rows($result) > 0) {
		        	while($row = mysqli_fetch_assoc($result)) {
        	?>
			<tbody id="data_table">
				<tr>
					<td class="hidden_id"><?php echo $row['id'] ?></td>
					<td data-label = "Request" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["date_request"])); ?></td>
					<td data-label = "User Type"><?php echo $row['usertype'] ?></td>
					<td data-label = "UserName"><?php echo $row['username'] ?></td>
					<td data-label = "Amount"><?php echo $row['amount'] ?></td>
					<td data-label = "Tax"><?php echo $row['tax'] ?></td>
					<td data-label = "Net Balance"><?php echo $row['net_balance'] ?></td>
					<td data-label = "Status">
					<?php 
						$status=$row['status'];
						if($status=="" or $status=="Waiting"){
					?>
					<span class="badge badge-warning">Waiting</span>
					<?php 
					    }
					    
					?>
					</td>
					<td data-label = "Action"><a class="encashmentapprovebtn" href="#" style="color: white;">Approve</a></td>
				</tr>
				<?php 
					}
				} else {
				?>
			    <tr>
			     	<td colspan="7" style="text-align: center;">No Record Found</td>
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