<?php
session_start();
$username2 = $_SESSION['username'];
include ("../function/myfunctions.php");
include "msqliconnect/connect.php";

if (isset($_POST['approve'])) {
    $id = $_POST['approve_id'];
    // Assuming you have the required values for the following variables, otherwise, adjust accordingly.
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $upline_id = $_POST['upline_id'];
    $sponsor_id = $_POST['sponsor_id'];
    $position = $_POST['position'];
    $ref_num = $_POST['ref_num'];
    $upload = $_POST['upload'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $limitedadminid = $_POST['limitedadminid'];

    $query = "INSERT INTO `payment`(`user_id`, `username`, `upline_id`, `sponsor_id`, `ref_num`, `upload`, `amount`, `description`, `status`, `limitedadminid`, `approver`) 
              VALUES ('$user_id','$username','$upline_id','$sponsor_id','$ref_num','$upload','$amount','Payment for Activation Account','Approved','$limitedadminid','$username2')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $inserted_id = $_POST['approve_id'];

        $delete_query = "DELETE FROM `activate_request` WHERE `id` = $inserted_id";
        $delete_result = mysqli_query($conn, $delete_query);
        if($delete_result){

            $update_query = "UPDATE `register` SET `position`='$position' WHERE `id`= $user_id"; 
            $update_result = mysqli_query($conn, $update_query);
            if($update_result){
                redirect("Payment_management.php", "Request approved.");
                exit;
            }else{
                echo "Error";
            }

        }else{
            echo "Not Deleted";
        }
    } else {
        echo "Error";
    }
}
?>
