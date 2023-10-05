<?php 
	session_start();
	include "msqliconnect/connect.php";

	if (isset($_POST['submit'])) {
		$bank_name = $_POST['bank_name'];
		$account_name = $_POST['account_name'];
		$account_num = $_POST['account_num'];
		$amount = $_POST['amount'];

		$sql = "INSERT INTO `mode_payment`(`bank_name`, `account_name`, `account_num`, `amount`) VALUES ('$bank_name','$account_name','$account_num','$amount')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			header('Location: Mode_of_payment.php');
		}
	}
	
?>