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
		font-size: 40px;
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
    .approvebtn{
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
	<div class="modal fade" id="approvemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Approved</h5>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="Payment_approval.php" method="POST" enctype="multipart/form-data">
        				<div class="container-fluid">
				      		<input type="hidden" name="approve_id" id="approve_id">
				      		<input type="hidden" name="user_id" id="user_id">
				      		<input type="hidden" name="upline_id" id="upline_id">
				      		<input type="hidden" name="sponsor_id" id="sponsor_id">
				      		<input type="hidden" name="position" id="position">
				      		<input type="hidden" name="ref_num" id="ref_num">
				      		<input type="hidden" name="upload" id="upload">
				      		<input type="hidden" name="username" id="username">
				      		<input type="hidden" name="status" id="status">
				      		<input type="hidden" name="amount" id="amount">
				      		<input type="hidden" name="description" id="description">
				      		<input type="hidden" name="limitedadminid" id="limitedadminid">

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
		$sql = "SELECT * FROM activate_request WHERE status='Waiting' ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);

	?>
	<div class="cl">

	</div>

	<div class="table-container">
		<table class="ta">
			<thead>
				<tr id="header">

					<th>Date</th>
					<th>Sponsor ID</th>
					<th>Receipt</th>
	                <th>UserName</th>
	                <th>Status</th>
					<th colspan="2">Action</th>

				</tr>
			</thead>
			<?php    
		    	if (mysqli_num_rows($result) > 0) {
		        	while($row = mysqli_fetch_assoc($result)) {
        	?>
			<tbody id="data_table">
				<tr>
					<td class="hidden_id"><?php echo $row['id'] ?></td>
					<td class="hidden_id"><?php echo $row['user_id'] ?></td>
					<td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["date"])); ?></td>
					<td data-label = "Sponsor ID"><?php echo $row['sponsor_id'] ?></td>
					<td class="hidden_id" data-label = "Upline ID"><?php echo $row['upline_id'] ?></td>
					<td class="hidden_id" data-label = "Position"><?php echo "xxxxx"?></td>
					<td class="hidden_id"><?php echo $row['ref_num'] ?></td>
					<td data-label = "Receipt"><img class="image" src="../<?php echo $row['upload']; ?>" width=50 height=20></td>
					<td class="hidden_id"><?php echo $row['amount'] ?></td>
					<td class="hidden_id"><?php echo $row['description'] ?></td>
					<td data-label = "UserName"><?php echo $row['username'] ?></td>
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
					<td class="hidden_id"><?php echo $row['limitedadminid'] ?></td>
					<td data-label = "Action"><a class="approvebtn" href="#" style="color: white;">Approve</a></td>
					<td data-label = "Action"><a class="a" href="Decline.php?id=<?php echo $row['id']; ?> " style="color: white;">Decline</a></td>
				</tr>
				<?php 
					}
				} else {
				?>
			    <tr>
			     	<td  colspan="6" style="text-align: center;">No Record Found</td>
			    </tr>
			    
			    <?php
			      	} 
			    ?>   
			</tbody>
			
		</table>
		
		<div class="popup-image">
			<span>&times;</span>
			<img src="">
		</div>
	</div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>