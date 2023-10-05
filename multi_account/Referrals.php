<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "includes/Header.php";
	include "includes/Navbar.php";
	include "includes/Topbar.php";
?>
<?php 
	  if(isset($_GET['id'])){
	    $main_id = $_GET['id'];
	    $sql_update = mysqli_query($conn,"UPDATE genealogy SET notif=1 WHERE id='$main_id'");
	}
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
	<div class="cl">
	
	</div>
	<div class="table-container">
		 <table class="ta">
        <thead>
            <tr id="header">
                <th>Date</th>
                <th>Account ID</th>
                <th>User Name</th>
                <th>Total CF</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //session_start(); // Add session_start() to start a session if not already started
            //require_once("your_database_connection_file.php"); // Include your database connection file

            $username = $_SESSION['username'];
            $sponsorid = $_GET['sponsorid'];

            $sql = "SELECT accountid, username, status, date FROM register WHERE sponsorid='$sponsorid'";
            $result = mysqli_query($conn, $sql);

            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }

            if (empty($rows)) {
                // If there are no records, display "No Record Found" message
                echo '<tr>';
                echo '<td colspan="5" style="text-align: center;">No Record Found</td>';
                echo '</tr>';
            } else {
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td data-label="Date" style="color: #2c578f;">' . date('M j, o | g:i A', strtotime($row["date"])) . '</td>';
                    echo '<td data-label="Account ID">' . $row['accountid'] . '</td>';
                    echo '<td data-label="User Name">' . $row['username'] . '</td>';
					$username1 = $row['username'];
					$accountid1 = $row['accountid'];
					$available = 14;
					$counter = totalCF($username1,$accountid1);
					$available = $available - $counter;
                    echo '<td data-label="Total CF">' . $counter . ' | '. $available .'</td>';
                    echo '<td data-label="Status">';
                    
                    $status = $row['status'];
                    if ($status == "" || $status == "active account") {
                        echo '<b class="active_account">' . $status . '</b>';
                    } elseif ($status == "inactive account") {
                        echo '<b class="inactive_account">' . $status . '</b>';
                    }

                    echo '</td>';
                    echo '</tr>';
                }
            }

            function totalCF($uname1,$actid1){
				global $conn;
				$sql = mysqli_query($conn, "SELECT * FROM genealogy WHERE username='$uname1'");
				$id2 = [$actid1];
				$counter1 = 0;
				for ($i = 0; $i <= 3; $i++) {
					$temp_id_index = 0;
					$divide = pow(2, $i);

					for ($d = 0; $d < $divide; $d++) {
						
						if (!empty($id2[$d])) {
							$print_id = $id2[$d];
							if ($i == 1) {
								$counter1++;
							} elseif ($i == 2) {
								$counter1++;
							} elseif ($i == 3) {
								$counter1++;
							}
							 

							// Fetching left and right data directly in SQL query
							$stmt = mysqli_prepare($conn, "SELECT leftdownlineid, rightdownlineid FROM genealogy WHERE accountid = ?");
							mysqli_stmt_bind_param($stmt, "s", $print_id);
							mysqli_stmt_execute($stmt);

							if (!$stmt) {
								die("Error: " . mysqli_error($conn));
							}

							mysqli_stmt_bind_result($stmt, $leftdownlineid, $rightdownlineid);
							mysqli_stmt_fetch($stmt);

							mysqli_stmt_close($stmt);

							// Add the left and right downline IDs to the temp_id array
							$temp_id[$temp_id_index] = $leftdownlineid;
							$temp_id_index++;
							$temp_id[$temp_id_index] = $rightdownlineid;
							$temp_id_index++;
						}
					}
					// Update $id2 with $temp_id
					$id2 = $temp_id;
				}
				return $counter1;
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