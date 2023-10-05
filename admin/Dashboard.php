<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "includes/Header.php";
	include "includes/Navbar.php";
	include "includes/Topbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Admin Fee</h5>
                   <?php
                   $username = $_SESSION['username'];
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                while($row = mysqli_fetch_array($sql)){
              ?>  
                      <h5 class="border-bottom">&#8369;<?php echo number_format($row['admin_fee'],2) ?></h5>
                      <?php 
                  }
                ?> 
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-bill-stack material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Total Members</h5>
                   <?php
                      $username = $_SESSION['username'];
                      $accountid = $_GET['accountid'];
                      $sql = mysqli_query($conn, "SELECT adminid FROM genealogy WHERE adminid='$accountid' AND usertype='user'");
                      
                      $groupCount = mysqli_num_rows($sql);

                      echo "<h5 class='border-bottom'>$groupCount</h5>";
                  ?>

                    <div class="card-icon-wrapper">
                      <i class="uil uil-book-reader material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Total Payin</h5>
                    <?php

                            $sql = mysqli_query($conn, "SELECT SUM(payin) AS total_payin FROM genealogy");
                            $row = mysqli_fetch_assoc($sql);
                            $total_payin = $row['total_payin'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_payin,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-receipt material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h5 class="card-title">Total SI Account</h5>
                    <?php
                      $sql = mysqli_query($conn, "SELECT status FROM si_request WHERE status='Approved'");
                      
                      $groupCount = mysqli_num_rows($sql);

                      echo "<h5 class='border-bottom'>$groupCount</h5>";
                  ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-folder-open material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Total Direct Referral<br><b style="font-size: 10px;">(after move to wallet)</b></h5>
                     <?php

                            $sql = mysqli_query($conn, "SELECT SUM(DRB) AS total_DRB FROM wallet_balance");
                            $row = mysqli_fetch_assoc($sql);
                            $total_DRB = $row['total_DRB'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_DRB,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-stack material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Total Pairing<br><b style="font-size: 10px;">(after move to wallet)</b></h5>
                    <?php
                    
                            $sql = mysqli_query($conn, "SELECT SUM(pairing) AS total_pairing FROM wallet_balance");
                            $row = mysqli_fetch_assoc($sql);
                            $total_pairing = $row['total_pairing'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_pairing,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-users-alt material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Total SI Payment</h5>
                    <?php
                    $username = $_SESSION['username'];
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                while($row = mysqli_fetch_array($sql)){
              ?>  
                      <h5 class="border-bottom">&#8369;<?php echo number_format($row['si_payment'],2) ?></h5>
                      <?php 
                  }
                ?> 
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-withdrawal material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h5 class="card-title">Admin Withdraw</h5>
                    <?php
                            $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_admin_withdraw FROM admin_withdraw");
                              
                            $row = mysqli_fetch_assoc($sql);
                            $total_admin_withdraw = $row['total_admin_withdraw'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_admin_withdraw,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-withdrawal material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Member Withdraw</h5>
                    <?php
                            $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_member_withdraw FROM member_withdraw");
                              
                            $row = mysqli_fetch_assoc($sql);
                            $total_member_withdraw = $row['total_member_withdraw'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_member_withdraw,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-withdrawal material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              

               <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Total Tax Payment</h5>
                    <?php
                    $username = $_SESSION['username'];
                  $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                  while($row = mysqli_fetch_array($sql)){
                ?>  
                        <h5 class="border-bottom">&#8369;<?php echo number_format($row['tax'],2) ?></h5>
                        <?php 
                    }
                  ?> 
                    <div class="card-icon-wrapper">
                      <i class="uil uil-briefcase material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Tax Withdraw</h5>
                    <?php
                            $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_tax_withdraw FROM tax_withdraw");
                              
                            $row = mysqli_fetch_assoc($sql);
                            $total_tax_withdraw = $row['total_tax_withdraw'];

                            echo "<h5 class='border-bottom'>&#8369;".number_format($total_tax_withdraw,2)."</h5>";
                          ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-withdrawal material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h5 class="card-title">Reserve Payout</h5>
                    <?php
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE usertype='admin'");
                while($row = mysqli_fetch_array($sql)){
                  $admin_fee = $row['admin_fee'];
                  $si_payment = $row['si_payment'];
    
                    $reserve_payout = $total_payin - ($admin_fee + $total_admin_withdraw + $total_DRB + $total_pairing + $si_payment) ;
                  }
                ?> 
                    <h5 class="border-bottom">&#8369;<?php echo number_format($reserve_payout,2)  ?></h5>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-transaction material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </main>
      </div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>