<?php 
	$page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title>Admin Dashboard</title>
	<!--Montserrat Font-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	
	<!---Material Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

	<title>Project</title>
	<meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="icon" href="bg.jpg">
    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	* {
		padding: 0px;
		margin: 0px;
		box-sizing: border-box;
	}
	body {
		height: 100vh;
		display: block;
		align-items: center;
		font-family: 'Poppins', sans-serif;
		background-color: #fff;
    	color: #f7f4f4;
	}
	.material-icons-outlined{
	    vertical-align: middle;
	    line-height: 0.5px;
	    font-size: 30px;

	}

	.grid-container {
	    display: grid;
	    grid-template-columns: 260px    1fr 1fr 1fr;
	    grid-template-rows: 0.2fr   3fr;
	    grid-template-areas: 
	        "sidebar header header header"
	        "sidebar main main main";
	    height: 100vh;
	}

	    /*-----------Header--------------*/
	.header {
	    grid-area: header;
	    height: 50px;
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
	    padding: 0 60px 0 60px;
	    background-color: #fdfdfd;
	    box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
	     
	} 
	.header-right{
	    display: flex;
	    justify-content: space-between;
	     
	    color: rgba(46, 45, 45, 0.95)
	     
	    

	}

	.menu-icon{
	    display: none;
	    
	}
	    /*-----------Sidebar--------------*/

	#sidebar {
	    grid-area: sidebar;
	    height: 100%;
	    width: 100%;
	    background-color:#2c578f;
	    overflow-y: auto;
	    transition: all 0.5s;
	    -webkit-transition: all 0.5s;
	}



	.sidebar-title{
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 30px 30px 30px 30px;
	margin-bottom: 30px;
	}

	.sidebar-title > span {
	    display: none;
	    
	}

	.sidebar-brand{
	    margin-top: 15px;
	    font-size: 30px;
	    font-weight: 900;
	    
	}

	.sidebar-list{
	    padding: 0;
	    margin-top: 15px;
	    list-style-type: none;
	}

	.sidebar-list-item{
	padding: 15px 15px 15px 15px;
	font-size: 16px;  
	}

	.sidebar-list-item:hover{
	    background-color: rgba(255, 255, 255, 0.2);
	    cursor: pointer;
	}

	.sidebar-responsive{
	    display: inline !important;
	    position: absolute;
	    z-index: 12 !important;
	}

	/*-----------MAIN--------------*/
	.main-container {
	    grid-area: main;
	    overflow-y: auto;
	    padding: 20px 20px;
	    color: rgba(255,255,255,0.95);
	    
	}

	.main-title {
	    display: flex;
	    justify-content: space-between;
	    color: rgba(46, 45, 45, 0.95)
	   

	}

	.main-cards {
	    display: grid;
	    grid-template-columns: 1fr 1fr 1fr;
	    gap: 20px;
	    margin: 20px 0;
	}

	.card {
	    display: flex;
	    flex-direction: column;
	    justify-content: space-around;
	    padding: 25px;
	    border-radius: 5px;
	}

	.card:first-child   {
	 background-color: #2962ff;

	}

	.card:nth-child(2){
	    background-color: #ff6d00;    
	}

	.card:nth-child(3){
	    background-color: #2e7d32;    
	}
	.card:nth-child(4){
	    background-color: #d50000;    
	}
	.card:nth-child(5){
	    background-color: #ff00ff;    
	}
	.card:nth-child(6){
	    background-color: #009b72;    
	}
	.card:nth-child(7){
	    background-color: #9f3000;    
	}
	.card:nth-child(8){
	    background-color: #350587;    
	}
	.card-inner{
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
	    
	}

	.card-inner > .material-icons-outlined{
	    font-size: 45px;
	}
	.charts{
	    display: grid;
	    grid-template-columns: 1fr 1fr ;
	    gap: 20px;
	    margin-top: 60px;
	}


	.charts-card{
	    background-color: #263043;
	    margin-bottom:  20px;
	    padding: 25px;
	    box-sizing: border-box;
	    -webkit-column-break-indise: avoid;
	    border-radius: 5px;
	    box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
	}
	.chart-title{
	    display: flex;
	    align-items: center;
	    justify-content: center;

	}
	.sidebar-list a{
		text-decoration: none;
		color: #fff;
	}
	.sidebar-list-item.active {
	    background-color: #fff;
	    color: #000;
	}
	.header large{
		color: #000;
	}
	.head{
		margin-left: 190%;
	}
	.header-left{
		color: #000;
		font-weight: bold;
		text-transform: uppercase;
	}
</style>
<body>
	<div class="grid-container">
		<!--Header-->
		<?php
	        $username = $_SESSION['username'];
	        $sql = "SELECT * FROM register WHERE username='$username'";
	        $result = mysqli_query($conn, $sql);

	        if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) {
	    ?>
		<header class="header">
			<div class="menu-icon" onclick="openSidebar()">
				<span class="material-icons-outlined">menu</span>
			</div>
			
			<div class="header-left">
		 		<?php echo $row['status']; ?>
			</div>
			
			<div class="header-right">
				<span class="material-icons-outlined head">notifications</span>
				<span class="material-icons-outlined head">mail</span>
			</div>
			<large><?php echo $row['lname'] ?>, <?php echo $row['fname']; ?></large>
		</header>
		<?php 
			} 
		}
		?>
		<!--End Header-->
		<!--Sidebar-->
		<aside id="sidebar">
			<div class="sidebar-title">
				<div class="sidebar-brand">
					<span class="material-icons-outlined">shopping_cart</span> LOGO
				</div>
				<span class="material-icons-outlined" onclick="closeSidebar()">close</span>
				
			</div>
			<ul	class="sidebar-list">

				<a href="Dashboard.php"><li class="sidebar-list-item <?= $page == "Dashboard.php"? 'active':''; ?>">
					<span class="material-icons-outlined">dashboard</span> Dashboard
				</li></a>

				<a href="Payment.php"><li class="sidebar-list-item <?= $page == "Payment.php"? 'active':''; ?>">
					<span class="material-icons-outlined">badge</span> Payment
				</li></a>

				<a href="Activate_account.php"><li class="sidebar-list-item <?= $page == "Activate_account.php"? 'active':''; ?>">
					<span class="material-icons-outlined">badge</span> Activate Account
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">account_circle</span> Profile
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">manage_accounts</span> Account
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">app_registration</span> Referrals
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">fact_check</span> Genealogy
				</li></a>

				<a href="Supremacy_account.php"><li class="sidebar-list-item <?= $page == "Supremacy_account.php"? 'active':''; ?>">
					<span class="material-icons-outlined">task_alt</span> Supremacy Account
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">badge</span> Bank Account
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">check_box</span> Transaction History
				</li></a>

				<a href="#"><li class="sidebar-list-item <?= $page == "#"? 'active':''; ?>">
					<span class="material-icons-outlined">history</span> Encashment
				</li></a>

				<a href="Logout.php"><li class="sidebar-list-item">
					<span class="material-icons-outlined <?= $page == "Logout.php"? 'active':''; ?>">logout</span> Logout
				</li></a>

			</ul>
		</aside>
		<!--End Sidebar-->
	
	<!--Script-->
	<!--Apexcharts-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.js"></script>
	<!--Custom JS-->
	<script src="js/scripts.js"></script>
	<!-- Sweet alert js -->
    <script src="js/sweetalert.min.js"></script>
    <?php 
        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){ ?>
            <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Done!",
                });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>
</body>
	
</html>