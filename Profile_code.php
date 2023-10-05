<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "function/myfunctions.php";

	if(isset($_POST['update'])){

		$id = $_POST['id'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

		$sql = "UPDATE `register` SET `email`='$email',`address`='$address',`contact`='$contact' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if($result){
			redirect("Profile.php", "Updated profile.");
		}
	}
?>