<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "../function/myfunctions.php";

	if(isset($_POST['submit'])){
		$accountid = $_POST['accountid'];
		// Check if 'id' exists in the POST array
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		} else {
			redirect("Encashment.php?accountid={$accountid}", "Wallet balance zero.");
			exit; // Exit the script
		}
		$usertype = $_POST['usertype'];
		$username = $_POST['username'];
		$amount = $_POST['amount'];
		$tax = $amount * 0.05; // Calculate tax as 5% of the amount
		$net_balance = $amount - $tax;
		$status = $_POST['status'];

		// Check if 'wallet' exists in the POST array
		if (isset($_POST['wallet'])) {
			$wallet = $_POST['wallet'];

			// Check if the amount is $100 or above
			if ($amount < 100) {
				redirect("Encashment.php?accountid={$accountid}", "Amount must be 100/above.");
				exit; // Exit the script
			}

			// Check if the amount is higher than the 'wallet'
			if ($amount > $wallet) {
				redirect("Encashment.php?accountid={$accountid}", "Not enough balance.");
				exit; // Exit the script
			}

			$DRB_result = $wallet - $amount;
		} else {
			// Handle the case where 'wallet' is not provided
			redirect("Encashment.php", "Wallet balance not available.");
			exit; // Exit the script
		}

		$sql = "INSERT INTO `encashment`(`usertype`,`username`, `amount`, `tax`, `net_balance`, `status`) VALUES ('$usertype','$username','$amount','$tax','$net_balance','$status')";
		$result = mysqli_query($conn, $sql);

		if($result){
			$sql = "UPDATE `wallet_balance` SET `wallet`='$DRB_result' WHERE `id`='$id'";
			$result_1 = mysqli_query($conn, $sql);

			if($result_1){
				redirect("Encashment.php?accountid={$accountid}", "Waiting for approval.");
			} else {
				// Handle the case where the SQL query fails
				echo "Error: " . mysqli_error($conn);
			}
		} else {
			// Handle the case where the SQL query fails
			echo "Error: " . mysqli_error($conn);
		}
	}
?>
