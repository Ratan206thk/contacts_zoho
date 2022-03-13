<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'users';
    $dbconnection = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
    $url=explode('/', $_SERVER['PHP_SELF']);
    $em=end($url);;
    $sqlquery = "SELECT `contacts` FROM `users` WHERE `email` = '{$em}';";
    $data = $dbconnection -> query($sqlquery);
    $row = $data -> fetch_assoc();
    $con=$row['contacts'];
    $each=explode('>',$con);
    if(!($data = $dbconnection -> query($sqlquery)))
    echo "<script>alert('invalid');</script>";
    if($_POST)
    {
        $lis="";
        foreach ($_POST as $key => $value) {
            $lis.=$value.",";
        }
        $lis=rtrim($lis, ",");
        array_push($each,$lis);
        $cc=implode(">",$each);
        
        $sqlquery = "UPDATE `users` SET `contacts` = '$cc' WHERE `users`.`email` = '{$em}';";
        $data = $dbconnection -> query($sqlquery);
        if($dbconnection -> query($sqlquery) === true){
            echo "<script>alert('Contacts Added!');</script>";
            echo "<script>window.location.href='../contacts.php/'. '{$em}';</script>"; 
        }
        else{            
        echo "<script>alert('Please try again');</script>";
        echo "<script>window.location.href='../contacts.php/'. '{$em}';</script>"; 
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../record.css">
    <title>CONTACTS</title>
</head>

<body>
<button class="btn"style="float:right; top:-20px;" onclick="window.location.href='../../signin.php';">Log out</button>
    <h1>Contact Form and Contact list Page</h1>
    <h3>Add Contacts</h3>
    <form onsubmit="return contact();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input">
            <label for="name">Name</label>
            <input type="text" placeholder="Name" name="name" onclick="dislighting(this.id)" id="name" >
            <span id="nam" class="warning"></span>
        </div>
        <br>
        <div class="input">
            <label for="phone">Phone Number</label>
            <input type="tel" placeholder="Phone Number" name="phone" onclick="dislighting(this.id)" id="phone" >
            <span id="phon" class="warning"></span>
        </div>
        <br>
        <div class="input">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" onclick="dislighting(this.id)" id="email" >
            <span id="emai" class="warning"></span>
        </div>
        <button type="submit" class="btn submit">
            Save
        </button>
    </form>
  <h3>My Contacts</h3>
  <?php         if(count($each)>1 )  { ?>
  <div class="table-responsive-md">
    <div>
      <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Ph No</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <?php   
        $contacts=[];
        for ($i=1; $i < count($each); $i++) {
            $contacts[$i]=explode(',',$each[$i]);
            $x=$contacts[$i];
            echo "<tr>";
            for($j=0;$j<count($x);$j++){
            echo "<td>".$x[$j]."</td>";
            }
            echo "</tr>";
             } ?>
      </table>
    </div>
  </div>
  <?php } else { echo "<h3>There are no contacts to display..!!!</h3>";}?>
</body>
<script src="../verify.js"></script>
</html>    