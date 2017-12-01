<?php

  if(isset($_POST["loginbutton"]))
  {
      $username=$_POST["Username"];
      $password=$_POST["Password"];
      $hpassword=md5($password);

      require 'UserAuthenticator.php';
      $UserAuthenticator = new UserAuthenticator;
      $UserAuthenticator->logUserIn($username);
      $authenticate=$UserAuthenticator->authenticate($username, $hpassword);

      if($authenticate == true)
      {
        header("location: dashboard.php");
      }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body id="loginBG">
    <div class="container" id="loginBox">
          <div class="loginBox center">
              <h1 id="loginHeader">Login</h1>
              <form action="login.php" method="POST">
                <input class="logInput" type="text" name="Username" placeholder=" Username">
                <br>
                <input class="logInput" type="password" name="Password" placeholder=" Password">
                <br>
                <input id="logButton" type="submit" value="Login" name="loginbutton">
              </form>
              <p>Do you want to register? Click<a href="register.php"> here</a></p>
          </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>