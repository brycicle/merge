<?php
session_start();
include "msqliconnect/connect.php";
include ("function/myfunctions.php");
$i = 0;
$j = 0;
$accountIDs = array();
$num = 0;
if (isset($_POST['submit'])) {
    $sponsorid = $_POST['sponsorid'];
    $id = $_POST['id'];
    $accountid = $_POST['accountid'];
    $username = $_POST["username"];
    $groupid = $_POST["groupid"];
    $limitedadminid = $_POST["limitedadminid"];
    $adminid = $_POST["adminid"];
    $payin = $_POST['payin'];
    $admin_fee = $_POST['admin_fee'];


    $insert = "UPDATE `genealogy` SET `admin_fee`= `admin_fee` + '$admin_fee' WHERE `usertype`='admin'";
    $insert_run = mysqli_query($conn, $insert);
    if ($insert_run) {
        $sql = "UPDATE `register` SET `status`='active account', `accountid`='$accountid' WHERE  `id`='$id'";
        $sql_run = mysqli_query($conn, $sql);
        if($sql_run){
            $sql = "SELECT *  FROM genealogy WHERE accountid = '$sponsorid'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row['leftdownlineid'] === null) {
                    //CODE FOR AUTO DIRECT REFERRAL LEFT
                    $sql = "UPDATE genealogy SET leftdownlineid = ? WHERE accountid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $accountid, $sponsorid);
                    if ($stmt->execute()) {
                        //echo "Record updated successfully the leftdownlineid.";
                        $position = "left";
                        $usertype = "user";
                        $sql = "INSERT INTO genealogy (accountid, username, sponsorid, uplineid, position, usertype, groupid, limitedadminid, adminid, payin, status, notif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active', '0')";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssssssss", $accountid, $username, $sponsorid, $sponsorid, $position, $usertype, $groupid, $limitedadminid, $adminid, $payin);
                        if ($stmt->execute()) {
                            DirectReferralBonus($sponsorid);

                            PairingBonus($sponsorid,$position);

                            redirect("Account.php", "Account activated.");
                            $num = 0;
                        } else {echo "Error inserting records: " . $stmt->error;}

                    } else {echo "Error updating record: " . $stmt->error;}

                    $stmt->close();
                } elseif($row['leftdownlineid'] !== null) {
                    $accountIDs[$i] = $row["leftdownlineid"];
                    $num = 1;
                }

                mysqli_free_result($result);

            } else {
                echo "Record with accountid = $sponsorid does not exist.";
            }
            if($num == 1){

                $sql = "SELECT *  FROM genealogy WHERE accountid = '$sponsorid'";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    $row = mysqli_fetch_assoc($result);
                    if ($row['leftdownlineid'] !== null and $row['rightdownlineid'] === null) {
                        //echo "right account";
                        $sql = "UPDATE genealogy SET rightdownlineid = ? WHERE accountid = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $accountid, $sponsorid);
                        if ($stmt->execute()) {
                            //echo "Record updated successfully the leftdownlineid.";
                            $position = "right";
                            $usertype = "user";
                            // Insert data into the "genealogy" table
                            $sql = "INSERT INTO genealogy (accountid, username, sponsorid, uplineid, position, usertype, groupid, limitedadminid, adminid, payin, status, notif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active', '0')";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssssssssss", $accountid, $username, $sponsorid, $sponsorid, $position, $usertype, $groupid, $limitedadminid, $adminid, $payin);
                            if ($stmt->execute()) {
                                DirectReferralBonus($sponsorid);

                                PairingBonus($sponsorid,$position);

                                redirect("Account.php", "Account activated.");
                                $num = 0;

                            } else {echo "Error inserting records: " . $stmt->error;}

                        } else {echo "Error updating record: " . $stmt->error;}

                        $stmt->close();
                    } elseif ($row['leftdownlineid'] !== null and $row['rightdownlineid'] !== null){
                        $i = $i + 1;
                        $accountIDs[$i] = $row["rightdownlineid"];
                        //echo "<br>add record to arrays right <br>";
                        //  echo "value of array " . $accountIDs[$i] ;
                        $num = 2;
                    }
                    mysqli_free_result($result);

                } else {
                    echo "Record with accountid = $sponsorid does not exist.";
                }
            }

            //SPILL OVER CODES for LEFT

            $stop = 1;
            if($num == 2){
                While($stop != 2){
                    $sql = "SELECT *  FROM genealogy WHERE accountid = '$accountIDs[$j]'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // echo "<br>NICE accountid = ". $accountIDs[$j];
                        $row = mysqli_fetch_assoc($result);
                        if ($row['leftdownlineid'] === null) {
                            //CODE FOR AUTO DIRECT REFERRAL LEFT
                            $sql = "UPDATE genealogy SET leftdownlineid = ? WHERE accountid = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $accountid, $accountIDs[$j]);
                            if ($stmt->execute()) {
                                //echo "Record updated successfully the leftdownlineid.";
                                $position = "left";
                                $usertype = "user";
                                $sql = "INSERT INTO genealogy (accountid, username, sponsorid, uplineid, position, usertype, groupid, limitedadminid, adminid, payin, status, notif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active', '0')";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ssssssssss",$accountid, $username, $sponsorid, $accountIDs[$j], $position, $usertype, $groupid, $limitedadminid, $adminid, $payin);
                                if ($stmt->execute()) {
                                    DirectReferralBonus($sponsorid);

                                    PairingBonus($accountIDs[$j],$position);
                                    redirect("Account.php", "Account activated.");
                                    $stop = 2;
                                    break;
                                } else {echo "Error inserting records: " . $stmt->error;}

                            } else {echo "Error updating record: " . $stmt->error;}

                            $stmt->close();
                        } elseif($row['leftdownlineid'] !== null  and $row['rightdownlineid'] !== null) {
                            $i = $i + 1;
                            $accountIDs[$i] = $row["leftdownlineid"];
                        }

                        mysqli_free_result($result);
                    } else {
                        echo "<br> Record with accountid = $sponsorid does not exist.";
                    }

                    //SPILL OVER CODES for RIGHT

                    $sql = "SELECT *  FROM genealogy WHERE accountid = '$accountIDs[$j]'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // echo "<br>NICE accountid = ". $accountIDs[$j];
                        $row = mysqli_fetch_assoc($result);
                        if ($row['leftdownlineid'] !== null and $row['rightdownlineid'] === null) {
                            //CODE FOR AUTO DIRECT REFERRAL RIGHT
                            $sql = "UPDATE genealogy SET rightdownlineid = ? WHERE accountid = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $accountid, $accountIDs[$j]);
                            if ($stmt->execute()) {
                                //echo "Record updated successfully the leftdownlineid.";
                                $position = "right";
                                $usertype = "user";
                                $sql = "INSERT INTO genealogy (accountid, username, sponsorid, uplineid, position, usertype, groupid, limitedadminid, adminid, payin, status, notif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active', '0')";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ssssssssss", $accountid, $username, $sponsorid, $accountIDs[$j], $position, $usertype, $groupid, $limitedadminid, $adminid, $payin);
                                if ($stmt->execute()) {
                                    DirectReferralBonus($sponsorid);

                                    PairingBonus($accountIDs[$j],$position);
                                    redirect("Account.php", "Account activated.");
                                    $stop = 2;
                                    break;
                                } else {echo "Error inserting records: " . $stmt->error;}

                            } else {echo "Error updating record: " . $stmt->error;}
                            $stmt->close();
                        } elseif($row['leftdownlineid'] !== null and $row['rightdownlineid'] !== null) {
                            $i = $i + 1;
                            $accountIDs[$i] = $row["rightdownlineid"];
                            //  echo "<br> add record to arrays right <br>";
                            //  echo "value of array " . $accountIDs[$i] ;
                        }

                        mysqli_free_result($result);
                        // $conn->close();
                    } else {
                        break;
                    }
                    $j = $j + 1;

                }
            }
        } else {
            echo 'error';
        }
    }

}
function DirectReferralBonus($sponsorid) {
    global $conn;
    $DRB = $_POST['DRB'];

    $bonusAmount = $DRB; // $200 bonus
    $sql = "SELECT DRB FROM genealogy WHERE AccountID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sponsorid);
    $stmt->execute();
    $result = $stmt->get_result();
    //$result = $stmt->fetch($sql);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $DRBValue = $row['DRB']; // Retrieve the value from the result

    } else {
        echo "No data found for Sponsor ID: $sponsorid";
        return false;
    }
    $newDRBValue = $DRBValue + $bonusAmount;
    // Update the user's balance to award the bonus
    $updateSql = "UPDATE genealogy SET DRB = ? WHERE AccountID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ds", $newDRBValue, $sponsorid);

    if ($updateStmt->execute()) {
        return true; // Bonus awarded successfully
    } else {
        echo "Bonus award failed";
        return false; // Bonus award failed
    }
}

