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
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- Bootstrap JS and Popper.js (Optional) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<title></title>
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	.card {
    max-width: 1100px; /* Set the maximum width for the card */
    margin: 0 auto; /* Center the card on the page */
    margin-top: 20px; /* Add some top margin for spacing */
	border: 2px solid #ccc;
	border-radius: 10px;
	position: relative; 
	box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
	overflow-x: auto;
	white-space: nowrap;
	}
	body { 
		 align-items: center;
		 font-family: 'Poppins', sans-serif;
		 background: #f3f5f4;
	 }
	.tree {
		text-align: center;
		padding-left: 0%;
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
		padding: 5px;
		display: inline-grid;
		border-radius: 5px;
		text-decoration-line: none;
		border-radius: 5px;
		transition: .5s;
	}
	.tree li a img {
		width: 40px;
		height: 40px;
		margin-bottom: 10px !important;
		border-radius: 100px;
		margin: auto;
	}
	.tree li a span {
		border: 1px solid #ccc;
		border-radius: 5px;
		color: #666;
		padding: 8px;
		font-size: 10px;
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
	.spacer {
        white-space: pre;
		font-weight: bold;
    }
	@media (max-width: 768px) {
    .tree ul {
        padding-top: 5px; /* Adjust the padding for smaller screens */
    }
    
    .tree li {
        padding: 0px; /* Adjust the padding for smaller screens */
    }

    .tree li a {
        padding: 0px;
    }

    /* Add more responsive styles as needed */
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
    .table-container {
	    position: relative;
	    width: 100%;
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
	.active_account{
    	color: #3cb371;
    	text-transform: uppercase;
    }
    .input-box{
            margin-left: 5%;
            position: relative;
            height: 44px;
            max-width: 50px;
            width: 100%;
            border-radius: 50px;
            background-color: #e9eaef;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        .input-box.open{
            max-width: 350px;
        }
        input{
            position: relative;
            outline: none;
            border: none;
            height: 100%;
            width: 100%;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 400;
            color: #333;
            background-color: #e9eaef;
        }
        .input-box.open{
            padding: 0 15px 0 65px;
        }
        .icon{
            position: absolute;
            height: 100%;
            top: 0;
            left: 0;
            width: 50px;
            border-radius: 50px;
            display: flex;
            justify-content: center;
            background-color: #2c578f;
        }
        .search-icon,
        .close-icon{
            position: absolute;
            top: 50%;
            font-size: 30px;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        .search-icon{
            color: #fff;
            transform: translateY(-50%) rotate(90deg);
        }
        .input-box.open .search-icon{
            transform: translateY(-50%) rotate(0);
        }
        .close-icon{
            right: -45px;
            color: #000;
            padding: 5px;
            opacity: 0;
            pointer-events: none;
            transform: translateY(-50%);
        }
        .input-box.open .close-icon{
            opacity: 1;
            pointer-events: auto;
            transform: translateY(-50%) rotate(180deg);
        }
        .card {
		    max-width: 1100px;
		    margin: 0 auto;
		    margin-top: 20px;
		    
		    border: 2px solid #ccc;
		    border-radius: 10px;
		    position: relative;
		    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
		    overflow-x: auto;
		    white-space: nowrap;
		}
</style>
<body>
<div class="card">
    <div class="card-body">
	<div class="container">
		<div class="row">
			<div class="tree">
				<?php
					$sponsorid = $_GET['sponsorid'];

            		$id2 =[$sponsorid];
            		$i = 0;
            		for ($i; $i <= 3; $i++) {
                		$temp_id_index = 0;
                		$divide = pow(2, $i);
                ?>
                <ul>

					<?php
						$level2 = 0;
							for ($d = 0; $d < $divide; $d++) {

								
								if (!empty($id2[$d])) {
									$print_id = $id2[$d];
	 
				        			$sql = mysqli_query($conn,"SELECT username FROM genealogy WHERE accountid='$print_id'");
									while($row = mysqli_fetch_array($sql)){
										$username = $row['username'];
									}
												

									if($i == 0){
										echo '<li class="' . (16 / $divide) . '">';
										echo '<a  style = "margin-right: 350px; margin-left: 350px;"  href="View_genealogy.php?sponsorid=' . $print_id . '">';
										echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
										echo '</a>';
										echo '</li>';
									}elseif($i == 1){
										echo '<li class="' . (16 / $divide) . '">';
										echo '<a style = "margin-right: 160px; margin-left: 160px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
										
										echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
										echo '</a>';
										echo '</li>';
									}elseif($i == 2){
										if($level2 == 0){
											echo '<li class="' . (16 / $divide) . '">';
											echo '<a  style = "margin-right: 70px; margin-left: 40px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
											echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
											echo '</a>';
											echo '</li>';
											$level2++;
										}elseif($level2 == 1){
											echo '<li class="' . (16 / $divide) . '">';
											echo '<a  style = "margin-right: 65px; margin-left:40px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
											echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
											echo '</a>';
											echo '</li>';
											$level2++;
										}elseif($level2 == 2){
											echo '<li class="' . (16 / $divide) . '">';
											echo '<a  style = "margin-right: 40px; margin-left:65px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
											echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
											echo '</a>';
											echo '</li>';
											$level2++;
										}elseif($level2 == 3){
											echo '<li class="' . (16 / $divide) . '">';
											echo '<a  style = "margin-right: 40px; margin-left: 70px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
											echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
											echo '</a>';
											echo '</li>';
											$level2++;
										}
									}elseif($i == 3){
										echo '<li class="' . (16 / $divide) . '">';
										echo '<a style = "margin-right: 2px; margin-left: 2px;" href="View_genealogy.php?sponsorid=' . $print_id . '">';
										echo '<img src="../user (2).png"><span>' . $print_id . '<br>' . $username . '</span>';
										echo '</a>';
										echo '</li>';
									}
								} else {
								 
									if($i == 0){
										?>
											<li class="lock-item">
											<a style = "margin-right: 350px; margin-left: 350px;" ><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
											</li>
										<?php
									}elseif($i == 1){

										?>
										<li class="lock-item">
										<a style = "margin-right: 160px; margin-left: 160px;"><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
										</li>
										<?php
									}elseif($i == 2){
										if($level2 == 0){
											?>
											<li class="lock-item">
											<a style = "margin-right: 70px; margin-left: 40px;"><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
											</li>
											<?php
											$level2++;
										}elseif($level2 == 1){
											?>
											<li class="lock-item">
											<a style = "margin-right: 65px; margin-left:40px;"><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
											</li>
											<?php
											$level2++;
										}elseif($level2 == 2){
											?>
											<li class="lock-item">
											<a style = "margin-right: 40px; margin-left:65px;"  ><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
											</li>
											<?php
											$level2++;
										}elseif($level2 == 3){
											?>
											<li class="lock-item">
											<a style = "margin-right: 40px; margin-left: 70px;"   ><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
											</li>
											<?php
											$level2++;
										}
									
									
									}elseif($i == 3){
										?>
										<li class="lock-item">
										<a style = "margin-right: 2px; margin-left: 2px;"   ><img src="../userlock.png"><span class="spacer">      <b>Lock</b>      </span></a>
										</li>
										<?php
									}
								}
						

								// Fetching left and right data - assuming $temp_id is an array
								if (!empty($id2[$d])) {
									for ($p = 0; $p < 2; $p++) {
										$temp_id[$temp_id_index] = fetch_left_right($p, $print_id);
										$temp_id_index++;
									}
								}
							}
					
					// Update $id2 with $temp_id
					$id2 = $temp_id;
					?>
				</ul>

               	<?php
               		}
					function fetch_left_right($side, $agent_id) {
				    	global $conn;

					    if ($side == 0) {
					        $pos = 'leftdownlineid';
					    } else {
					        $pos = 'rightdownlineid';
					    }

					    $stmt = mysqli_prepare($conn, "SELECT $pos FROM genealogy WHERE accountid = ?");
					    mysqli_stmt_bind_param($stmt, "s", $agent_id);
					    mysqli_stmt_execute($stmt);

					    if (!$stmt) {
					        die("Error: " . mysqli_error($conn));
					    }

					    mysqli_stmt_bind_result($stmt, $result);
					    mysqli_stmt_fetch($stmt);

					    mysqli_stmt_close($stmt);

					    return $result;
					}

            	?>
			</div>
		</div>
	</div>
	</div>
</div>

<div class="table-container">
    <table class="ta">
        <thead>
            <tr id="header">
                <th>Account ID</th>
                <th>User Name</th>
                <th>Sponsor ID</th>
                <th>Total Left</th>
                <th>Total Right</th>
                <th>Genealogy</th>
            </tr>
        </thead>

        <?php
        $username = $_SESSION['username'];
        $sponsorid = $_GET['sponsorid'];

        // Define a recursive function to display account details
        function displayAccountDetails($accountId, &$i) {
            global $conn, $username;

            // Check if we have already displayed 14 members
            if ($i > 14) {
                return; // Exit the function if the limit is reached
            }

            // Fetch account details based on the account ID
            $stmt = mysqli_prepare($conn, "SELECT accountid, username, sponsorid, status, left_count, right_count FROM genealogy WHERE accountid = ? ORDER BY username ASC");
            mysqli_stmt_bind_param($stmt, "s", $accountId);
            mysqli_stmt_execute($stmt);

            if (!$stmt) {
                die("Error: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_result($stmt, $accountid, $username, $sponsorid, $status, $left_count, $right_count);
            mysqli_stmt_fetch($stmt);

            // Check if the current username matches the session username
            if ($username !== $_SESSION['username']) {
                // Display the account details in a table row
                echo "<tbody id='data_table'>";
                echo '<tr>';
                echo '<td data-label = "Account ID">' . $accountid . '</td>';
	            echo '<td data-label = "User Name">' . $username . '</td>';
	            echo '<td data-label = "Sponsor ID">' . $sponsorid . '</td>';
	          	echo '<td data-label = "Total Left">'.$left_count.'</td>';
	          	echo '<td data-label = "Total Right">'.$right_count.'</td>';
	            echo '<td data-label = "Action"><a href="Genealogy_view.php?sponsorid='.$accountid.'" class="btn btn-primary">View</a></td>';
                echo '</tr>';
                echo "</tbody>";
            }

            mysqli_stmt_close($stmt);

            // Fetch left and right child accounts recursively using a single query
            $stmt = mysqli_prepare($conn, "SELECT leftdownlineid, rightdownlineid FROM genealogy WHERE accountid = ?");
            mysqli_stmt_bind_param($stmt, "s", $accountId);
            mysqli_stmt_execute($stmt);

            if (!$stmt) {
                die("Error: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_result($stmt, $leftAccountId, $rightAccountId);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if (!empty($leftAccountId)) {
                displayAccountDetails($leftAccountId, $i);
            }

            if (!empty($rightAccountId)) {
                displayAccountDetails($rightAccountId, $i);
            }
        }

        // Start displaying the account details
        $i = 1; // Initialize row count
        displayAccountDetails($sponsorid, $i);
        ?>
    </table>
</div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>