
    <?php
    include "../msqliconnect/connect.php";
    $accountid = $_GET['accountid'];
    $sql = "SELECT * FROM genealogy WHERE notif=0 AND sponsorid='$accountid' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
<a style="text-decoration: none; color: black;" href="Referrals.php?id=<?php echo $row['id']?>&sponsorid=<?php echo $accountid ?>">
    <li class="mdc-list-item" role="menuitem">
      <div class="item-thumbnail">
        <img src="user (2).png" alt="user">
      </div>
      <div  class="item-content d-flex align-items-start flex-column justify-content-center">
        <h6 class="item-subject font-weight-normal"><?php echo $row['username'] ?></h6>
        <h6 class="item-subject font-weight-normal"><b style="color: #3cb371;">active account</b></h6>
        <small class="text-muted"><?php echo date('M  j, o | g:i A',strtotime($row["date"])) ?> </small>
      </div>
    </li>
</a>
<?php 
    }
} else {
    echo '<li class="mdc-list-item">No messages are available.</li>';
}
$conn->close();
?>
