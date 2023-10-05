<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
  <div class="mdc-drawer__header">
    <a href="#" class="brand-logo">
      <img class="logo" src="../Logolabel2.png" alt="logo">
    </a>
  </div>
  <?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM genealogy WHERE username='$username'";
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
          <div class="mdc-expansion-panel <?= $page == "Decline.php" ? 'expanded' : ''; ?>" id="Payment-Management" style="<?= $page == "Decline.php" ? 'display: block;' : ''; ?>">
            <nav class="mdc-list mdc-drawer-submenu">
             <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link <?= $page == "Decline.php" ? 'active' : ''; ?>" href="Payment_management.php">
                    Payment Waiting
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link " href="Payment_table_approved.php">
                    Payment Approved
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link " href="Payment_table_declined.php">
                    Payment Declined
                </a>
            </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="Withdrawal.php">
                  Withdrawal
                </a>
              </div>
            
            </nav>
          </div>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="Encashment">
            <i class="mdc-list-item__start-detail mdc-drawer-item-icon uil uil-coins"></i>
            Encashment
            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
          </a>
          <div class="mdc-expansion-panel" id="Encashment">
            <nav class="mdc-list mdc-drawer-submenu">
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="Encashment.php">
                  Request
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="Encashment_approved.php">
                  Approved
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
                <a class="mdc-drawer-link" href="SI_Form.php">
                  Request Form PDF
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="SI_table_waiting.php">
                  Waiting
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="SI_table_approved.php">
                  Approved
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="SI_table_declined.php">
                  Declined
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
            <div class="mdc-expansion-panel <?= $page == "View_user_info.php" ? 'expanded' : ''; ?>" id="User-Management" style="<?= $page == "View_user_info.php" ? 'display: block;' : ''; ?>">
                <nav class="mdc-list mdc-drawer-submenu">
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link <?= $page == "View_user_info.php" ? 'active' : ''; ?>" href="Usermanagement.php">
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

        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="Transaction">
              <i class="uil uil-history mdc-list-item__start-detail mdc-drawer-item-icon"></i>
               
                Transaction
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
            </a>
            <div class="mdc-expansion-panel" id="Transaction">
                <nav class="mdc-list mdc-drawer-submenu">
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Admin_withdraw.php">
                            Admin Withdraw
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="SI_withdraw.php">
                            SI Withdraw
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Tax_withdraw.php">
                            Tax Withdraw
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Members_withdraw.php">
                            Members Withdraw
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="Setting">
              <i class="uil uil-setting mdc-list-item__start-detail mdc-drawer-item-icon"></i>
               
                Setting
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
            </a>
            <div class="mdc-expansion-panel" id="Setting">
                <nav class="mdc-list mdc-drawer-submenu">
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Mode_of_payment.php">
                            Mode of Payment
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Commission.php">
                            Commission
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Create_account.php">
                            Create Account
                        </a>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="Withdrawal_set.php">
                            Withdrawal Set
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="Reset_pairing_count.php">
            <i class="uil uil-hourglass mdc-list-item__start-detail mdc-drawer-item-icon"></i>
            
            Reset Pairing Count
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