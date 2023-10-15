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

					<th>No.</th>
					<th>Account ID</th>
	                <th>User Name</th>
	                <th>Sponsor ID</th>
	                <th>Status</th>

				</tr>
			</thead> 
			

			<?php
			    $username = $_SESSION['username'];
			    $sponsorid = $_GET['sponsorid'];

			    // Define a recursive function to fetch the account details
			    function displayAccountDetails($accountId, &$i) {
			        global $conn, $username;

			        // Check if we have already displayed 14 members
			        if ($i > 14) {
			            return; // Exit the function if the limit is reached
			        }

			        // Fetch account details based on the account ID
			        $stmt = mysqli_prepare($conn, "SELECT accountid, username, sponsorid, status FROM genealogy WHERE accountid = ? ORDER BY username ASC");
			        mysqli_stmt_bind_param($stmt, "s", $accountId);
			        mysqli_stmt_execute($stmt);

			        if (!$stmt) {
			            die("Error: " . mysqli_error($conn));
			        }

			        mysqli_stmt_bind_result($stmt, $accountid, $username, $sponsorid, $status);
			        mysqli_stmt_fetch($stmt);

			        // Check if the current username matches the session username
			        if ($username !== $_SESSION['username']) {
			            // Display the account details in a table row
			            echo '<tr>';
			            echo '<td data-label = "No.">' . $i++ . '</td>';
			            echo '<td data-label = "Account ID">' . $accountid . '</td>';
			            echo '<td data-label = "User Name">' . $username . '</td>';
			            echo '<td data-label = "Sponsor ID">' . $sponsorid . '</td>';
			            echo '<td data-label = "Status"> <b class="active_account">' . $status . ' account</b> </td>';
			            echo '</tr>';
			        }

			        mysqli_stmt_close($stmt);

			        // Fetch left and right child accounts recursively
			        $leftAccountId = fetch_left_right(0, $accountId);
			        $rightAccountId = fetch_left_right(1, $accountId);

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
		</table>
	</div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>