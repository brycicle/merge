<?php
    session_start();
    include "msqliconnect/connect.php";

    if (isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $sponsorid = $_POST['sponsorid'];
        $username = $_POST['username'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $usertype = $_POST['usertype'];
        $account = $_POST['account'];
        $accountid = $_POST['accountid'];

        // Check if sponsor ID is valid
        $sponsorid_query = "SELECT * FROM register WHERE accountid='$sponsorid'";
        $sponsorid_query_run = mysqli_query($conn, $sponsorid_query);

        if (mysqli_num_rows($sponsorid_query_run) <= 0) {
            $_SESSION['status'] = "Sponsor ID is Invalid";
            $_SESSION['status_code'] = "warning";
            header('Location: Signup.php');
            exit;
        }

        // Fetch the sponsor's data to get groupid and limitedadminid
        $sponsor_data = mysqli_fetch_assoc($sponsorid_query_run);
        $groupid = $sponsor_data['groupid'];
        $limitedadminid = $sponsor_data['limitedadminid'];
        $adminid = $sponsor_data['adminid'];

        // Check if username already exists
        $username_query = "SELECT * FROM register WHERE username='$username'";
        $username_query_run = mysqli_query($conn, $username_query);

        if (mysqli_num_rows($username_query_run) > 0) {
            $_SESSION['status'] = "Username already exists";
            $_SESSION['status_code'] = "warning";
            header('Location: Signup.php');
            exit;
        }

        // Check if passwords match
        if ($password != $confirmpassword) {
            $_SESSION['status'] = "Password and Confirm Password do not match";
            $_SESSION['status_code'] = "warning";
            header('Location: Signup.php');
            exit;
        }

        
        // Insert user data into the database
        $query = "INSERT INTO `register`(`fname`, `lname`, `address`, `email`, `contact`, `sponsorid`, `groupid`, `limitedadminid`, `adminid`, `username`, `status`, `password`, `usertype`, `account`, `accountid`, `date`) 
                  VALUES ('$fname','$lname','$address','$email','$contact','$sponsorid','$groupid','$limitedadminid','$adminid','$username','$status','$password','$usertype','$account','$accountid',CURRENT_TIMESTAMP)";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['status'] = "Successfully Registered.";
            $_SESSION['status_code'] = "success";
            header('Location: Signin.php');
        } else {
            $_SESSION['status'] = "Sorry, please try again";
            $_SESSION['status_code'] = "error";
            header('Location: Signup.php');
        }
    }
?>
