<?php
    session_start();
    $username = $_SESSION['username'];
    include "msqliconnect/connect.php";

    if(isset($_POST['off'])){

        $sql = "INSERT INTO `withdrawal_set`(`reseter`, `status`) VALUES ('$username','OFF')";
        $sql_run_insert = mysqli_query($conn, $sql);

        $sql_2 = "UPDATE `register` SET `onn`='0',`off`='1',`withdrawal_status`='OFF' WHERE adminid='ADMIN-1'";
        $sql_run_insert_2 = mysqli_query($conn, $sql_2);

        if ($sql_run_insert && $sql_run_insert_2) {
            header('Location: Withdrawal_set.php');
        }
    }
?>