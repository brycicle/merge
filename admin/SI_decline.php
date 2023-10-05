<?php 
	
	session_start();
	include "msqliconnect/connect.php";

	if(isset($_POST['decline'])){

		$id = $_POST['sid_id'];
		$username = $_POST['username'];

		$sql="UPDATE `si_request` SET `status`='Declined', `d_date`=CURRENT_TIMESTAMP WHERE `id`='$id'";
		$result = mysqli_query($conn, $sql);

		$sql="UPDATE `register` SET `si_switch`='0' WHERE `username`='$username'";
		$result = mysqli_query($conn, $sql);

		if($result){
			header('Location: SI_table_waiting.php');
		}
	}

?>