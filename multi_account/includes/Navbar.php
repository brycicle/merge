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

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="Account.php">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-card-atm"></i>
                        Account
                    </a>
                </div>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="Referrals.php?sponsorid=<?php echo $row['accountid'] ?>">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon uil uil-coins"></i>
                        Referrals
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
        		<?php 
            		}
          		}
        		?>
      		</nav>
    	</div>
  	</div>
</aside>