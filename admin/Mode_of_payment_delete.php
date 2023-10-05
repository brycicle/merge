<?php
	session_start();
	include "msqliconnect/connect.php";

	if(isset($_POST['delete'])){

		$id = $_POST['mode_of_payment_delete_id'];

		$sql = "DELETE FROM `mode_payment` WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if($result){
			header('Location: Mode_of_payment.php');
		}
	} 
?>