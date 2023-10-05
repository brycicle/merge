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
	    padding-top: 5%;
	}

	table {
	    position: sticky;
	    top: 20%;
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
		margin-top: 10%;
		margin-left: 10.5%;
	}
	.p-10{
		padding: 0;
		position: absolute;
		margin-top: 10%;
		margin-left: 80%;
		color: #000;
	}
	.input-group{
		width: 30%;
		height: 40px;
		margin-top: 2%;
		margin-left: 60%;
	}
	.z .ta {
		position: relative;
		margin-left: 50%;
		margin-top: 6%;
		transform: translate(-50%, -50%);
		border-collapse: collapse;
		width: 60%;
		border: 1px solid #bdc3c7;
		box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
	}
	.z .table td {
		background-color: #fff;
		color: #000;
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}
	.z .a{
		background-color: #dc3545;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
	.a{
		background-color: #0d6efd;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
	@media(max-width: 768px){
		.z .ta{
			margin-top: 150px;
			margin-bottom: -150px;
			max-width: 450px;
		}
		.z .b{
			margin-top: 90px;
			margin-bottom: 20px;
		}
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
	<?php 
		$username = $_SESSION['username'];
	    $s = mysqli_query($conn,"SELECT * FROM register WHERE username='$username'");
	    while($row = mysqli_fetch_array($s)){
	        $accountid = $row['accountid'];
	?>
	<?php 
		$sql = "SELECT * FROM register WHERE status='active account' AND account='block' AND limitedadminid='$accountid'";
		$result = mysqli_query($conn, $sql);
	?>
	<div class="input-group">
		<input type="text" id="searchInput" class="form-control" onkeyup="liveSearch()" placeholder="Enter Username">
		
	  	<span class="input-group-text"><i class="uil uil-search"></i></span>
	</div>
	<div id="searchResults" class="z"></div>
	<div class="table-container">
	<table class="ta">
		<thead >
			<tr id="header">

				<th>First Name</th>
				<th>Last Name</th>
				<th>User Name</th>
				<th>Account ID</th>
				<th>Block</th>
				<th>Unblock</th>
				<th>Action</th>

			</tr>
		</thead>
		<?php    
			if (mysqli_num_rows($result) > 0) {
		   	 	while($row = mysqli_fetch_assoc($result)) {
        ?>
		<tbody id="data_table">
			<tr>
				<td data-label = "First Name" style="color: #2c578f;"><?php echo $row['fname'] ?></td>
				<td data-label = "Last Name"><?php echo $row['lname'] ?></td>
				<td data-label = "User Name"><?php echo $row['username'] ?></td>
				<td data-label = "Sponsor ID"><?php echo $row['accountid'] ?></td>
				<td data-label = "Block"><?php echo $row['bl_date'] ?></td>
				<td data-label = "Unblock"><?php echo $row['nbl_date'] ?></td>
				<td data-label = "Action"><a class="a" href="Banned_code_unblock.php?id=<?php echo $row["id"] ?>" style="color: white;">Unblock</a></td>
			</tr>
			<?php 
				}
			} else {
			?>
		    <tr>
		     	<td colspan="8" style="text-align: center;">No Record Found</td>
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