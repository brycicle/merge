<?php
session_start();
include ("../function/myfunctions.php");
include "msqliconnect/connect.php";

if (isset($_POST['approve'])) {
    $id = $_POST['encashmentapproved_id'];
    $tax = $_POST['tax'];
    $net_balance = $_POST['net_balance'];

    $query = "UPDATE `encashment` SET `status`='Approved',`date_approve`=CURRENT_TIMESTAMP WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE `genealogy` SET `tax`=`tax` + '$tax', `member_payment`=`member_payment` + '$net_balance' WHERE `usertype`='admin'";
    $result_1 = mysqli_query($conn, $query);

    if ($result && $result_1) {
        redirect("Encashment.php", "Request approved.");
        exit;
    } else {
        echo "Error";
    }
}
?>
