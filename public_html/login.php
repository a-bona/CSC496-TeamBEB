
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styleAltered.css" rel="stylesheet">
  </head>
  <body id="loginBG">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="loginBox center">
              <h1 id="loginHeader">Login</h1>
              <form action="login.php" method="POST">
                <input class="logInput" type="text" name="Username" placeholder="username">
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input class="logInput" type="password" name="Password" placeholder="password">
                <img class="loginImg" src="images/loginKey.png"/>
                <br>
                <input id="logButton" type="submit" value="Login" name="loginbutton">
              </form>
              <p>Do you want to register? Click<a href="register.php">here</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  //connecting to the DataBase
  $db = mysqli_connect('localhost', 'root', '', 'Project1');
  $errors = array();

  if (isset($_POST['loginbutton'])) {
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query1 = "SELECT * FROM Users WHERE Username='".$username."' and Password='".$password."';";
    $results = mysqli_query($db, $query1);

  if (mysqli_num_rows($results) != 0) {
    $_SESSION['Username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: jobLookup.php');
  }else {
    array_push($errors, "Wrong username/password combination");
    }
  }
}

?>
