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
</style>
<body>
  <!-- Add -->
  <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mode Of Payment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="Mode_of_payment_add.php" method="POST">
                <div class="container-fluid">
                  <div class="mb-3">
                    <input type="text" name="bank_name" class="form-control" placeholder="Bank Name">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="account_name" class="form-control" placeholder="Account Name">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="account_num" class="form-control" placeholder="Account Number">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="amount" class="form-control" placeholder="Amount">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
        </div>
      </div>
  </div>
  <!-- Edit -->
  <div class="modal fade" id="edit-btnmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Mode Of Payment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="Mode_of_payment_edit.php" method="POST">
                <div class="container-fluid">
                  <input type="hidden" name="mode_of_payment_id" id="mode_of_payment_id">
                  <div class="mb-3">
                    <input type="text" name="bank_name" class="form-control" id="bank_name">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="account_name" class="form-control" id="account_name">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="account_num" class="form-control" id="account_num">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="amount" class="form-control" id="amount">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </div>
            </form>
        </div>
      </div>
  </div>
  <!-- delete -->
  <div class="modal fade" id="delete-btnmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Mode Of Payment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="Mode_of_payment_delete.php" method="POST">
               
                  <input type="hidden" name="mode_of_payment_delete_id" id="mode_of_payment_delete_id">
                  <h6>Are you sure you want to delete this!?</h6>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="delete">Yes</button>
              </div>
            </form>
        </div>
      </div>
  </div>
</div>
  <?php 
   
    $sql = "SELECT * FROM mode_payment ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

  ?>
  <div class="cl">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">
      Add
    </button>
  </div>
  <div class="table-container">
    <table class="ta">
    <thead>
      <tr id="header">

        <th>No.</th>
        <th>Bank Name</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>Amount</th>
        <th colspan="2">Action</th>

      </tr>
    </thead>
    <?php    
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
    <tbody>
      <tr>
        <td data-label = "No."><?php echo $row['id'] ?></td>
        <td data-label = "Bank Name"><?php echo $row['bank_name'] ?></td>
        <td data-label = "Account Name"><?php echo $row['account_name'] ?></td>
        <td data-label = "Account Number"><?php echo $row['account_num'] ?></td>
        <td data-label = "Amount"><?php echo $row['amount'] ?></td>
        <td data-label = "Action"><button type="button" class="btn btn-success edit-btn"><i class="uil uil-pen"></i></button></td>
        <td data-label = "Action"><button type="button" class="btn btn-danger delete-btn"><i class="uil uil-trash-alt"></i></button></td>
      </tr>
      <?php 
        }
      } else {
      ?>
        <tr>
          <td colspan="6" style="text-align: center;">No Record Found</td>
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