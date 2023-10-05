<?php 
	include "msqliconnect/connect.php";
	if(isset($_POST['check_submit_btn'])){
		$accountid = $_POST['sponsorid_text'];

		$sql = "SELECT * FROM register WHERE accountid = '$accountid'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			if (!empty($accountid)) {
				echo 'Sponsor ID is valid.';
			}
		}
	}
?>
