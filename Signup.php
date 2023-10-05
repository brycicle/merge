<?php 
    session_start();
    include "Header.php";
    include "msqliconnect/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    .wave{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .container{
        width: 100vw;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :7rem;
        padding: 0 2rem;
    }

    .img{
        display: grid;
        justify-content: flex-end;
        align-items: center;
    }

    .login-content{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
    }

    .img img{
        width: 300px;
    }

    .row{
        margin-top: 10%;
        margin-right: 10%;
        margin-bottom: 10%;
        background-color: #fff;
        padding: 30px 30px;
        border-radius: 12px;
        width: 800px;
    }
    .login-content .row {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-content .row img {
        width: 230px;
    }

    .login-content h2{
        margin: 15px 0;
        color: #333;
        text-transform: uppercase;
        font-size: 2.9rem;
    }

    .login-content .input-div{
        position: relative;
        display: grid;
        grid-template-columns: 7% 93%;
        margin: 9px 0;
        padding: 5px 0;
        border-bottom: 2px solid #d9d9d9;
    }

    .login-content .input-div.a{
        margin-top: 0;
    }

    .i{
        color: #d9d9d9;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .i i{
        transition: .3s;
    }

    .input-div > div{
        position: relative;
        height: 45px;
    }

    .input-div > div > h5{
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
        transition: .3s;
    }

    .input-div:before, .input-div:after{
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: #2c578f;
        transition: .4s;
    }

    .input-div:before{
        right: 50%;
    }

    .input-div:after{
        left: 50%;
    }

    .input-div.focus:before, .input-div.focus:after{
        width: 50%;
    }

    .input-div.focus > div > h5{
        top: -5px;
        font-size: 15px;
    }

    .input-div.focus > .i > i{
        color: #2c578f;
    }

    .input-div > div > input{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding: 0.5rem 0.7rem;
        font-size: 16px;
        color: #555;
        font-family: 'poppins', sans-serif;
    }

    .input-div .a, .b, .c, .d, .e, .f, .g, .h, .i{
        margin-bottom: 4px;
    }


    a{
        text-align: right;
        text-decoration: none;
        color: #999;
        font-size: 0.9rem;
        transition: .3s;
        position: relative;
    }
    a:hover{
        color: #2c578f;
    }

    .btn{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        outline: none;
        border: none;
        background-image: linear-gradient(to right, #2c578f, #00FFFF, #2c578f);
        background-size: 200%;
        font-size: 1.2rem;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
    }
    .btn:hover{
        background-position: right;
    }


    @media screen and (max-width: 1050px){
        .container{
            grid-gap: 5rem;
        }
    }

    @media screen and (max-width: 1000px){
        .row{
            margin-left: 5%;
            width: 450px;
        }

        .login-content h2{
            font-size: 2.4rem;
            margin: 8px 0;
        }

        .img img{
            width: 400px;
        }
    }

    @media screen and (max-width: 900px){
        .container{
            grid-template-columns: 1fr;
        }

        .img{
            display: none;
        }

        .wave{
            width: 1200px;
        }

        .login-content{
            justify-content: center;
        }
    }
    .eye-icon{
        position: absolute;
        top: 54%;
        right: 10px;
        transform: translateY(-50%);
        font-size: 20px;
        color: #8b8b8b;
        cursor: pointer;
        padding: 5px;
    }
    .invalid-feedback {
        margin-top: 18%;
        position: relative;
    }
    .availability{
        margin-top: 18%;
        color: green;
    }
    .availability1{
        margin-top: 18%;
        color: red;
    }
</style>
<body>
    <img class="wave" src="img/bg1.jpg">
    <div class="container">
        <div class="img">
            <!-- <img src="img/left-img.png"> -->
        </div>

        <div class="login-content">
            <form action="Signupcode.php" method="POST" class="row g-3 needs-validation" novalidate>
                <img src="img/Logolabel3.png">
                <h3 class="title">Sign Up</h3>

                <div class="col-md-6 input-div b">
                   <div class="i"> 
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Fisrt Name</h5>
                        <input type="text" class="input" name="fname" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Please Input Your First Name.
                        </div>
                   </div>
                </div>

                <div class="col-md-6 input-div b">
                   <div class="i"> 
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Last Name</h5>
                        <input type="text" class="input" name="lname" id="validationCustom02" required>
                        <div class="invalid-feedback">
                            Please Input Your Last Name.
                        </div>
                   </div>
                </div>

                <div class="col-md-6 input-div c">
                   <div class="i"> 
                        <i class="fas fa-map-marker"></i>
                   </div>
                   <div class="div">
                        <h5>Address</h5>
                        <input type="text" class="input" id="validationCustom03" name="address" required>
                        <div class="invalid-feedback">
                            Please Input Your Address.
                        </div>
                   </div>
                </div>

                <div class="col-md-6 input-div d">
                   <div class="i"> 
                        <i class="fa fa-envelope"></i>
                   </div>
                   <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" id="validationCustom04" name="email" required>
                        <div class="invalid-feedback">
                            Please Input Your Email.
                        </div>
                   </div>
                </div>

                <div class="col-md-6 input-div e">
                   <div class="i"> 
                        <i class="fa fa-phone"></i>
                   </div>
                   <div class="div">
                        <h5>Contact No.</h5>
                        <input type="number" class="input" id="validationCustom02" name="contact" required>
                        <div class="invalid-feedback">
                            Please Input Your Contact No.
                        </div>
                   </div>
                </div>

                <?php
                    $processAllowed = true;

                    if ($processAllowed) {
                        $sponsorid = isset($_GET['sponsorid']) ? $_GET['sponsorid'] : '';
                ?>
                <div class="col-md-6 input-div f">
                   <div class="i"> 
                        <i class="fa fa-street-view"></i>
                   </div>
                   <div class="div">
                        <h5>Sponsor ID</h5>
                        <input type="text" class="input sponsorid" id="validationCustom06" name="sponsorid" value="<?php echo $sponsorid ?>" required>
                        <div class="availability"></div>    
                        <div class="invalid-feedback">
                            Input the Sponsor Account ID.
                        </div>
                   </div>
                </div>
                <?php
                    }
                ?>

                <div class="col-md-6 input-div g">
                   <div class="i"> 
                        <i class="fa fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>User Name</h5>
                        <input type="tex" class="input username" id="validationCustom04" name="username" required>
                        <div class="availability1"></div>
                        <div style="margin-top: 18%; " class="invalid-feedback">
                            Please Input Your User Name.
                        </div>            
                   </div>
                </div>

                <div class="col-md-6 input-div h">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Create Password</h5>
                        <input type="password" class="input password" id="validationCustom011" name="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" required>
                        <div class="invalid-feedback">
                            At least 8 characters, 1 special character, 1 number.
                        </div>
                        <i class='bx bx-hide eye-icon'></i>
                   </div>
                </div>

                <div class="col-md-6 input-div i">
                   <div class="i"> 
                        <i class="fa fa-key"></i>
                   </div>
                   <div class="div">
                        <h5>Confirmation Password</h5>
                        <input type="password" class="input password" name="confirmpassword" pattern="(?=.*\d)(?=.*[a-z]).{8,}" id="validationCustom012" required>         
                        <div class="invalid-feedback">
                            Please Confirm Your Password.
                        </div>
                        <i class='bx bx-hide eye-icon'></i>
                   </div>
                </div>
                <input type="hidden" name="usertype" value="user">
                <input type="hidden" name="status" value="inactive account">
                <input type="hidden" name="account" value="unblock">
                <input type="hidden" name="accountid" value="xxxxx">

                <input type="submit" class="btn" name="register" value="Sign Up">
                
                    <span>Already have an account?<a href="Signin.php" class="link login-link"> Sign In</a>
                
            </form>

        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
        const forms = document.querySelector(".forms"),
      pwShowHide = document.querySelectorAll(".eye-icon");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
        
        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })
        
    })
})      

    </script>
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
    <!-- Sponsor Checker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.sponsorid').keyup(function (e){
                
                var sponsorid = $('.sponsorid').val();
                // alert(sponsorid);
                $.ajax({
                    type: "POST",
                    url: "Check_sponsorid.php",
                    data: {
                        "check_submit_btn": 1,
                        "sponsorid_text": sponsorid,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.availability').text(response);
                        
                    }
                });
            });
        });
    </script>
    <!-- Username Checker -->
    <script type="text/javascript">
        $(document).ready(function (){
            $('.username').keyup(function (e){
                
                var username = $('.username').val();
                // alert(username);
                $.ajax({
                    type: "POST",
                    url: "Check_username.php",
                    data: {
                        "check_submit_btn": 1,
                        "username_text": username,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.availability1').text(response);
                        
                    }
                });
            });
        });
    </script>
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
