<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
    <div class="mdc-drawer__header">
        <a href="#" class="brand-logo">
            <img class="logo" src="../Logolabel2.png" alt="logo">
        </a>
    </div>
    <?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM register WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
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
                    $status = $row['status'];

                    $disableButton = ($status === 'inactive account') ? "disabled" : "";
                    $link = ($status === 'inactive account') ? '#' : 'Account.php';
                ?>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>" href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-card-atm"></i>
                        Account
                    </a>
                </div>
                
                <?php
                    $status = $row['status'];

                    $disableButton = ($status === 'inactive account') ? "disabled" : "";
                    $link = ($status === 'inactive account') ? '#' : 'Referrals.php?sponsorid='.$row['accountid'].'';
                ?>
                
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>" href="<?php echo htmlspecialchars($link); ?>">
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
                    $link = ($status === 'inactive account') ? '#' : 'Community_franchise.php?sponsorid='.$row['accountid'].'';
                ?>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link <?php echo $disableButton ?>" href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-book-open"></i>
                        Community Franchise
                    </a>
                </div>
                
                <!-- <?php
                    $accountid = $row['accountid'];

                    // Function to count the total number of active members in the genealogy
                    function countActiveMembers($conn, $accountId) {
                        $sql = "SELECT COUNT(*) as memberCount FROM genealogy WHERE sponsorid='$accountId' AND status='active'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $memberCount = $row['memberCount'];

                        // Recursively count active members in the children's genealogy
                        $sql = "SELECT accountid FROM genealogy WHERE sponsorid='$accountId'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $memberCount += countActiveMembers($conn, $row['accountid']);
                        }

                        return $memberCount;
                    }

                    // Count the total number of active members
                    $activeMemberCount = countActiveMembers($conn, $accountid);

                    // Check if the active member count is less than 14
                    if ($activeMemberCount < 14) {
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
                    <a class="mdc-drawer-link <?php echo $disableButton ?>" href="<?php echo htmlspecialchars($link); ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-comment"></i>
                        Supremacy Account
                    </a>
                </div> -->



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