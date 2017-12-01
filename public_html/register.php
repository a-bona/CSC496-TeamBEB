<?php
      
  if(isset($_POST["submit"])) {
    $dbUser = "root";
    $dbPass = "";
    $dbName = "capstone";
    $servername = "localhost";
    
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
      $hPassword=md5($Password);
    $Email = $_POST["Email"];
    $UserStart = $_POST["UserStart"];
    
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $sql= ("INSERT INTO Users (FirstName, LastName, Password, Username, Email, UserStart)
            VALUES (:FirstName, :LastName, :Password, :Username, :Email, :UserStart)");
    $query = $dbh->prepare($sql);
    $query->bindvalue(":FirstName", $FirstName);
    $query->bindvalue(":LastName", $LastName);
    $query->bindvalue(":Username", $Username);
    $query->bindvalue(":Password", $hPassword);
    $query->bindvalue(":Email", $Email);
    $query->bindvalue(":UserStart", $UserStart);
        
    $success = $query->execute();
    if($success)
    {
      header("location: login.php");   
    }
    
    if (!$success) {
        exit("error1");
    }
          
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row pageBanner">
          <h1 class="center">Registration</h1>
      </div>
      <form  action="register.php" method="POST">
        <div class="row topBuffer">
          <div class="col-md-6">
            <label for="firstName">First Name</label>
            <input class="form-control" type="text" name="FirstName" placeholder="First Name">
          </div>
          <div class="col-md-6">
              <label for="lastName">Last Name</label>
              <input class="form-control" type="text" name="LastName" placeholder="Last Name">
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
            <label for="password">Username</label>
            <input class="form-control" type="text" name="Username" placeholder="Username">
          </div>
          <div class="col-md-6">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="Password" placeholder="Password">
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
              <label for="email">Email</label>
              <input class="form-control" type="text" name="Email" placeholder="Email">
          </div>
          <div class="col-md-6">
            <label for="userStart">Start Date</label>
            <input class="form-control" type="date" name="UserStart" placeholder="yyyy-mm-dd">
          </div>
        </div>
        <br>
          <div class="center col-md-12">
              <input class="addSubBtn" type="submit" name="submit" value="Register">
          </div>
        </div>
      </form>
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>