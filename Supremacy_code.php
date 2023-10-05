<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "function/myfunctions.php";

	if(isset($_POST['submit'])){

		$accountid = $_POST['accountid'];
		$username = $_POST['username'];
		$sponsorid = $_POST['sponsorid'];
		$status = $_POST['status'];
		$si_payment = $_POST['si_payment'];
		$limitedadminid = $_POST['limitedadminid'];

		if ($_FILES['upload']['name']) {
		    $file_name = $_FILES['upload']['name'];
		    $file_tmp = $_FILES['upload']['tmp_name'];
    		$file_path = 'SI_Request/' .$username .$file_name ;

    		move_uploaded_file($file_tmp, $file_path);

			$sql = "INSERT INTO `si_request`(`accountid`, `username`, `sponsorid`, `si_payment`, `status`, `upload`, `file_name`, `limitedadminid`) VALUES ('$accountid','$username','$sponsorid','$si_payment','$status','$file_path','$file_name','$limitedadminid')";
				$result = mysqli_query($conn, $sql);

			$sql = "UPDATE register SET si_switch='1' WHERE username='$username'";
				$result_1 = mysqli_query($conn, $sql);

				

				if($result && $result_1){
					redirect("Supremacy_account.php", "Please wait for approval.");
				}
		}
	}
?>