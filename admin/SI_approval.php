<?php 
	
	session_start();
	include "msqliconnect/connect.php";
	include "../function/myfunctions.php";

	if(isset($_POST['approve'])){

		$id = $_POST['si_id'];
		$si_payment = $_POST['si_payment'];

		$sql="UPDATE `si_request` SET `status`='Approved', `a_date`=CURRENT_TIMESTAMP WHERE `id`='$id'";
		$result = mysqli_query($conn, $sql);

		$sql="UPDATE `genealogy` SET `si_payment`=`si_payment` + '$si_payment' WHERE `usertype`='admin'";
		$result_1 = mysqli_query($conn, $sql);


		if($result && $result_1){
			redirect("SI_table_waiting.php", "Request approved");
		}
	}

?>