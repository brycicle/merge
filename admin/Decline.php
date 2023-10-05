<?php 
  session_start();
  include "msqliconnect/connect.php";
  include "includes/Header.php";
  include "includes/Navbar.php";
  include "includes/Topbar.php";

  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM activate_request  WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<style type="text/css">
  .mdc-card {
    margin-top: 5%;
    margin-left: 30%;
    width: 40%;
}
.mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-text-field__input {
    width: 380px;
}
</style>
<body>
    <main class="content-wrapper">
      <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <div class="template-demo">                 
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          <form action="Payment_decline.php" method="POST" enctype="multipart/form-data"> 
                            <h6 class="card-title">Declined</h6>
                          <hr>
                          <h6>Leave a message</h6>
                            <input type="hidden" value='<?php echo $id ?>' name='hiddenID'>
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                            <input type="hidden" name="upline_id" value="<?php echo $row['upline_id']; ?>">
                            <input type="hidden" name="sponsor_id" value="<?php echo $row['sponsor_id']; ?>">
                            <input type="hidden" name="position" value="<?php echo $row['position']; ?>">
                            <input type="hidden" name="ref_num" value="<?php echo $row['ref_num']; ?>">
                            <input type="hidden" name="upload" value="<?php echo $row['upload']; ?>">
                            <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
                            <input type="hidden" name="limitedadminid" value="<?php echo $row['limitedadminid']; ?>">

                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                <i class="mdc-text-field__icon uil uil-postcard"></i>       
                                <input type="text" name="description" class="mdc-text-field__input" id="text-field-hero-input" required>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                      <label for="text-field-hero-input" class="mdc-floating-label">Message</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                              </div>
                              <input type="hidden" name="status" value="Declined">

                              <hr>
                              <button type="submit" class="btn btn-primary col-sm-4 offset-md-4" name="decline">Submit</button>
                            </form>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
  </main>
  <?php 
    include "includes/Script.php";
    include "includes/Footer.php";
  ?>
</body>
</html>