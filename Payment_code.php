<?php 
    session_start();
    include ("function/myfunctions.php");
    include "msqliconnect/connect.php";

    if (isset($_POST['submit'])) {   
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $sponsor_id = $_POST['sponsor_id'];
        $ref_num = $_POST['ref_num'];
        $i = "payment/" . $_FILES['upload']['name'];
        move_uploaded_file($_FILES['upload']['tmp_name'], $i);
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $limitedadminid = $_POST['limitedadminid'];
       
        $payment_query = "INSERT INTO `payment`(`user_id`, `username`, `sponsor_id`, `ref_num`, `upload`, `amount`, `description`, `status`, `limitedadminid`) VALUES ('$user_id','$username','$sponsor_id','$ref_num','$i','$amount','$description','$status','$limitedadminid')";
        $payment_query_run = mysqli_query($conn, $payment_query);

        
        $activate_query = "INSERT INTO `activate_request`(`user_id`, `username`, `sponsor_id`, `ref_num`, `upload`, `amount`, `description`, `status`, `limitedadminid`) VALUES ('$user_id','$username','$sponsor_id','$ref_num','$i','$amount','$description','$status','$limitedadminid')";
        $activate_query_run = mysqli_query($conn, $activate_query);

        $update_query = "UPDATE `register` SET `switch`='1' WHERE `id`='$user_id'";
        $update_query_run = mysqli_query($conn, $update_query);

        

        if ($payment_query_run && $activate_query_run && $update_query_run) {
            redirect("Payment.php", "Please wait for approval.");
        } else {
            // Handle the case when insertion fails in one or both tables
            echo "Error inserting data.";
        }
    }
?>
