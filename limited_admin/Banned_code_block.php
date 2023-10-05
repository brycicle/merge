<?php
session_start();
include "msqliconnect/connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE `register` SET `account`='block', `bl_date`=CURRENT_TIMESTAMP WHERE `id` = '$id';";
    $result = mysqli_query($conn, $query);
}
if($result){
    header('Location: Banned_account.php');
}
?>