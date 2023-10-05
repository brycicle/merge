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
                    <h5 class="card-title">Wallet Balance</h5>
                    <?php
                    $username = $_SESSION['username'];
                    $sql = mysqli_query($conn, "SELECT SUM(wallet) AS total_wallet FROM wallet_balance WHERE username='$username'");
                    
                    $row = mysqli_fetch_assoc($sql);
                      $wallet = $row['total_wallet'];

                    echo '<h5 class="border-bottom">&#8369;'.number_format($wallet,2) .'</h5>';
                ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-bill-stack material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Total Member</h5>
                    <?php
                      $username = $_SESSION['username'];
                      $accountid = $_GET['accountid'];
                      $sql = mysqli_query($conn, "SELECT limitedadminid FROM genealogy WHERE limitedadminid='$accountid' AND usertype='user'");
                      
                      $groupCount = mysqli_num_rows($sql);

                      echo "<h5 class='border-bottom'>$groupCount</h5>";
                  ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-receipt material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Total SI Account</h5>
                    <?php
                      $username = $_SESSION['username'];
                      $accountid = $_GET['accountid'];
                      $sql = mysqli_query($conn, "SELECT status FROM si_request WHERE status='Approved' AND limitedadminid='$accountid'");
                      
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
                <div class="mdc-card info-card info-card--info">
                  <div class="card-inner">
                    <h5 class="card-title">Total Payin</h5>
                    <?php
                    $username = $_SESSION['username'];
                     $accountid = $_GET['accountid'];
                    $sql = mysqli_query($conn, "SELECT SUM(payin) AS total_payin FROM genealogy WHERE limitedadminid='$accountid'");
                    
                    $row = mysqli_fetch_assoc($sql);
                      $payin = $row['total_payin'];

                    echo '<h5 class="border-bottom">&#8369;'.number_format($payin,2) .'</h5>';
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
                    <h5 class="card-title">Total SI Payment</h5>
                    <?php
                    $username = $_SESSION['username'];
                     $accountid = $_GET['accountid'];
                    $sql = mysqli_query($conn, "SELECT SUM(si_payment) AS total_si_payment FROM si_request WHERE limitedadminid='$accountid'");
                    
                    $row = mysqli_fetch_assoc($sql);
                      $si_payment = $row['total_si_payment'];

                    echo '<h5 class="border-bottom">&#8369;'.number_format($si_payment,2) .'</h5>';
                ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-stack material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Total Direct Referral</h5>
                    <?php
                    $username = $_SESSION['username'];
                    $accountid = $_GET['accountid'];
                    $sql = mysqli_query($conn, "SELECT SUM(DRB) AS total_DRB FROM genealogy WHERE limitedadminid='$accountid'");
                    
                    $row = mysqli_fetch_assoc($sql);
                      $DRB = $row['total_DRB'];

                    echo '<h5 class="border-bottom">&#8369;'.number_format($DRB,2) .'</h5>';
                ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-users-alt material-icons"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Total Pairing</h5>
                    <?php
                    $username = $_SESSION['username'];
                    $accountid = $_GET['accountid'];
                    $sql = mysqli_query($conn, "SELECT SUM(pairing) AS total_pairing FROM genealogy WHERE limitedadminid='$accountid'");
                    
                    $row = mysqli_fetch_assoc($sql);
                      $pairing = $row['total_pairing'];

                    echo '<h5 class="border-bottom">&#8369;'.number_format($pairing,2) .'</h5>';
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
                    <h5 class="card-title">Total Encashment</h5>
                    <?php
                            $username = $_SESSION['username'];
                  $sql = mysqli_query($conn, "SELECT SUM(net_balance) AS total_balance FROM encashment WHERE username='$username' AND status='Approved'");

                      $row = mysqli_fetch_assoc($sql);
                      $net_balance = $row['total_balance'];

                echo '<h5 class="border-bottom">&#8369;'.number_format($net_balance,2) .'</h5>';
                
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
                    <h5 class="card-title">Total Tax Payment</h5>
                    <?php
                            $username = $_SESSION['username'];
                  $sql = mysqli_query($conn, "SELECT SUM(tax) AS total_tax FROM encashment WHERE username='$username' AND status='Approved'");

                      $row = mysqli_fetch_assoc($sql);
                      $net_tax = $row['total_tax'];

                echo '<h5 class="border-bottom">&#8369;'.number_format($net_tax,2) .'</h5>';
                
                ?>
                    <div class="card-icon-wrapper">
                      <i class="uil uil-money-withdrawal material-icons"></i>
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