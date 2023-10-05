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
	body{
        text-align: center   
    }    
    .button-container {
    text-align: center;
    margin-top: 50px;
 
    }

    button {
        padding: 10px 20px;
        background-color: #2c578f;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }
    body {
	    margin: 0;
	    padding: 0;
	}

	.table-container {
	    position: relative;
	    width: 100%;
	}

	table {
	    position: sticky;
	    top: 0;
	    background-color: #ffffff;
	    width: 50%;
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
    	margin-top: 4%;
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
// Assuming you have an active database connection stored in $conn

// Fetch the username from the session
$username = $_SESSION['username'];

// Query to get data from the 'register' table
$sql = "SELECT * FROM register WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check the 'onn' value and set $disableButton and $buttonColor accordingly
        $onn = $row['onn'];
        $disableButton = ($onn === "1") ? "disabled" : "";
        $buttonColor = ($onn === "1") ? "red" : "blue";

        // Display the button based on $disableButton and $buttonColor
        ?>
        <div class="button-container">
            <form action="Withdrawal_set_onn.php" method="post">
                <button class="interactive-button" <?php echo $disableButton; ?> style="background-color: <?php echo $buttonColor; ?>" type="submit" name="onn">Withdrawal SET On</button>
            </form>
        </div>
        <?php
    }
}
?>

<?php
// Re-fetch the username from the session (if needed)
$username = $_SESSION['username'];

// Query to get data from the 'register' table (if needed)
$sql = "SELECT * FROM register WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check the 'off' value and set $disableButton_2 and $buttonColor_2 accordingly
        $off = $row['off'];
        $disableButton_2 = ($off === "1") ? "disabled" : "";
        $buttonColor_2 = ($off === "1") ? "red" : "blue";

        // Display the second button based on $disableButton_2 and $buttonColor_2
        ?>
        <div class="button-container">
            <form action="Withdrawal_set_off.php" method="post">
                <button class="interactive-button" <?php echo $disableButton_2; ?> style="background-color: <?php echo $buttonColor_2; ?>" type="submit" name="off">Withdrawal SET Off</button>
            </form>
        </div>
        <?php
    }
}
?>
<?php 
		$sql = "SELECT * FROM withdrawal_set ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
	?>
	<div class="cl"></div>
	<div class="table-container">
		<table class="ta">
		<thead>
			<tr id="header">

                <th>Setter</th>
                <th>Status</th>
                <th>Date</th>

			</tr>
		</thead>
		<?php    
		    if (mysqli_num_rows($result) > 0) {
		        while($row = mysqli_fetch_assoc($result)) {
        ?>
		<tbody id="data_table">
			<tr>
				<td data-label = "Setter"><?php echo $row['reseter'] ?></td>
				<td data-label = "Status"><?php echo $row['status'] ?></td>
				<td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["date"])); ?></td>	
			</tr>
			<?php 
				}
			} else {
			?>
		    <tr>
		     	<td colspan="3" style="text-align: center;">No Record Found</td>
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
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>