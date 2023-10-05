    <?php
// Database connection settings
include "msqliconnect/connect.php";

// Reset pairing count to zero
$sql = "UPDATE genealogy SET pairing_count_AM = 0, pairing_count_PM = 0";
if ($conn->query($sql) === TRUE) {
    echo "Database updated successfully.";
} else {
    echo "Error updating database: " . $conn->error;
}

?>