<?php 
	session_start();
	$username = $_SESSION['username'];
	include "msqliconnect/connect.php";
	include "../function/myfunctions.php";

	if(isset($_POST['submit'])){
		$selected_withdraw = $_POST['selected_withdraw'];
		$amount = $_POST['amount'];

		if ($amount < 5) {
			redirect("Withdrawal.php", "Amount must be 5/above.");
			exit; // Exit the script
		}
		if ($amount > $selected_withdraw) {
			redirect("Withdrawal.php", "Not enough tax payment.");
			exit; // Exit the script
		}
		$total_result = $selected_withdraw - $amount;

		// Update the existing record with the new admin_fee value
		$sql_update = "UPDATE `genealogy` SET `tax`='$total_result' WHERE `usertype`='admin'";
		$sql_run_update = mysqli_query($conn, $sql_update);

		if ($sql_run_update) {
			// Insert a new record with the updated admin_fee value
			$sql_insert = "INSERT INTO `tax_withdraw` (`withdrawal_type`, `withdrawer`, `amount`) VALUES ('Tax Payment','$username','$amount')";
			$sql_run_insert = mysqli_query($conn, $sql_insert);

			if($sql_run_insert){
				redirect("Withdrawal.php", "Successfully withdraw.");
			} else {
				// Handle insertion error here
				echo "Error inserting new record: " . mysqli_error($conn);
			}
		} else {
			// Handle update error here
			echo "Error updating existing record: " . mysqli_error($conn);
		}
	}
?>
