<?php 
session_start();
include "msqliconnect/connect.php";

if(isset($_POST['delete'])){

    $id = $_POST['form_id'];

    $query = "DELETE FROM `pdf_files` WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    
    if ($query_run) 
    {
        header('Location: SI_Form.php');
    } 
    else
    {
        echo '<script> alert("Data Not Delete"); </script>';
    }
}
?>