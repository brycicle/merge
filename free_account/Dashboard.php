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



              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                <div class="mdc-card">
                  <div class="chart-container mt-4">
                    <div id="columnchart_material" style="width: 450px; height: 300px;"></div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card">
                  <div class="chart-container mt-4">
                    <div id="piechart_3d" style="width: 450px; height: 300px;"></div>
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