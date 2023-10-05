<?php
include "msqliconnect/connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `requests` WHERE `id` = '$id';";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $address = $row['address'];
        $email = $row['email'];
        $username = $row['username'];
        $accountid = $row['accountid'];
        $sponsorid = $row['sponsorid'];
        $position = $row['position'];
        $refnum = $row['refnum'];
        $password = $row['password'];
        $upload = $row['upload'];
        $usertype = $row['usertype'];

        $insertQuery = "INSERT INTO `register` (`fname`, `lname`, `address`, `email`, `username`, `accountid`, `sponsorid`, `position`, `refnum`, `password`, `upload`, `usertype`, `date`) 
                        VALUES ('$fname', '$lname', '$address', '$email', '$username', '$accountid', '$sponsorid', '$position', '$refnum', '$password', '$upload', '$usertype', CURRENT_TIMESTAMP)";
        $query_run = mysqli_query($conn, $insertQuery);

        if ($query_run) {
            $deleteQuery = "DELETE FROM `requests` WHERE `id` = '$id';";
            $deleteQuery_run = mysqli_query($conn, $deleteQuery);
            
            if ($deleteQuery_run) {
                echo "Account has been accepted and request with id: $id has been deleted.";
            } else {
                echo "Unknown error occurred while deleting the request.";
            }
        } else {
            echo "Unknown error occurred while inserting data into the register table.";
        }
    } else {
        echo "No request found with the provided id.";
    }
}
?>
