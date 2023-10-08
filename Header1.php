<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>M.E.R.G.E</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="icon" href="M.png">
    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="#">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Alertify Js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            width: 100%;
            background: url(bg1.jpg);
            background-size: cover;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 5px 100px;
            z-index: 100000;
        }
        header.sticky {
            background: #fff;
        }
        header .logo {
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            font-size: 2em;
            text-transform: uppercase;
            transition: 0.6s;
        }
        header .signup{
            margin-left: 50%;
            position: absolute;
            text-decoration: none;
            color: #fff;
        }
       
        header .signin {
            margin-left: 70%;
            position: absolute;
            text-decoration: none;
            color: #fff;
        }
        header ul {
            display: none;
        }
        header ul li {
            list-style: none;
        }
        header ul li a {
            margin: 0 15px;
            text-decoration: none;
            color: #fff;
            letter-spacing: 5px;
            font-weight: 500;
            transition: 0.6s;
        }
        .banner {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url(bg.jpg);
            background-size: cover;
        }
        header.sticky .logo,
        header.sticky .signin,
        header.sticky .signup,
        header.sticky .lead,
        header.sticky ul li a {
            color: #000;
        }
        @media (max-width: 768px) {
            header {
                padding: 5px 10px;
            }
            header.sticky ul {
                display: flex;
                flex-direction: column;
                align-items: center;
                position: absolute;
                top: 60px;
                left: 0;
                background: #fff;
                width: 100%;
            }
            header.sticky ul li a {
                margin: 10px 0;
            }
            header .signup,
            .lead {
                
                text-decoration: none;
                color: #fff;
            }
            header .signin {
                
                text-decoration: none;
                color: #fff;
            }
        }
        /* Add a media query for larger screens where you want to remove spacing */
        @media (min-width: 769px) {
            header .signup,
            header .lead,
            header .signin {
                margin-right: 10px;
            }
        }
        .logo:hover {
            color: #fff;
        }
        header.sticky .logo img {
            width: 150px;
            filter: grayscale(100%) invert(100%);
            transition: 0.6s;
        }
        .black-image {
            filter: grayscale(0%) invert(0%);
        }
    </style>
<body>
    <header>
        <a href="index.php" class="logo"><img style="width: 150px;" src="img/Logolabel2.png"></a>
        <a href="Signup.php" class="signup">Sign Up</a> <a href="Signin.php" class="signin">Sign In</a>
    </header>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            const logoImg = document.querySelector('.logo img');

            if (window.scrollY > 0) {
                header.classList.add('sticky');
                logoImg.classList.add('black-image');
            } else {
                header.classList.remove('sticky');
                logoImg.classList.remove('black-image');
            }
        });
    </script>
</body>
</html>
