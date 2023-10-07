<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
    <div class="mdc-drawer__header">
        <a href="#" class="brand-logo">
            <img class="logo" src="Logolabel2.png" alt="logo">
        </a>
    </div>
    <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM register WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="mdc-drawer__content">
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="Dashboard.php">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-dashboard"></i>
                        Dashboard
                    </a>
                </div>

                <?php
                // Replace $accountStatus with the actual variable that holds the account status.
                $status = $row['status']; // You should fetch the actual status here.

                // Check if the account status is not "active account" before displaying the link.
                if ($status !== 'active account') {
                    ?>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Payment.php">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                               aria-hidden="true">payment</i>
                            Payment
                        </a>
                    </div>
                    <?php
                }
                ?>



                <?php
                $position = $row['position'];

                $disableButton = ($position === '') ? "disabled" : "";
                $link = ($position === '') ? '#' : 'Activate_account.php';
                // Replace $accountStatus with the actual variable that holds the account status.
                $status = $row['status']; // You should fetch the actual status here.

                // Check if the account status is not "active account" before displaying the link.
                if ($status !== 'active account') {
                    ?>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link <?php echo $disableButton ?>"
                           href="<?php echo htmlspecialchars($link); ?>">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                               aria-hidden="true">payment</i>
                            Activate Account
                        </a>
                    </div>
                    <?php
                }
                ?>
                <?php
                $status = $row['status'];

                $disableButton = ($status === 'inactive account') ? "disabled" : "";
                $link = ($status === 'inactive account') ? '#' : 'Account.php';
                ?>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>"
                       href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-card-atm"></i>
                        Account
                    </a>
                </div>

                <?php
                $status = $row['status'];

                $disableButton = ($status === 'inactive account') ? "disabled" : "";
                $link = ($status === 'inactive account') ? '#' : 'Referrals.php?sponsorid=' . $row['accountid'] . '';
                ?>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>"
                       href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-coins"></i>
                        Referrals
                    </a>
                </div>

                <!-- <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-drawer-link" href="Genealogy.php">
                     <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-sitemap"></i>
                     Genealogy
                   </a>
             </div> -->

                <?php
                $status = $row['status'];

                $disableButton = ($status === 'inactive account') ? "disabled" : "";
                $link = ($status === 'inactive account') ? '#' : 'Community_franchise.php?sponsorid=' . $row['accountid'] . '';
                ?>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>"
                       href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-book-open"></i>
                        Community Franchise
                    </a>
                </div>
                <?php
                $username = $_SESSION['username'];
                $sponsorid = $row['accountid'];

                // Fetch account details based on the account ID
                function fetchAccountDetails($accountId, $conn)
                {
                    $stmt = mysqli_prepare($conn, "SELECT accountid, username, sponsorid, status FROM genealogy WHERE accountid = ? ORDER BY username ASC");
                    mysqli_stmt_bind_param($stmt, "s", $accountId);
                    mysqli_stmt_execute($stmt);

                    if (!$stmt) {
                        die("Error: " . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_result($stmt, $accountid, $username, $sponsorid, $status);
                    mysqli_stmt_fetch($stmt);

                    mysqli_stmt_close($stmt);

                    return compact('accountid', 'username', 'sponsorid', 'status');
                }

                // Fetch left or right child accounts
                function fetchLeftRight($side, $agent_id, $conn)
                {
                    if ($side == 0) {
                        $pos = 'leftdownlineid';
                    } else {
                        $pos = 'rightdownlineid';
                    }

                    $stmt = mysqli_prepare($conn, "SELECT $pos FROM genealogy WHERE accountid = ?");
                    mysqli_stmt_bind_param($stmt, "s", $agent_id);
                    mysqli_stmt_execute($stmt);

                    if (!$stmt) {
                        die("Error: " . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_result($stmt, $result);
                    mysqli_stmt_fetch($stmt);

                    mysqli_stmt_close($stmt);

                    return $result;
                }

                // Initialize row count
                $i = 0;

                // Create a stack to hold the account IDs to be processed
                $stack = array($sponsorid);

                while (!empty($stack)) {
                    $accountId = array_pop($stack);

                    // Increment the count for each member processed
                    $i++;

                    // Fetch left and right child accounts and push them onto the stack
                    $leftAccountId = fetchLeftRight(0, $accountId, $conn);
                    if (!empty($leftAccountId)) {
                        array_push($stack, $leftAccountId);
                    }

                    $rightAccountId = fetchLeftRight(1, $accountId, $conn);
                    if (!empty($rightAccountId)) {
                        array_push($stack, $rightAccountId);
                    }
                }
                // Check if the active member count is less than 14
                if ($i < 15) {
                    // Add JavaScript to display a styled popup message
                    echo "<script>
                            function showPopup() {
                                var popupMessage = 'You do not have enough active members <br>from the community franchise to access Supremacy Account.';
                                var popupContainer = document.createElement('div');
                                popupContainer.classList.add('popup-container');
                                
                                var popupContent = document.createElement('div');
                                popupContent.classList.add('popup-content');
                                
                                var message = document.createElement('p');
                                message.innerHTML = popupMessage; // Use innerHTML to render the line break
                    
                                var closeButton = document.createElement('button');
                                closeButton.textContent = 'OK';
                                closeButton.addEventListener('click', function() {document.body.removeChild(popupContainer);});
                            
                                popupContent.appendChild(message);
                                popupContent.appendChild(closeButton);
                                popupContainer.appendChild(popupContent);
                                
                                document.body.appendChild(popupContainer);
                            };
                            </script>";

                    // Disable the link and call the showPopup() function on click
                    $disableButton = "disabled";
                    $link = "javascript:showPopup();";
                } else {
                    // Continue with your code
                    $status = $row['status']; // Assuming you have $row['status'] defined elsewhere
                    $disableButton = ($status === 'inactive account') ? "disabled" : "";
                    $link = ($status === 'inactive account') ? '#' : 'Supremacy_account.php';
                }
                ?>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>"
                       href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-comment"></i>
                        Supremacy Account
                    </a>
                </div>


                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="Logout.php">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-signout"></i>
                        Logout
                    </a>
                </div>
                <?php
                }
                }
                ?>
            </nav>
        </div>
    </div>
</aside>