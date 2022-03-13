<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'users';

$accept = false;
$dbconnection = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
 ?><?php
 if($_POST)
{
    $sqlquery = "SELECT * FROM `users` WHERE `email` = '{$_POST['email']}';";
    $data = $dbconnection -> query($sqlquery);
    if($data -> num_rows <= 0){
        echo "<script>alert('Account do not exist..!!!');</script>";
    }
    else{
        $row = $data -> fetch_assoc();
        if(password_verify($_POST['password'],$row['password'])){
            $accept = true;
        }
        else{
            echo "<script>alert('Invalid password');</script>";
        }
        if($accept){
            mysqli_close($dbconnection);
            header("Location: ../contacts.php/" . "{$row['email']}");
        }
    }
    mysqli_close($dbconnection);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signin</title>
</head>
<body>
    <style>
        .input{
            margin:60px auto;
        }
        .main form{
            padding:30px;
            margin-top:-40px;
        }
    </style>
    <div class="head">  
        <div class="main">
            <div class="up">
                <div class="top">
                    <img src="Images/Img2.png" alt="">
                </div>
                <form onsubmit="return verifyin();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p class="txt">Sign In Here</p>
                    <p class="xt">Dont have an account? <a href="./signup.php">Sign up</a></p>
                    <div class="input">
                        <input type="email" placeholder="Email" name="email" onclick="dislighting(this.id)" id="text" >
                        <span class="pic"><img src="Images/Img4.png" alt=""></span>
                        <span id="email" class="warning"></span>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" name="password" onclick="dislighting(this.id)" id="pass" >
                        <span class="pic"><img src="Images/Img5.png" alt=""></span>
                        <br>
                        <a style="float:right;" href="./forgot.php">Forgot your Pasword?</a>
                        <span id="password" class="warning"></span>
                    </div>
                    <button type="submit" class="btn submit">
                        <img src="Images/Img3.png" alt="">
                    </button>
                </form>
            </div>  
        </div>  
    </div>
</body>
<script src="verify.js"></script>
</html>