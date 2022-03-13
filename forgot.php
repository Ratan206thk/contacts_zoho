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
    if (isset($_POST['password'])) {
        $sqlquery = "UPDATE `users` SET `password` = '". password_hash($_POST['password'], PASSWORD_DEFAULT) . "' WHERE `users`.`email` = '{$_POST['email']}';";
        $data = $dbconnection -> query($sqlquery);
        if($dbconnection -> query($sqlquery) === true){
            echo "<script>alert('Password Changed. Please sign in to continue');</script>";
            echo '<script>window.location.href="../signin.php";</script>'; 
        }
        else{            
        echo "<script>alert('Please try again');</script>";
        echo '<script>window.location.href="../forgot.php";</script>'; 
        }
     }
     else{
    $sqlquery = "SELECT * FROM `users` WHERE `email` = '{$_POST['email']}';";
    $data = $dbconnection -> query($sqlquery);
    if($data -> num_rows <= 0)
        echo "<script>alert('Account do not exist..!!!');</script>";
    else{
        $row = $data -> fetch_assoc();
        if(password_verify($_POST['secret'],$row['secret']))
            $accept = true;
        else
            echo "<script>alert('Invalid Secret Code');</script>";
        if($accept){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Forgot</title>
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
                    <form onsubmit="return verify();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <p class="txt">Forgot Password</p>
                        <p class="xt">Dont have an account? <a href="./signup.php">Sign up</a></p>
                        <div class="input">
                            <input type="email" placeholder="Email" name="email" onclick="dislighting(this.id)" id="text" value="<?php echo $_POST['email'];?>" readonly >
                            <span class="pic"><img src="Images/Img4.png" alt=""></span>
                            <span id="email" class="warning"></span>
                        </div>
                        <div class="input">
                            <input type="password" placeholder="Password" name="password" onclick="dislighting(this.id)" id="pass" >
                            <span class="pic"><img src="Images/Img5.png" alt=""></span>
                            <span id="password" class="warning"></span>
                        </div>
                        <div class="input">
                            <input type="password" placeholder="Confirm Password" name="confirm_password" onclick="dislighting(this.id)" id="confirm" >
                            <span class="pic"><img src="Images/Img5.png" alt=""></span>
                            <span id="conpassword" class="warning"></span>
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Secret Code" name="secret" onclick="dislighting(this.id)" id="secret" value="<?php echo $_POST['secret'];?>" readonly>
                            <span class="pic"><img src="Images/Img5.png" alt=""></span>
                            <span id="sec" class="warning"></span>
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
<?php
        }
    }}
}
if(!($_POST) || !($accept)){
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
                    <form onsubmit="return sec();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <p class="txt">Forgot Password</p>
                        <p class="xt">Dont have an account? <a href="./signup.php">Sign up</a></p>
                        <div class="input">
                            <input type="email" placeholder="Email" name="email" onclick="dislighting(this.id)" id="text" >
                            <span class="pic"><img src="Images/Img4.png" alt=""></span>
                            <span id="email" class="warning"></span>
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Secret Code" name="secret" onclick="dislighting(this.id)" id="secret" >
                            <span class="pic"><img src="Images/Img5.png" alt=""></span>
                            <span id="sec" class="warning"></span>
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
<?php
}
?>