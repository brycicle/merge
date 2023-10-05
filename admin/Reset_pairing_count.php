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
    <title>Reset Pairing</title>
    <style type="text/css">
    body{
        text-align: center   
    }    
    .button-container {
    text-align: center;
    margin-top: 50px;
 
    }

    button {
        padding: 10px 20px;
        background-color: #2c578f;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }

    button:hover {
        background-color: #007bff;
        color: white;
    }
            /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
:root {
  --primary-color: #f6f7fb;
  --white-color: #fff;
  --black-color: #18191a;
  --red-color: #e74c3c;
}
body {
  background: var(--primary-color);
}
body.dark {
  --primary-color: #242526;
  --white-color: #18191a;
  --black-color: #fff;
  --red-color: #e74c3c;
}
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 60px;
}
.container .clock {
  display: flex;
  height: 400px;
  width: 400px;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
  background: var(--white-color);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1), 0 25px 45px rgba(0, 0, 0, 0.1);
  position: relative;
}
.clock label {
  position: absolute;
  inset: 20px;
  text-align: center;
  transform: rotate(calc(var(--i) * (360deg / 12)));
}
.clock label span {
  display: inline-block;
  font-size: 30px;
  font-weight: 600;
  color: var(--black-color);
  transform: rotate(calc(var(--i) * (-360deg / 12)));
}
.container .indicator {
  position: absolute;
  height: 10px;
  width: 10px;
  display: flex;
  justify-content: center;
}
.indicator::before {
  content: "";
  position: absolute;
  height: 100%;
  width: 100%;
  border-radius: 50%;
  z-index: 100;
  background: var(--black-color);
  border: 4px solid var(--red-color);
}
.indicator .hand {
  position: absolute;
  height: 130px;
  width: 4px;
  bottom: 0;
  border-radius: 25px;
  transform-origin: bottom;
  background: var(--red-color);
}
.hand.minute {
  height: 120px;
  width: 5px;
  background: var(--black-color);
}
.hand.hour {
  height: 100px;
  width: 8px;
  background: var(--black-color);
}
.mode-switch {
  padding: 10px 20px;
  border-radius: 8px;
  font-size: 22px;
  font-weight: 400;
  display: inline-block;
  color: var(--white-color);
  background: var(--black-color);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}  
    body {
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .table-container {
        position: relative;
        width: 100%;
    }

    table {
        position: sticky;
        top: 0;
        background-color: #ffffff;
        width: 50%;
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
    .cl{
        margin-left: 5%;
        margin-top: 4%;
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
</head>
<body>
    <div class="button-container">
        <form action="Reset_pairing_count.php" method="post">
        <button id="interactive-button" type="submit">Reset Pairing Count</button>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="clock">
            <label style="--i: 1"><span>1</span></label>
            <label style="--i: 2"><span>2</span></label>
            <label style="--i: 3"><span>3</span></label>
            <label style="--i: 4"><span>4</span></label>
            <label style="--i: 5"><span>5</span></label>
            <label style="--i: 6"><span>6</span></label>
            <label style="--i: 7"><span>7</span></label>
            <label style="--i: 8"><span>8</span></label>
            <label style="--i: 9"><span>9</span></label>
            <label style="--i: 10"><span>10</span></label>
            <label style="--i: 11"><span>11</span></label>
            <label style="--i: 12"><span>12</span></label>
            <div class="indicator">
                <span class="hand hour"></span>
                <span class="hand minute"></span>
                <span class="hand second"></span>
            </div>
        </div>
        <div class="mode-switch">Dark Mode</div>
    </div>
    
    <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Include your database connection code here, assuming $conn is your database connection
                
                // Reset pairing count to zero
                $sql = "UPDATE genealogy SET pairing_count_AM = 0, pairing_count_PM = 0";
                $stmt = $conn->prepare($sql);
                
                if ($stmt->execute()) {
                    // The update was successful, now insert a record into reset_pairing table
                    $sql = "INSERT INTO reset_pairing (admin_reseter) VALUES (?)";
                    $stmt_1 = $conn->prepare($sql);
                    
                    if ($stmt_1->execute([$username])) {
                        
                    }
                }
            }
        }
    ?>

    <?php 
        $sql = "SELECT * FROM reset_pairing ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
    ?>
    <div class="cl"></div>
    <div class="table-container">
        <table class="ta">
            <thead>
                <tr id="header">

                    <th>Reseter</th>
                    <th>Date</th>

                </tr>
            </thead>
            <?php    
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody id="data_table">
                <tr>
                    <td data-label = "Setter"><?php echo $row['admin_reseter'] ?></td>
                    <td data-label = "Date" style="color: #2c578f;"><?php echo date('M  j, o | g:i A', strtotime($row["date"])); ?></td>    
                </tr>
                <?php 
                    }
                } else {
                ?>
                <tr>
                    <td colspan="2" style="text-align: center;">No Record Found</td>
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