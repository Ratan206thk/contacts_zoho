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
    $sqlquery = "INSERT INTO `users` (`email`, `password`, `secret`) VALUES ('{$_POST['email']}', '". password_hash($_POST['password'], PASSWORD_DEFAULT) . "', '". password_hash($_POST['secret'], PASSWORD_DEFAULT) . "');";
    $data;$row;
    if($dbconnection -> query($sqlquery) === true){
        $accept = true;
        echo "<script>alert('Signed up successfully. Please sign in to continue');</script>"; 
        echo '<script>window.location.href="../signin.php";</script>';    
    }
    else            
    echo "<script>alert('Account already exist with the email..!!!');</script>";
}
?>

<?php mysqli_close($dbconnection); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>
<body>
    <div class="head">  
        <div class="main">
            <div class="up">
                <div class="top">
                    <img src="Images/Img2.png" alt="">
                </div>
                <form onsubmit="return verify();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p class="txt">Sign up Here</p>
                    <p class="xt">Already have an account? <a href="./signin.php">Sign in</a></p>
                    <div class="input">
                        <input type="email" placeholder="Email" name="email" onclick="dislighting(this.id)" id="text" >
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
                        <input type="text" placeholder="Secret Code" name="secret" onclick="dislighting(this.id)" id="secret" >
                        <span class="pic"><img src="Images/Img4.png" alt=""></span>
                        <span id="sec" class="warning"></span>
                    </div>
                    <p style="font-size:14px;">By clicking <img src="Images/Img3.png" width="14" alt=""> , you are creating an account, and you agree to the Terms of use.</p>
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