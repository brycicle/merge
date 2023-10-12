<?php 
	session_start();
	include "msqliconnect/connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project</title>
	<meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="icon" href="../bg.jpg">
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
	display: grid;
	align-items: center;
	font-family: 'Poppins', sans-serif;
	background: #f3f5f4;
}
.container1 {
	width: 100%;
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	padding-left: 100%;
}
.profile-box{
	background: #000066;
	text-align: center;
	padding: 40px 90px;
	color: #fff;
	position: relative;
	border-radius: 20px;
}
.menu-icon{
	width: 25px;
	position: absolute;
	left: 40px;
	top: 40px;
}
.exit-icon{
	width: 25px;
	position: absolute;
	right: 40px;
	top: 40px;
}
.profile-pic{
	 width: 150px;
	 border-radius: 50%;
	 background: #fff;
	 padding: 6px;
	 margin-top: 40px;
}
.profile-bottom{
	background: #fff;
	color: #999;
	padding: 30px 0;
	margin-right: -90px;
	margin-left: -90px;
	margin-bottom: -40px;
	border-radius: 20px;
	margin-top: -10px;
}
.profile-box button{
	background: #fff;
	color: #ff574a;
	border: none;
	outline: none;
	box-shadow: 0 5px 10px rgba(224, 67, 54, 0.5);
	padding: 15px 60px;
	cursor: pointer;
	border-radius: 30px;
	margin-bottom: -50px;
	font-weight: 600;
	font-size: 16px;
}
.profile-box h3{
	font-size: 22px;
	margin-top: 20px;
	font-weight: 500;
}
.profile-box p{
	text-align: left;
}
.container1 .image{
	height: 100%;
	width: 100%;
	object-fit: cover;
	transition: .2s linear;
}
.container1 .image:hover{
	transform: scale(1.1);
}
.container1 .popup-image{
	position: fixed;
	top: 0; left: 0;
	background: rgba(0, 0, 0, .9);
	height: 100%;
	width: 100%;
	z-index: 100;
	display: none;
}
.container1 .popup-image span{
	position: absolute;
	top: 0; left: 0;
	font-size: 60px;
	font-weight: bolder;
	color: #fff;
	cursor: pointer;
	z-index: 100;
}
.container1 .popup-image img{
	position: absolute;
	top: 50%; left: 50%;
	transform: translate(-50%, -50%);
	border: 5px solid #fff;
	border-radius: 5px;
	width: 500px;
	object-fit: cover;
}
.container1 .italic{
	font-style: italic;
}
</style>
<body>
	<?php 
		include "Side_bar.php"; 
		if(isset($_GET['id'])){
	        $id = $_GET['id'];
	        $sql = "SELECT * FROM payment WHERE id = '$id'";
	        $result = mysqli_query($conn, $sql);
	        $row = mysqli_fetch_assoc($result);
	    }
	?>
	<div class="container1">
		<div class="profile-box">
			<a href="New_user_requests.php"><img src="exit.png" class="exit-icon"></a>
			<img src="user-icon.png" class="profile-pic">
			<h3><?php echo $row['username']; ?></h3>
			<p>Reference Number: <?php echo $row['ref_num']; ?></p>
			<p>Upload Receipt: <img  class="image" src="https://merge-fs.s3.ap-southeast-1.amazonaws.com/<?php echo $row['upload']; ?>" style="width:100px; height: 100px;"></p>
			<!-- <a href="Accept.php?id=<?php echo $row['id'] ?>"><button type="submit">Approve</button></a> -->
			<div class="profile-bottom">
			</div>
		</div>
		<div class="popup-image">
			<span>&times;</span>
			<img src="">
		</div>
	</div>
	<script type="text/javascript">
		document.querySelectorAll('.image').forEach(image =>{
			image.onclick = () =>{
				document.querySelector('.popup-image').style.display = 'block';
				document.querySelector('.popup-image img').src = image.getAttribute('src');
			}
		});
		document.querySelector('.popup-image span').onclick = () =>{
			document.querySelector('.popup-image').style.display = 'none';
		}
	</script>
</body>
</html>