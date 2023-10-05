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
  	.badge-warning{
    	background: #ffa500;
  	}
  	.badge-success{
    	background: #3cb371;
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
    .approvesibtn{
    	background-color: #28a745;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
    }
    .declinesibtn{
    	background-color: #dc3545;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
    }
  
</style>
<body>
  <!-- Approval -->
  <div class="modal fade" id="approvesimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Approved SI ACCOUNT</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="SI_approval.php" method="POST">
                <div class="container-fluid">
                  <input type="hidden" name="si_id" id="si_id">
                  <input type="hidden" name="si_payment" id="si_payment">
                  <h6>Request Approved?</h6>
            </div>
              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="approve">Confirm</button>
              </div>
            </form>
        </div>
      </div>
  </div>
  <!-- Declined -->
  <div class="modal fade" id="declinesimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Declined SI ACCOUNT</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="SI_decline.php" method="POST">
                <div class="container-fluid">
                  <input type="hidden" name="sid_id" id="sid_id">
                  <input type="hidden" name="username" id="username">
                  <h5>Declined</h5>
            </div>
              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="decline">Confirm</button>
              </div>
            </form>
        </div>
      </div>
  </div>
  <?php 
  
    $sql = "SELECT * FROM si_request WHERE status='Waiting' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

  ?>
  <div class="cl">
   
  </div>
  <div class="table-container">
    <table class="ta">
    <thead>
      <tr id="header">

        <th>Date</th>
        <th>Account ID</th>
        <th>UserName</th>
        <th>SI Payment</th>
        <th>SI Uploaded File</th>
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
        <td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["r_date"])); ?></td>
        <td data-label = "Account ID"><?php echo $row['accountid'] ?></td>
        <td data-label = "UserName"><?php echo $row['username'] ?></td>
        <td data-label = "SI Payment"><?php echo $row['si_payment'] ?></td>
        <td data-label = "SI Uploaded File"><a href="../<?php echo $row['upload'] ?>" target="_blank">SI Uploaded File</a></td> 
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
        <td data-label = "Action"><a class="approvesibtn" href="#" style="color: white;">Approve</a></td>
        <td data-label = "Action"><a class="declinesibtn" href="#" style="color: white;">Decline</a></td>
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