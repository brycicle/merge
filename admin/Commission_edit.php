<?php 
	
	session_start();
	include "msqliconnect/connect.php";

	if(isset($_POST['update'])){

		$id = $_POST['commission_id'];

		$DRB = $_POST['DRB'];
		$pairing_bonus = $_POST['pairing_bonus'];
		$admin_fee = $_POST['admin_fee'];
		$si_payment = $_POST['si_payment'];

		$sql = "UPDATE `commission` SET `DRB`='$DRB',`pairing_bonus`='$pairing_bonus', `admin_fee`='$admin_fee', `si_payment`='$si_payment' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			header('Location: Commission.php');
		}
	}

?>