function PairingBonus($uplineID1, $side) {
    global $conn;
    $pairing_bonus = $_POST['pairing_bonus'];
    // Check if the side is valid
    if ($side !== "left" && $side !== "right") {
        echo "<br>Invalid side: $side";
        return;
    }


    // Update the corresponding side count
    $sideColumn = ($side === "left") ? "left_count" : "right_count";
    $sql = "UPDATE genealogy SET $sideColumn = $sideColumn + 1 WHERE accountid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uplineID1);
    $stmt->execute();

    // Fetch the user's data
    $sql = "SELECT * FROM genealogy WHERE accountid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uplineID1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $leftCount = $row['left_count'];
        $rightCount = $row['right_count'];
        $uplineID3 = $row['uplineid'];
        $pairingCountAM = $row['pairing_count_AM'];
        $pairingCountPM = $row['pairing_count_PM'];

        // Define the desired time zone (e.g., 'Asia/Manila' for the Philippines)
        $timeZone = new DateTimeZone('Asia/Manila');

        // Create a DateTime object for the current time in the specified time zone
        $currentTime = new DateTime('now', $timeZone);
        $currentHour = (int)$currentTime->format('H'); // Extract the current hour
        $currentMinute = (int)$currentTime->format('i'); // Extract the current minute

        // Start 8:01 AM to 7:59 PM
        if (($currentHour >= 8 && $currentMinute >= 1) && ($currentHour <= 19 && $currentMinute <= 59)) {
            if ($pairingCountAM <= 9) {
                // Update the Pairing add 1
                if (($side === "left" && $leftCount <= $rightCount) || ($side === "right" && $rightCount <= $leftCount)) {
                    $updateSql = "UPDATE genealogy SET pairing = pairing + $pairing_bonus, pairing_count_AM = pairing_count_AM + 1 WHERE accountid = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("s", $uplineID1);
                    $updateStmt->execute();

                }
            } else {
                if(($side === "left" && $leftCount <= $rightCount) || ($side === "right" && $rightCount <= $leftCount)) {
                    $updateSql = "UPDATE genealogy SET left_count = 0, right_count = 0 WHERE accountid = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("s", $uplineID1);
                    $updateStmt->execute();

                }
            }
        } elseif(($currentHour >= 20 && $currentMinute >= 0) || ($currentHour < 8)) {
            // Start 8:00 PM to 7:59 AM
            if ($pairingCountPM <= 9) {
                // Update the Pairing add 1
                if (($side === "left" && $leftCount <= $rightCount) || ($side === "right" && $rightCount <= $leftCount)) {
                    $updateSql = "UPDATE genealogy SET pairing = pairing + $pairing_bonus, pairing_count_PM = pairing_count_PM + 1 WHERE accountid = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("s", $uplineID1);
                    $updateStmt->execute();
                }
            }else{
                if(($side === "left" && $leftCount <= $rightCount) || ($side === "right" && $rightCount <= $leftCount)) {
                    $updateSql = "UPDATE genealogy SET left_count = 0, right_count = 0 WHERE accountid = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("s", $uplineID1);
                    $updateStmt->execute();
                }
            }

        }

        // Recursively call PairingBonus for the parent if it's not the head account
        if ($uplineID3 != "ADMIN-1") {
            $sql = "SELECT * FROM genealogy WHERE accountid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $uplineID3);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $position3 = $row['position'];
                PairingBonus($uplineID3, $position3);
            }
        }else{
            return;
        }
    }

}
$conn->close();
?>
