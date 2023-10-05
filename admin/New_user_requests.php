<?php 
	session_start();
	include "msqliconnect/connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project</title>
	<meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="icon" href="../bg.jpg">
    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style type="text/css">
	table {
		position: absolute;
		left: 59%;
		top: 50%;
		transform: translate(-50%, -50%);
		border-collapse: collapse;
		width: 70%;
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
		background-color: #01a9ac;
		color: #fff;
	}
	h1 {
		font-weight: 600;
		text-align: center;
		background-color: #16a085;
		color: #fff;
		padding: 10px 0px;
	}
	tr:hover {
		background-color: #f5f5f5;
		transform: scale(1.02);
		box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
	}
</style>
<body>
	<?php include "Side_bar.php"; ?>
	<table>
		<thead>
			<tr id="header">

				<th>User Name</th>
				<th>Upline ID</th>
				
				<th>Approval</th>

			</tr>
		</thead>
		<?php    
		    $sql = "SELECT * FROM payment ORDER BY id ASC";
		    $result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		        // output data of each row
		        while($row = mysqli_fetch_assoc($result)) {
        ?>
		<tbody>
			<tr>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['upline_id'] ?></td>
				
				<td><a href="View_new_user.php?id=<?php echo $row["id"] ?>">View Details</a></td>
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
</body>
</html>