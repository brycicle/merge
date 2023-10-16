<?php
session_start();
include "msqliconnect/connect.php";
include "includes/Header.php";
include "includes/Navbar.php";
include "includes/Topbar.php";
$username = $_SESSION['username'];
$uplineid = $_GET['uplineid'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title></title>
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .card {
        max-width: 1100px; /* Set the maximum width for the card */
        margin: 0 auto; /* Center the card on the page */
        margin-top: 20px; /* Add some top margin for spacing */
        border: 2px solid #ccc;
        border-radius: 10px;
        position: relative;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
        white-space: nowrap;

    }

    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {


        align-items: center;
        font-family: 'Poppins', sans-serif;
        background: #f3f5f4;
    }

    .tree {
        text-align: center;
        padding-left: 0%;
    }

    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: .5s;
    }

    .tree li {
        display: inline-table;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 10px;
        transition: .5s;
    }

    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #ccc;
        width: 51%;
        height: 10px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 1px solid #ccc;
    }

    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    .tree li:only-child {
        padding-top: 0;
    }

    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }

    .tree li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px;
        display: inline-grid;
        border-radius: 5px;
        text-decoration-line: none;
        border-radius: 5px;
        transition: .5s;
    }

    .tree li a img {
        width: 40px;
        height: 40px;
        margin-bottom: 10px !important;
        border-radius: 100px;
        margin: auto;
    }

    .tree li a span {
        border: 1px solid #ccc;
        border-radius: 5px;
        color: #666;
        padding: 8px;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }

    /*Hover-Section*/
    .tree li a:hover, .tree li a:hover i, .tree li a:hover span, .tree li a:hover + ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }

    .tree li a:hover + ul li::after, .tree li a:hover + ul li::before, .tree li a:hover + ul::before, .tree li a:hover + ul ul::before {
        border-color: #94a0b4;
    }

    .disabled-link {
        pointer-events: none;
        color: gray;
        text-decoration: none;
        cursor: default;
    }

    .spacer {
        white-space: pre;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .tree ul {
            padding-top: 5px; /* Adjust the padding for smaller screens */
        }

        .tree li {
            padding: 0px; /* Adjust the padding for smaller screens */
        }

        .tree li a {
            padding: 0px;
        }

        /* Add more responsive styles as needed */
    }

    @media (max-width: 768px) {
        .ta {
            max-width: 450px;
            margin-bottom: 10%;
        }

        .ta thead {
            display: none;
        }

        .ta, .ta tbody, .ta tr, .ta td {
            display: block;
            width: 100%;
        }

        .ta tr {
            margin-bottom: 15px;
        }

        .ta tbody tr td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .ta td:before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
        }
    }


    .table-container {
        position: relative;
        width: 100%;
        overflow: auto;
    }

    table {
        position: sticky;
        top: 0;
        background-color: #ffffff;
        width: 90%;
        margin: 0 auto;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }

    th {
        position: sticky;
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    td {
        background-color: #fff;
        color: #000;
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    td a {
        text-decoration: none;
    }

    #header {
        background-color: #2c578f;
        color: #fff;
    }

    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
    }

    .active_account {
        color: #3cb371;
        text-transform: uppercase;
    }

    .back-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 18px;
        border-radius: 7px;
        bottom: 10px;
        margin-top: 10px;
        margin-left: 50px;
    }

    .back-button:hover {
        background-color: #0056b3;
    }

    .card {
        max-width: 1100px;
        margin: 0 auto;
        margin-top: 20px;

        border: 2px solid #ccc;
        border-radius: 10px;
        position: relative;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
<?php
$level1 = array();
$level2 = array();
$level3 = array();
$level4 = array();

$query = "SELECT * FROM genealogy WHERE accountid='$uplineid'";

if ($result = mysqli_query($conn, $query)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level1, $obj);
    }
    mysqli_free_result($result);
} else {
    $level1[] = $object = (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null];
}

$accountId = $level1[0]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if ($result = mysqli_query($conn, $query)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level2, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level2, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}
$accountId = $level1[0]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if ($result = mysqli_query($conn, $query)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level2, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level2, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level2[0]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level3, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level3, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level2[0]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level3, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level3, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level2[1]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level3, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level3, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level2[1]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level3, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level3, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}


//Level 4
$accountId = $level3[0]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[0]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[1]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[1]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}
//
//
$accountId = $level3[2]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[2]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[3]->leftdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}

