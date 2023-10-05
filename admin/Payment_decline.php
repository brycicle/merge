<?php
session_start();
$username2 = $_SESSION['username'];
include "msqliconnect/connect.php";

if (isset($_POST['decline'])) {
    $id = $_POST['hiddenID'];

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

    $query = "INSERT INTO `payment`(`user_id`, `username`, `upline_id`, `sponsor_id`, `position`, `ref_num`, `upload`, `amount`, `description`, `status`,  `limitedadminid`, `approver`) 
              VALUES ('$user_id','$username','$upline_id','$sponsor_id','$position','$ref_num','$upload','$amount','$description','$status','$limitedadminid','$username2')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $inserted_id = $_POST['hiddenID'];

        $delete_query = "DELETE FROM `activate_request` WHERE `id` = $inserted_id";
        $delete_result = mysqli_query($conn, $delete_query);
        if($delete_result){
            $update_query = "UPDATE `register` SET `switch`='0' WHERE `id`='$user_id'";
            $update_query_run = mysqli_query($conn, $update_query);
            if ($update_query_run) {
               header('Location: Payment_management.php');
                exit; 
            }else{
                echo "error";
            }
        
        }else{
            echo "Not Deleted";
        }
    } else {
        echo "Error";
    }
}
?>
