<?php 
    session_start();
    include "msqliconnect/connect.php";
    $username = $_SESSION['username'];
    $s = mysqli_query($conn,"SELECT * FROM register WHERE username='$username'");
    while($row = mysqli_fetch_array($s)){
        $accountid = $row['accountid'];
        // Avoid SQL injection using prepared statement
        $sql = "SELECT id, fname, lname, username FROM register WHERE usertype = ? AND status = ? AND account = ? AND limitedadminid =?";
        $usertype = 'user';
        $status = 'active account';
        $account = 'unblock';
        $limitedadminid = $accountid;

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            die("Error in preparing the statement: " . mysqli_error($conn));
        }
        
        // Bind the parameters and execute the query
        mysqli_stmt_bind_param($stmt, "ssss", $usertype, $status, $account, $limitedadminid);
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the data rows into an array
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        $q = $_REQUEST["q"];
        $matches = [];

        if ($q !== "") {
            $q = strtolower($q);
            foreach ($data as $item) {
                // Use SQL LIKE for a more flexible search
                if (strpos(strtolower($item['username']), $q) !== false) {
                    $matches[] = $item;
                }
            }
        }

        // Close the database connection
        mysqli_close($conn);

        if (empty($matches)) {
            echo "<table class='ta'>";
            echo "<tr class='b'>";
            echo "<td>No results found.</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "<table class='ta'>";
            echo "<thead><tr><th>First Name</th><th>Last Name</th><th>User Name</th><th> Action</th></tr></thead>";
            foreach ($matches as $match) {
                echo "<tr>";
                echo "<td data-label = 'First Name'>" . htmlspecialchars($match['fname']) . "</td>";
                echo "<td data-label = 'Last Name'>" . htmlspecialchars($match['lname']) . "</td>";
                echo "<td data-label = 'User Name'>" . htmlspecialchars($match['username']) . "</td>";
                echo "<td data-label = 'Action'><a class='a' href='Banned_code_block.php?id=" . $match["id"] . "'>Block</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
?>