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
          <b style="text-transform: uppercase;"><?php echo $row['status']; ?></b>
          <!-- <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
            <i class="material-icons mdc-text-field__icon">search</i>
            <input class="mdc-text-field__input" id="text-field-hero-input">
            <div class="mdc-notched-outline">
              <div class="mdc-notched-outline__leading"></div>
              <div class="mdc-notched-outline__notch">
                <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
              </div>
              <div class="mdc-notched-outline__trailing"></div>
            </div>
          </div> -->
        </div>
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
          
          <div class="menu-button-container menu-profile ">
            <button class="mdc-button mdc-menu-button">
              <span class="d-flex align-items-center">
                <span class="figure">
                  <img src="user (2).png" alt="user" class="user">
                </span>
                <span class="user-name"><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></span>
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
          
          <div class="divider d-none d-md-block"></div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function(){
                    function updateCount() {
                        $.ajax({
                            url: "includes/Get_count.php?accountid=<?php echo $row['accountid'] ?>",
                            type: "GET",
                            success: function(data) {
                                if (data != 0) {
                                    $('#result').text(data);
                                } else {
                                    $('#result').text('');
                                }
                            }
                        });
                    }

                    // Call the updateCount() function initially
                    updateCount();

                    // Call the updateCount() function every 1 seconds
                    setInterval(updateCount, 1000);
                });
            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                  $(document).ready(function(){
                      // Function to fetch and display data from the database
                      function fetchData() {
                          $.ajax({
                              url: "includes/Get_data.php?accountid=<?php echo $row['accountid'] ?>",
                              type: "POST",
                              dataType: "html",
                              success: function(data) {
                                 
                                  $('#getdata').html(data);
                              }
                          });
                      }

                      // Call fetchData() every 1 seconds
                      setInterval(fetchData, 1000);
                  });
              </script>
          <div class="menu-button-container" >
              <button class="mdc-button mdc-menu-button">
                  <i class="mdi mdi-bell"></i>
                  <span class="count-indicator">
                      <span class="count" id="result"></span>
                  </span>
              </button>

            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
              <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
              <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" id="getdata">
                
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </header>
    <?php 
      } 
    }
    ?>