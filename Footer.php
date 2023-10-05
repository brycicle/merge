<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/Footer.css">
	<!-- Icon -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
	<!-- Alertify Js -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script>
		<?php if(isset($_SESSION['message'])){ ?>
		alertify.set('notifier','position', 'top-right');
		alertify.success('<?= $_SESSION['message']; ?>');
		<?php 
		unset($_SESSION['message']);
		}
		?>
	</script>
</head>
<body>
	<div class="footer">
		<div class="col-1">
			<h3>USEFUL LINKS</h3>
			<a href="#">About</a>
			<a href="#">Services</a>
			<a href="#">Contact</a>
			<a href="#">Shop</a>
			<a href="#">Blog</a>
		</div>
		<div class="col-2">
			<h3>NEWSLETTER</h3>
			<form>
				<input type="email" name="" placeholder="Your Email Address" required><br>
				<button type="submit">SUBSCRIBE NOW</button>
			</form>
		</div>
		<div class="col-3">
			<h3>CONTACT</h3>
			<p>Great place to dine<br>with friends and family! Quality pizza</p>
			<div class="social-icons">
				<i class="uil uil-facebook"></i>
				<i class="uil uil-twitter"></i>
				<i class="uil uil-instagram"></i>
				<i class="uil uil-behance"></i>
			</div>
		</div>
	</div>
</body>
</html>