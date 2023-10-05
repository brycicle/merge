<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "../function/myfunctions.php";

	if(isset($_POST['update'])){
		$username = $_SESSION['username'];
		$id = $_POST['id'];
		$old_password = $_POST['old_password'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

		$old_pass = "SELECT * FROM register WHERE password='$old_password' AND username='$username'";
        $old_pass_run = mysqli_query($conn, $old_pass);
        if(mysqli_num_rows($old_pass_run) > 0){

        	if($password == $confirmpassword){
				$sql = "UPDATE `register` SET `password`='$password' WHERE id='$id'";
				$result = mysqli_query($conn, $sql);

				if($result){
					redirect("Profile.php", "Updated password.");
				}
			}else{
				redirect("Profile.php", "New and confirm password is not match.");
			}
        
        }else{
        	redirect("Profile.php", "Invalid old password.");
        }
	}
?>