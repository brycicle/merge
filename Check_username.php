<?php 
	include "msqliconnect/connect.php";
	if(isset($_POST['check_submit_btn'])){
		$username = $_POST['username_text'];

		$sql = "SELECT * FROM register WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			if (!empty($username)) {
				echo 'Username is already taken.';
			}
		}
	}
?>
