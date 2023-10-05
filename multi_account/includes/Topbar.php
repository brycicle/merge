<div class="main-wrapper mdc-drawer-app-content">
    <!-- partial:partials/_navbar.html -->
    <?php
      $username = $_SESSION['username'];
      $sql = "SELECT * FROM register WHERE username='$username'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
    ?>
    <header class="mdc-top-app-bar">
      <div class="mdc-top-app-bar__row">
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
          <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
          <b style="text-transform: uppercase;"><?php echo $row['usertype']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-md-flex">
            <i class="material-icons mdc-text-field__icon">search</i>
            <input class="mdc-text-field__input" id="search" name="search">
            <div class="mdc-notched-outline">
              <div class="mdc-notched-outline__leading"></div>
              <div class="mdc-notched-outline__notch">
                <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
              </div>
              <div class="mdc-notched-outline__trailing"></div>
            </div>
          </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
          
          <div class="menu-button-container menu-profile ">
            <button class="mdc-button mdc-menu-button">
              <span class="d-flex align-items-center">
                <span class="figure">
                  <img src="../user.png" alt="head" class="user">
                </span>
                <span class="user-name"><?php echo $row['fname']; ?>, <?php echo $row['lname']; ?></span>
              </span>
            </button>
            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
              <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                <a href="Profile.php" style="text-decoration: none; color: #000;"><li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon-only">
                    <i class="mdi mdi-account-edit-outline text-primary"></i>
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">Profile</h6>
                  </div>
                </li></a>
                <a href="Logout.php" style="text-decoration: none; color: #000;"><li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon-only">
                    <i class="uil uil-signout text-primary"></i>                    
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">Logout</h6>
                  </div>
                </li></a>
              </ul>
            </div>
          </div>
          
          <!-- <div class="divider d-none d-md-block"></div>
          
          <div class="menu-button-container">
            <button class="mdc-button mdc-menu-button">
              <i class="mdi mdi-bell"></i>
            </button>
            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
              <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
              <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon">
                    <i class="mdi mdi-email-outline"></i>
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">You received a new message</h6>
                    <small class="text-muted"> 6 min ago </small>
                  </div>
                </li>
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon">
                    <i class="mdi mdi-account-outline"></i>                      
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">New user registered</h6>
                    <small class="text-muted"> 15 min ago </small>
                  </div>
                </li>
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon">
                    <i class="mdi mdi-alert-circle-outline"></i>
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">System Alert</h6>
                    <small class="text-muted"> 2 days ago </small>
                  </div>
                </li> 
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail item-thumbnail-icon">
                    <i class="mdi mdi-update"></i>
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">You have a new update</h6>
                    <small class="text-muted"> 3 days ago </small>
                  </div>
                </li> 
              </ul>
            </div>
          </div>
          <div class="menu-button-container">
            <button class="mdc-button mdc-menu-button">
              <i class="mdi mdi-email"></i>
              <span class="count-indicator">
                <span class="count">3</span>
              </span>
            </button>
            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
              <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
              <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail">
                    <img src="../assets/images/faces/face4.jpg" alt="user">
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                    <small class="text-muted"> 1 Minutes ago </small>
                  </div>
                </li>
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail">
                    <img src="../assets/images/faces/face2.jpg" alt="user">
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                    <small class="text-muted"> 15 Minutes ago </small>
                  </div>
                </li>
                <li class="mdc-list-item" role="menuitem">
                  <div class="item-thumbnail">
                    <img src="../assets/images/faces/face3.jpg" alt="user">
                  </div>
                  <div class="item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                    <small class="text-muted"> 18 Minutes ago </small>
                  </div>
                </li>                
              </ul>
            </div>
          </div> -->
          
        </div>
      </div>
    </header>
    <?php 
      } 
    }
    ?>