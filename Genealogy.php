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
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	* {
		padding: 0px;
		margin: 0px;
		box-sizing: border-box;
	}
	body {
		height: 100vh;
		display: grid;
		align-items: center;
		font-family: 'Poppins', sans-serif;
		background: #f3f5f4;
	}
	.tree {
		width: 100%;
		height: auto;
		text-align: center;
		padding-left: 30%;
	}
	.tree ul {
		padding-top: 20px;
		position: relative;
		transition: .5s;
	}
	.tree li {
		display: inline-table;
		text-align: center;
		list-style-type: none;
		position: relative;
		padding: 10px;
		transition: .5s;
	}
	.tree li::before, .tree li::after {
		content: '';
		position: absolute;
		top: 0;
		right: 50%;
		border-top: 1px solid #ccc;
		width: 51%;
		height: 10px;
	}
	.tree li::after {
		right: auto;
		left: 50%;
		border-left: 1px solid #ccc;
	}
	.tree li:only-child::after, .tree li:only-child::before {
		display: none;
	}
	.tree li:only-child {
		padding-top: 0;
	}
	.tree li:first-child::before, .tree li:last-child::after {
		border: 0 none;
	}
	.tree li:last-child::before {
		border-right: 1px solid #ccc;
		border-radius: 0 5px 0 0;
		-webkit-border-radius: 0 5px 0 0;
		-moz-border-radius: 0 5px 0 0;
	}
	.tree li:first-child::after {
		border-radius: 5px 0 0 0;
		-webkit-border-radius: 5px 0 0 0;
		-moz-border-radius: 5px 0 0 0;
	}
	.tree ul ul::before {
		content: '';
		position: absolute;
		top: 0;
		left: 50%;
		border-left: 1px solid #ccc;
		width: 0;
		height: 20px;
	}
	.tree li a {
		border: 1px solid #ccc;
		padding: 10px;
		display: inline-grid;
		border-radius: 5px;
		text-decoration-line: none;
		border-radius: 5px;
		transition: .5s;
	}
	.tree li a img {
		width: 50px;
		height: 50px;
		margin-bottom: 10px !important;
		border-radius: 100px;
		margin: auto;
	}
	.tree li a span {
		border: 1px solid #ccc;
		border-radius: 5px;
		color: #666;
		padding: 8px;
		font-size: 12px;
		text-transform: uppercase;
		letter-spacing: 1px;
		font-weight: 500;
	}
	/*Hover-Section*/
	.tree li a:hover, .tree li a:hover i, .tree li a:hover span, .tree li a:hover+ul li a {
		background: #c8e4f8;
		color: #000;
		border: 1px solid #94a0b4;
	}
	.tree li a:hover+ul li::after, .tree li a:hover+ul li::before, .tree li a:hover+ul::before, .tree li a:hover+ul ul::before {
		border-color: #94a0b4;
	}
	.disabled-link {
		pointer-events: none;
	    color: gray;
	    text-decoration: none;
	    cursor: default;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="tree">
				<ul>
					
					<li><?php
				        $username = $_SESSION['username'];

				        $sql = "SELECT * FROM register WHERE username='$username'";
				        $result = mysqli_query($conn, $sql);

				        if (mysqli_num_rows($result) > 0) {
				        while($row = mysqli_fetch_assoc($result)) {
				    ?><a href="<?php echo $row['accountid']; ?>" ><img src="user-icon.png"><span><?php echo $row['username']?></span></a>
						<?php } } ?>
						<ul>
							
							<?php
							    // Fetch data from the database table
							    $username = $_SESSION['username'];
							    
							    $sponsorid = $_GET['sponsorid'];

							    $sql = "SELECT id, sponsorid, accountid, position, username FROM register WHERE sponsorid='$sponsorid'";
							    $result = $conn->query($sql);

							    // Store the results in an array
							    $rows = array();
							    while ($row = $result->fetch_assoc()) {
							        $rows[] = $row;
							    }

							  $limit = 2;
								$count = 0;
								$continueCount = 0;
								$continueLimit = 4;
								foreach ($rows as $row) {
								    $currentId = $row['id'];
								    $position = $row['position'];
								    $username = $row['username'];
								    $sponsorid = $row['sponsorid'];
								    $accountid = $row['accountid'];

								    if ($count >= $limit && $continueCount >= $continueLimit) {
								        break; // Exit the loop if both limits are reached
								    }

								    if ($count < $limit) {
								        echo '<li>
								            	<a href="'.$row['accountid'].'"><img src="user-icon.png"><span>' . $username . '</span></a>
								        		</li>';						 
								        $count++;
								    }
							        foreach ($rows as $otherRow) {
							            $otherId = $otherRow['accountid'];

							            if ($accountid !== $otherId && $sponsorid === $otherRow['sponsorid']) {
							               	
							               
							            }
							        }
							    }
							?>




						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

  <?php 
    include "includes/Script.php";
    include "includes/Footer.php";
  ?>
</body>
</html>