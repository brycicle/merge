<?php
session_start();
include "msqliconnect/connect.php";
include "../function/myfunctions.php";

if(isset($_POST['submit'])) {
    $accountid = $_POST['accountid'];
    $username = $_POST['username'];
    $DRB = $_POST['DRB'];
    $pairing = $_POST['pairing'];
    $wallet = $DRB + $pairing;
    $pairing_result = '0';
    $DRB_result = '0';

    // Check if both DRB and pairing are greater than zero

        $sql = "SELECT `groupid` FROM `genealogy` WHERE `accountid`='$accountid'";
        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $groupid = $row['groupid'];

            $sql = "UPDATE `wallet_balance` SET `wallet` = `wallet` + '$wallet', `DRB` = `DRB` + '$DRB', `pairing` = `pairing` + '$pairing' WHERE username = '$username'";
            $result_1 = mysqli_query($conn, $sql);

            if($result_1) {

                $sql = "UPDATE `genealogy` SET `pairing`='$pairing_result', `DRB`='$DRB_result' WHERE `groupid`='$groupid'";
                $result_2 = mysqli_query($conn, $sql);

                if($result_2) {

                    redirect("Encashment.php?accountid={$accountid}", "Successfully moved to wallet.");
                    
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "No matching record found for accountid: " . $accountid;
        }
    
}
?>
