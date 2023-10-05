<?php
    session_start();
    include "msqliconnect/connect.php";
    include "../function/myfunctions.php";

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $accountid = $_POST['accountid'];

        $groupid = $_POST['groupid'];
        $limitedadminid = $_POST['limitedadminid'];
        $usertype = $_POST['usertype'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $uplineid = $_POST['uplineid'];
        
        // Insert user data into the database
        $query = "INSERT INTO `register`(`fname`, `lname`, `address`, `email`, `contact`, `accountid`, `groupid`, `limitedadminid`, `adminid`, `usertype`, `username`, `status`, `password`, `account`, `date`, `off`) 
                  VALUES ('$fname','$lname','$address','$email','$contact','$accountid','$groupid','$limitedadminid','ADMIN-1','$usertype','$username','active account','$password','unblock',CURRENT_TIMESTAMP,'1')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $query = "INSERT INTO `genealogy`(`accountid`, `username`, `uplineid`, `groupid`, `limitedadminid`, `adminid`, `usertype`,`status`, `notif`) 
                  VALUES ('$accountid','$username','$uplineid','$groupid','$limitedadminid','ADMIN-1','$usertype','active','1')";
                  $query_run_1 = mysqli_query($conn, $query);


                  if ($query_run_1) {
                        $query = "INSERT INTO `wallet_balance`(`username`) VALUES ('$username')";
                  $query_run_2 = mysqli_query($conn, $query);
                  if($query_run_2){
                        redirect("Create_account.php", "Account created.");
                  } else{
                    echo "soryy";
                  }
                  }else{
                    echo "soryy";
                  }
        }else{
            echo "soryy";
        }
    }
?>
