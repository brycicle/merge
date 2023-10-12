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
        $filedata = $_FILES['upload']['tmp_name'];
        $filesize = $_FILES['upload']['size'];
        move_uploaded_file($_FILES['upload']['tmp_name'], $i);
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $limitedadminid = $_POST['limitedadminid'];

        $url = '3.1.131.28:8080/payment';
        $data = ['userId' => $user_id, 'username' => $username, 'sponsorId' => $sponsor_id, 'refNum' => $ref_num, 'status' => $status, 'description' => $description, 'limitedAdminId' => $limitedadminid, 'amount' => $amount];

        $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
        $postfields = array("file" => new CURLFile ("$i"), 'userId' => $user_id, 'username' => $username, 'sponsorId' => $sponsor_id, 'refNum' => $ref_num, 'status' => $status, 'description' => $description, 'limitedAdminId' => $limitedadminid, 'amount' => $amount);
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_INFILESIZE => $filesize,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        if(!curl_errno($ch))
        {
            $info = curl_getinfo($ch);
            if ($info['http_code'] == 200)
                redirect("Payment.php", "Please wait for approval.");
        }
        else
        {
            echo "Error inserting data.";
        }
        curl_close($ch);
    }
?>
