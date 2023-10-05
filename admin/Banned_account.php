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
	    padding-left: 0%;
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
	.popup-image{
		position: fixed;
		top: 0; left: 0;
		background: rgba(0, 0, 0, .9);
		height: 100%;
		width: 100%;
		z-index: 100;
		display: none;
	}
	.popup-image span{
		position: absolute;
		top: 0; left: 0;
		font-size: 40px;
		font-weight: bolder;
		color: #fff;
		cursor: pointer;
		z-index: 100;
	}
	.popup-image img{
		position: absolute;
		top: 50%; left: 50%;
		transform: translate(-50%, -50%);
		border: 5px solid #fff;
		border-radius: 5px;
		width: 500px;
		object-fit: cover;
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
    .approvebtn{
		background-color: #0d6efd;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
	.a{
		background-color: #dc3545;
		padding: 5px;
		border-radius: 5px;
		color: #fff;
	}
	.input-box{
        margin-left: 5%;
        position: relative;
        height: 44px;
        max-width: 50px;
        width: 100%;
        border-radius: 50px;
        background-color: #e9eaef;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    .input-box.open{
        max-width: 350px;
    }
    input{
        position: relative;
        outline: none;
        border: none;
        height: 100%;
        width: 100%;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 400;
        color: #333;
        background-color: #e9eaef;
    }
    .input-box.open{
        padding: 0 15px 0 65px;
    }
    .icon{
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        width: 50px;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        background-color: #2c578f;
    }
    .search-icon,
    .close-icon{
        position: absolute;
        top: 50%;
        font-size: 30px;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    .search-icon{
        color: #fff;
        transform: translateY(-50%) rotate(90deg);
    }
    .input-box.open .search-icon{
        transform: translateY(-50%) rotate(0);
    }
    .close-icon{
        right: -45px;
        color: #000;
        padding: 5px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(-50%);
    }
    .input-box.open .close-icon{
        opacity: 1;
        pointer-events: auto;
        transform: translateY(-50%) rotate(180deg);
    }
</style>
<body>
	<?php 
		$sql = "SELECT * FROM register WHERE usertype='user' AND status='active account' AND account='block'";
		$result = mysqli_query($conn, $sql);
	?>

	
	<div class="cl">
		<div class="input-box">
            <input type="text" id="searchInput" onkeyup="liveSearch()" placeholder="Type here...">
            <span class="icon">
                <i class="uil uil-search search-icon"></i>
            </span>
            <i class="uil uil-times close-icon"></i>
        </div>
	</div>
	<div id="searchResults" class="z"></div>
	<div class="table-container">
		
	<table class="ta">
		<thead >
			<tr id="header">

				<th>First Name</th>
				<th>Last Name</th>
				<th>User Name</th>
				<th>Sponsor ID</th>
				<th>Block</th>
				<th>Unblock</th>
				<th>Action</th>

			</tr>
		</thead>
		<?php    
			if (mysqli_num_rows($result) > 0) {
		   	 	while($row = mysqli_fetch_assoc($result)) {
        ?>
		<tbody id="data_table">
			<tr>
				<td data-label = "First Name" style="color: #2c578f;"><?php echo $row['fname'] ?></td>
				<td data-label = "Last Name"><?php echo $row['lname'] ?></td>
				<td data-label = "User Name"><?php echo $row['username'] ?></td>
				<td data-label = "Sponsor ID"><?php echo $row['sponsorid'] ?></td>
				<td data-label = "Block"><?php echo $row['bl_date'] ?></td>
				<td data-label = "Unblock"><?php echo $row['nbl_date'] ?></td>
				<td data-label = "Action"><a class="a" href="Banned_code_unblock.php?id=<?php echo $row["id"] ?>" style="color: white;">Unblock</a></td>
			</tr>
			<?php 
				}
			} else {
			?>
		    <tr>
		     	<td colspan="8" style="text-align: center;">No Record Found</td>
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