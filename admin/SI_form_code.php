<?php
// Check if a file was submitted through a form
if ($_FILES['pdf_file']['name']) {
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];
    $file_path = 'uploads/' . $file_name; // Assuming you have an 'uploads' folder

    // Move the uploaded file to the desired directory
    move_uploaded_file($file_tmp, $file_path);

    // Save the file details to the database
    $db_host = 'localhost'; // Replace with your database host
    $db_user = 'root'; // Replace with your database username
    $db_pass = ''; // Replace with your database password
    $db_name = 'project'; // Replace with your database name

    // Create a connection to the database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the file details into the database
    $sql = "INSERT INTO pdf_files (file_name, file_path) VALUES ('$file_name', '$file_path')";
    if ($conn->query($sql) === TRUE) {
        header('Location: SI_Form.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
