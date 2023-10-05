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
<style type="text/css">
  body {
      margin: 0;
      padding: 0;
  }

  .table-container {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: auto;
  }

  table {
      position: sticky;
      top: 0;
      background-color: #ffffff;
      width: 90%;
      margin: 0 auto;
      border: 1px solid #bdc3c7;
      box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
  }
  tr {
    transition: all .2s ease-in;
    cursor: pointer;
  }
  th {
    position: sticky;
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  td {
    background-color: #fff;
    color: #000;
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  td a{
    text-decoration: none;
  }
  #header {
    background-color: #2c578f;
    color: #fff;
  }
  h1 {
    font-weight: 600;
    text-align: center;
    background-color: #16a085;
    color: #fff;
    padding: 10px 0px;
  }
  .pagination{
    position: absolute;
    padding: 0;
    margin-top: 3%;
    margin-left: 10.5%;
  }
  .p-10{
    padding: 0;
    position: absolute;
    margin-top: 3%;
    margin-left: 80%;
    color: #000;
  }
  .badge-warning{
    background: #ffa500;
  }
  .badge-success{
    background: #3cb371;
  }
  td .approve{
    padding: 5px;
    border-radius: 5px;
  }
  td .decline{
    padding: 5px;
    border-radius: 5px;
  }
  .modal-title, h4, .col-form-label{
    color: #000;
  }
  .hidden_id {
        display: none;
    }
    .cl{
      margin-left: 5%;
      margin-top: 6.5%;
      margin-bottom: 2%;
    }
    @media(max-width: 768px){
      .ta{
        max-width: 450px;
        margin-bottom: 10%;
      }
        .ta thead{
            display: none;
        }
        .ta, .ta tbody,.ta tr,.ta td{
            display: block;
            width: 100%;
        } 
        .ta tr{
            margin-bottom: 15px;
        }
        .ta tbody tr td{
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .ta .hidden_id {
          display: none;
      }
        .ta td:before{
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
        }
    }
    .sideletebtn{
        background-color: #dc3545;
        padding: 5px;
        border-radius: 5px;
        color: #fff;
      }
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
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
         <div class="mdc-layout-grid__cell--span-12">
            <div class="mdc-card">
               <h6 class="card-title">Request Form</h6>
               <hr>
               <div class="template-demo">
                <form action="SI_form_code.php" method="POST"  enctype="multipart/form-data" class="needs-validation">

                  
                    <input class="form-control" type="file" name="pdf_file" required>
                    <hr>
                    <button class="btn btn-primary" type="submit">Upload</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- delete -->
  <div class="modal fade" id="sideletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete PDF</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="SI_form_delete.php" method="POST">
                <div class="container-fluid">
                  <input type="hidden" name="form_id" id="form_id">
                  <h6>Do you want to delete this?</h6>
            </div>
              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="delete">Yes</button>
              </div>
            </form>
        </div>
      </div>
  </div>
   <?php 
    $sql = "SELECT * FROM pdf_files ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

  ?>
  <div class="cl">
    
  </div>
  <div class="table-container">
    <table class="ta">
    <thead>
      <tr id="header">

        <th>#</th>
        <th>Name</th>
        <th>Uploaded AT</th>
        <th>Action</th>

      </tr>
    </thead>
    <?php    
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
    <tbody>
      <tr>
        <td data-label = "#"><?php echo $row['id'] ?></td>
        <td data-label = "Name"><?php echo $row['file_name'] ?></td>
        <td data-label = "Upload AT"><?php echo date('M  j, o | g:i A', strtotime($row["uploaded_at"])); ?></td>
        <td data-label = "Action"><a class="sideletebtn" href="#" style="color: white;">Delete</a></td>
      </tr>
      <?php 
        }
      } else {
      ?>
        <tr>
          <td colspan="4" style="text-align: center;">No Record Found</td>
        </tr>
        <?php
            } 
        ?>   
    </tbody>
  </table>
  
  </div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>