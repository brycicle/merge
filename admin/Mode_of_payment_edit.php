<?php 
	
	session_start();
	include "msqliconnect/connect.php";

	if(isset($_POST['update'])){

		$id = $_POST['mode_of_payment_id'];

		$bank_name = $_POST['bank_name'];
		$account_name = $_POST['account_name'];
		$account_num = $_POST['account_num'];
		$amount = $_POST['amount'];

		$sql = "UPDATE `mode_payment` SET `bank_name`='$bank_name',`account_name`='$account_name',`account_num`='$account_num',`amount`='$amount' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			header('Location: Mode_of_payment.php');
		}
	}

?>