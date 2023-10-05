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
          <a class="mdc-drawer-link" href="Dashboard.php?accountid=<?php echo $row['accountid'] ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-dashboard"></i>
            Dashboard
          </a>
        </div>

        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="Payment-Management">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">payment</i>
            Payment
            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
          </a>
          <div class="mdc-expansion-panel" id="Payment-Management">
            <nav class="mdc-list mdc-drawer-submenu">
             <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link " href="Payment_waiting.php">
                    Payment Waiting
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link " href="Payment_approved.php">
                    Payment Approved
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link " href="Payment_declined.php">
                    Payment Declined
                </a>
            </div>
            </nav>
          </div>
        </div>
        
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="SI-Account">
            <i class="mdc-list-item__start-detail mdc-drawer-item-icon uil uil-user-check"></i>
            SI Account
            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
          </a>
          <div class="mdc-expansion-panel" id="SI-Account">
            <nav class="mdc-list mdc-drawer-submenu">
       
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="SI_table_request.php">
                  Request
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="SI_table_approved.php">
                  Approved
                </a>
              </div>
      
            </nav>
          </div>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="User-Management">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">account_circle</i>
            User Management
            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
          </a>
          <div class="mdc-expansion-panel <?= $page == "View_user_info.php" ? 'expanded' : ''; ?>" id="User-Management"  style="<?= $page == "View_user_info.php" ? 'display: block;' : ''; ?>">
            <nav class="mdc-list mdc-drawer-submenu">
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link <?= $page == "View_user_info.php"? 'active':''; ?>" href="All_user.php">
                  All User
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="User_registration.php">
                  User Registration
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="Banned_account.php">
                  Banned Account
                </a>
              </div>
            </nav>
          </div>
        </div>
    
                <?php
                    $withdrawal_status = $row['withdrawal_status'];

                    $disableButton = ($withdrawal_status === 'OFF') ? "disabled" : "";
                   //$link = ($withdrawal_status === 'OFF') ? 'javascript:showPopup();' : 'Encashment.php?accountid='.$row['accountid'].'';
                   $link = ($withdrawal_status === 'OFF') ? 'javascript:showPopup();' : 'Encashment.php?accountid=' . $row['accountid'];
                   if($withdrawal_status === 'OFF'){
                  
                         echo " <script>
                           function showPopup() {
                               var popupMessage = 'Not allowed at this time.<br>Try again later.';
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
                   
                 }
                ?>
                
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link <?php echo $disableButton ?>" href="<?php echo htmlspecialchars($link); ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-money-withdrawal"></i>
            Encashment
          </a>
        </div>

        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link <?= ($page == "View_genealogy.php" || $page == "Genealogy_view.php") ? 'active' : ''; ?>" href="Genealogy.php?sponsorid=<?php echo $row['accountid'] ?>">
              <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-sitemap"></i>
              Genealogy
          </a>
      </div>

        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="Logout.php">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-signout"></i>
            Logout
          </a>
        </div>

      </nav>
    </div>
  </div>
  <?php 
    }
  }
  ?>
</aside>