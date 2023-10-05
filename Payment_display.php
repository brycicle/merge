<?php 
	session_start();
	include "msqliconnect/connect.php";
	$sql = "SELECT * FROM payment";
	$result = mysqli_query($conn, $sql);

	$num_per_page =  20;

	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 1;
	}

	$start_from = ($page-1)*$num_per_page;
	$next_page = $page + 1;
	$previous_page = $page - 1;
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM payment WHERE username='$username' ORDER BY id DESC LIMIT $start_from, $num_per_page";
	$result = mysqli_query($conn, $sql);
?>
<table class="ta">
	<thead>
		<tr id="header">

			<th>Date</th>
			<th>Reference Number</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Status</th>

		</tr>
	</thead>
	<?php    
	    if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) {
    ?>
	<tbody>
		<tr>
			<td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["date"])); ?></td>
			<td data-label = "Reference Number"><?php echo $row['ref_num']; ?></td>
			<td data-label = "Amount"><?php echo $row['amount']; ?></td>
			<td data-label = "Description"><?php echo $row['description']; ?></td>
			<td data-label = "Status"><?php 
				$status=$row['status'];
				if($status=="" or $status=="Waiting"){
			?>
			<span class="badge badge-warning">Waiting</span>
			<?php 
			    }
			    if($status=="Approved"){ 
			?>
			<span class="badge badge-success">Approved</span>
		    <?php 
		    	} 
		    	if($status=="Declined"){
		    ?>
			<span class="badge badge-danger" style="background-color: #dc3545;">Declined</span>
		    <?php 
		    	} 
		    ?></td>
		</tr>
		<?php 
			}
		} else {
		?>
	    <tr>
	     	<td colspan="5" style="text-align: center;">No Record Found</td>
	    </tr>
	    <?php
	      	} 
	    ?>
	</tbody>
</table>