$accountId = $level3[3]->rightdownlineid;
$query = "SELECT * FROM genealogy WHERE accountid='$accountId'";
if (($result = mysqli_query($conn, $query)) && ($accountId !== null)) {
    while ($obj = mysqli_fetch_object($result)) {
        array_push($level4, $obj);
    }
    mysqli_free_result($result);
} else {
    array_push($level4, (object)['accountid' => null, 'leftdownlineid' => null, 'rightdownlineid' => null]);
}
?>
<body>
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="tree">
                    <ul>
                        <li class="16">
                            <a style="margin-right: 350px; margin-left: 350px;"
                               href="View_genealogy.php?uplineid=<?php echo $level1[0]->accountid ?>">
                                <img src="../user (2).png"/>
                                <span><?php echo $level1[0]->accountid ?><br><?php echo $level1[0]->username ?></span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <?php foreach ($level2 as $account) { ?>
                            <?php if ($account->accountid !== null) { ?>
                                <li class="8">
                                    <a style="margin-right: 160px; margin-left: 160px;"
                                       href="View_genealogy.php?uplineid=<?php echo $account->accountid ?>">
                                        <img src="../user (2).png"/>
                                        <span><?php echo $account->accountid ?><br><?php echo $account->username ?></span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="lock-item">
                                    <a style="margin-right: 160px; margin-left: 160px;">
                                        <img src="../userlock.png"/><span class="spacer"><b>Lock</b</span>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                    <ul>
                        <?php foreach ($level3 as $account) { ?>
                            <?php if ($account->accountid !== null) { ?>
                                <li class="4">
                                    <a style="margin-right: 40px; margin-left: 40px;"
                                       href="View_genealogy.php?uplineid=<?php echo $account->accountid ?>">
                                        <img src="../user (2).png"/>
                                        <span><?php echo $account->accountid ?><br><?php echo $account->username ?></span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="lock-item">
                                    <a style="margin-right: 40px; margin-left: 70px;"><img src="../userlock.png"><span
                                                class="spacer"><b>Lock</b></span></a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                    <ul>
                        <?php foreach ($level4 as $account) { ?>

                            <?php if ($account->accountid !== null) { ?>
                                <li class="2">
                                    <a style="margin-right: 2px; margin-left: 2px;"
                                       href="View_genealogy.php?uplineid=<?php echo $account->accountid ?>">
                                        <img src="../user (2).png"/>
                                        <span><?php echo $account->accountid ?><br><?php echo $account->username ?></span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="lock-item">
                                    <a style="margin-right: 2px; margin-left: 2px;"><img src="../userlock.png"><span
                                                class="spacer"<b>Lock</b></span></a>
                                </li>
                            <?php }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "includes/Script.php";
include "includes/Footer.php";
?>
<div class="table-container">
    <table class="ta">
        <thead>
        <tr id="header">
            <th>Account ID</th>
            <th>User Name</th>
            <th>Sponsor ID</th>
            <th>Total Left</th>
            <th>Total Right</th>
            <th>Genealogy</th>
        </tr>
        </thead>

        <?php
        $username = $_SESSION['username'];
        $sponsorid = $_GET['sponsorid'];

        // Define a recursive function to display account details
        function displayAccountDetails($accountId, &$i)
        {
            global $conn, $username;

            // Check if we have already displayed 14 members
            if ($i > 14) {
                return; // Exit the function if the limit is reached
            }

            // Fetch account details based on the account ID
            $stmt = mysqli_prepare($conn, "SELECT accountid, username, sponsorid, status, left_count, right_count FROM genealogy WHERE accountid = ? ORDER BY username ASC");
            mysqli_stmt_bind_param($stmt, "s", $accountId);
            mysqli_stmt_execute($stmt);

            if (!$stmt) {
                die("Error: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_result($stmt, $accountid, $username, $sponsorid, $status, $left_count, $right_count);
            mysqli_stmt_fetch($stmt);

            // Check if the current username matches the session username
            if ($username !== $_SESSION['username']) {
                // Display the account details in a table row
                echo "<tbody id='data_table'>";
                echo '<tr>';
                echo '<td data-label = "Account ID">' . $accountid . '</td>';
                echo '<td data-label = "User Name">' . $username . '</td>';
                echo '<td data-label = "Sponsor ID">' . $sponsorid . '</td>';
                echo '<td data-label = "Total Left">' . $left_count . '</td>';
                echo '<td data-label = "Total Right">' . $right_count . '</td>';
                echo '<td data-label = "Action"><a href="Genealogy_view.php?sponsorid=' . $accountid . '" class="btn btn-primary">View</a></td>';
                echo '</tr>';
                echo "</tbody>";
            }

            mysqli_stmt_close($stmt);

            // Fetch left and right child accounts recursively using a single query
            $stmt = mysqli_prepare($conn, "SELECT leftdownlineid, rightdownlineid FROM genealogy WHERE accountid = ?");
            mysqli_stmt_bind_param($stmt, "s", $accountId);
            mysqli_stmt_execute($stmt);

            if (!$stmt) {
                die("Error: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_result($stmt, $leftAccountId, $rightAccountId);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if (!empty($leftAccountId)) {
                displayAccountDetails($leftAccountId, $i);
            }

            if (!empty($rightAccountId)) {
                displayAccountDetails($rightAccountId, $i);
            }
        }

        // Start displaying the account details
        $i = 1; // Initialize row count
        displayAccountDetails($sponsorid, $i);
        ?>
    </table>
</div>
</body>
</html>