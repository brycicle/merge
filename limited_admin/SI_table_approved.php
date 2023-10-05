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
  	.badge-danger{
    	background: #dc3545;
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
</style>
<body>
	<?php
		$username = $_SESSION['username'];
		$s = mysqli_query($conn,"SELECT * FROM register WHERE username='$username'");
		while($row = mysqli_fetch_array($s)){
			$accountid = $row['accountid'];
	?>
	<?php 
	    $sql = "SELECT * FROM si_request WHERE status='Approved' AND limitedadminid='$accountid' ORDER BY id DESC";
	    $result = mysqli_query($conn, $sql);
  	?>
  	<div class="cl"></div>
  	<div class="table-container">
    	<table class="ta">
		    <thead>
		      	<tr id="header">

		        	<th>Date</th>
		        	<th>Account ID</th>
		        	<th>UserName</th>
		        	<th>Sponsor ID</th>
		        	<th>Request Form</th>	
		        	<th>Status</th>

		      	</tr>
		    </thead>
		    <?php    
		        if (mysqli_num_rows($result) > 0) {
		            while($row = mysqli_fetch_assoc($result)) {
		    ?>
    		<tbody id="data_table">
      			<tr>

			        <td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o', strtotime($row["r_date"])); ?></td>
			        <td data-label = "Account ID"><?php echo $row['accountid'] ?></td>
			        <td data-label = "Username"><?php echo $row['username'] ?></td>
			        <td data-label = "Sponsor ID"><?php echo $row['sponsorid'] ?></td>
			        <td data-label = "Receipt"><a href="<?php echo $row['upload'] ?>" target="_blank">REQUEST FORM</a></td> 
			        <td data-label = "Status"><?php 
							$status=$row['status'];
							if($status=="" or $status=="Approved"){
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
    		<tbody id="no_record" style="display: none;">
			<tr>
				<td colspan="6" style="text-align: center;">No Record Found</td>
			</tr>
		</tbody>
  		</table>
  	</div>
  	<?php
        } 
    ?> 
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>