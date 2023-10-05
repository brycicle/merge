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
                		<div class="mdc-card info-card info-card--primary">
                  			<div class="card-inner">
                    			<h5 class="card-title">Direct Referral Bonus</h5>
                    			<?php
                    			$username = $_SESSION['username'];
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                while($row = mysqli_fetch_array($sql)){
              ?>  
                      <h5 class="border-bottom">&#8369;<?php echo number_format($row['DRB'],2) ?></h5>
                      <?php 
                  }
                ?> 
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-book-reader material-icons"></i>
                    			</div>
                  			</div>
                		</div>
              		</div>

              		<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                		<div class="mdc-card info-card info-card--success">
                  			<div class="card-inner">
                    			<h5 class="card-title">Pairing Bonus</h5>
                    			<?php
                    			$username = $_SESSION['username'];
                $sql = mysqli_query($conn,"SELECT * FROM genealogy WHERE username='$username'");
                while($row = mysqli_fetch_array($sql)){
              ?>  
                      <h5 class="border-bottom">&#8369;<?php echo number_format($row['pairing'],2) ?></h5>
                      <?php 
                  }
                ?> 
                    			<div class="card-icon-wrapper">
                      				<i class="uil uil-money-stack material-icons"></i>
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