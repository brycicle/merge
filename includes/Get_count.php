<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$accountid = $_GET['accountid'];

// Check if the accountid is 'xxxxx' and set count to 0 accordingly
if ($accountid === 'xxxxx') {
    echo "0";
} else {
    // Retrieve the count from your table
    $sql = "SELECT COUNT(*) AS count FROM genealogy WHERE sponsorid = $accountid AND notif = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['count'];
    } else {
        echo "0";
    }
}

$conn->close();
?>
