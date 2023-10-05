<?php 
	session_start();
	$username = $_SESSION['username'];
	include "msqliconnect/connect.php";
	if(isset($_POST['check_submit_btn'])){
		$password = $_POST['old_pass_text'];

		$sql = "SELECT * FROM register WHERE password = '$password' AND username='$username'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			echo 'Old Password is Correct.';
		}else{
			echo '';
		}
	}
?>