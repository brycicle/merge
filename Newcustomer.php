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
	display: grid;
	align-items: center;
	font-family: 'Poppins', sans-serif;
	background: #f3f5f4;
}
.container{
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 30px;
}
.form{
    position: absolute;
    max-width: 800px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #FFF;
}
h2{
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
}
form{
    margin-top: 30px;
}
.form .field .form-control{
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
}
.sub{
	position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
}
.field input,
.field button{
    height: 100%;
    width: 100%;
    border: none;
    font-size: 16px;
    font-weight: 400;
    border-radius: 6px;
}
.field input{
    outline: none;
    padding: 0 15px;
    border: 1px solid#CACACA;
}

.eye-icon{
    position: absolute;
    top: 72%;
    right: 60px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #8b8b8b;
    cursor: pointer;
    padding: 5px;
}
.field button{
    color: #fff;
    background-color: #333;
    transition: all 0.3s ease;
    cursor: pointer;
}
.field button:hover{
    background-color: #333;
}
.form-link{
    text-align: center;
    margin-top: 10px;
}
.form-link span,
.form-link a{
    font-size: 14px;
    font-weight: 400;
    color: #232836;
}
.form a{
    color: #0171d3;
    text-decoration: none;
}
.form-content a:hover{
    text-decoration: underline;
}
.line{
    position: relative;
    height: 1px;
    width: 100%;
    margin: 36px 0;
    background-color: #d4d4d4;
}
.line::before{
    content: 'Or';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFF;
    color: #8b8b8b;
    padding: 0 15px;
}
.invalid-feedback {
    position: absolute;
}
.label {
    position: absolute;
}
</style>
<body>
	<?php include "Navigation.php"; ?>
	<section class="container forms">
	    <div class="form signup">
            <div class="form-content">
	            <h2>Please complete the form</h2>
	            <form action="Signupcode.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    
                  	<div class="col-md-3 field input-field">
                    	<input type="text" class="form-control" id="validationCustom01" name="fname" placeholder="First Name" required>
                    	<div class="invalid-feedback">
				       	 	Please Input Your First Name.
				      	</div>
                    </div>
                    <div class="col-md-3 field input-field">   
                    	<input type="text" class="form-control" id="validationCustom02" name="lname" placeholder="Last Name" required>
                    	<div class="invalid-feedback">
				       	 	Please Input Your Last Name.
				      	</div>
                    </div>
	                
	                <div class="col-md-6 field input-field">
                        <input type="text" class="form-control" id="validationCustom03" name="address" placeholder="Address" required>
                        <div class="invalid-feedback">
				       	 	Please Input Your Complete Address.
				      	</div>
                    </div>

	                <div class="col-md-12 field input-field">
                        <input type="email" class="form-control" id="validationCustom04" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
				       	 	Please Input Your Email.
				      	</div>
                    </div>

                    <div class="col-md-4 field input-field">
                    	<input type="number" class="form-control" id="validationCustom05" name="registercode" placeholder="Registration Code" required>
                    	<div class="invalid-feedback">
				       	 	Please Input Your Registration Code.
				      	</div>
                    </div>
                    <?php
                        include "msqliconnect/connect.php";
                        $query2 = "select * from register order by accountid desc limit 1";
                        $result2 = mysqli_query($conn, $query2);
                        $row = mysqli_fetch_array($result2);
                        $last_id = isset($row['accountid']) ? $row['accountid'] : null;

                        if ($last_id === null || $last_id === "") {
                            $customer_ID = "ABC001";
                        } else {
                            $customer_ID = substr($last_id, 3);
                            $customer_ID = intval($customer_ID);
                            $customer_ID = "ABC00" . ($customer_ID + 1);
                        }
                    ?>
                    <div class="col-md-4 field input-field">   
                        <input type="text" class="form-control" id="validationCustom013 accountid" name="accountid"style="color: red" value="<?php echo $customer_ID; ?>" readonly>
                    </div>

                    <div class="col-md-4 field input-field">   
                    	<input type="number" class="form-control" id="validationCustom06" name="sponsorid" placeholder="Sponsor Account ID" required>
                    	<div class="invalid-feedback">
				       	 	Please Input the Sponsor Account ID.
				      	</div>
                    </div>

                    <div class="form-check col-md-2">
                        <label class="label">Select Upline Position</label><br>
                        <input type="radio" class="form-check-input" id="validationCustom07" name="position" value="left" required>
                        <label class="form-check-label">Left</label>
                        <div class="invalid-feedback">
                            Please Select Your Upline Position.
                        </div>
                    </div>

  					<div class="form-check col-md-2"><br>
   		 				<input type="radio" class="form-check-input" id="validationCustom08" name="position" value="right" required>
    					<label class="form-check-label">Right</label>
    					<div class="invalid-feedback">
				       	 	Please Select Your Upline Position.
				      	</div>
  					</div>

  					<div class="col-md-8 field input-field">
                        <input type="number" class="form-control" id="validationCustom09" name="refnum" placeholder="Reference Number of Payment" required>
                        <div class="invalid-feedback">
				       	 	Please Input Your Reference Number.
				      	</div>
                    </div>
            
                    <div class="col-md-4 input-field">    
                        <label class="label">Upload Image of Receipt Payment</label><br>            	
                        <input type="file" class="form-control" id="validationCustom010" name="upload" required>
                        <div class="invalid-feedback">
                            Please Upload Payment Receipt.
                        </div>
                    </div>

                    <div class="col-md-4 field input-field">
                        <input type="password" id="validationCustom011" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        placeholder="Create password" class="form-control password" required>
                        <div class="invalid-feedback">
				       	 	At least 8 characters, 1 special character,<br> 1 number, 1 capital letter
				      	</div>
                    </div>

                    <div class="col-md-4 field input-field">
                        <input type="password" name="confirmpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="validationCustom012" placeholder="Confirm password" class="form-control password" required>
                        <i class='bx bx-hide eye-icon'></i>
                        <div class="invalid-feedback">
				       	 	Please Confirm Your Password.
				      	</div>
                    </div>
                    <input type="hidden" name="usertype" value="user">
                    <div class="field button-field">
                        <button type="submit" name="register" class="sub">Sign Up</button>
                    </div>

	            </form>  
	        </div>
	    </div>
	</section>

	<script src="js/script.js"></script>
	<!-- Validation -->
	<script type="text/javascript">
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
		  'use strict'

		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.querySelectorAll('.needs-validation')

		  // Loop over them and prevent submission
		  Array.prototype.slice.call(forms)
		    .forEach(function (form) {
		      form.addEventListener('submit', function (event) {
		        if (!form.checkValidity()) {
		          event.preventDefault()
		          event.stopPropagation()
		        }

		        form.classList.add('was-validated')
		      }, false)
		    })
		})()
	</script>
</body>
</html>