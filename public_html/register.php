
<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
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
              <h1 id="loginHeader">Registration</h1>
              <form action="register.php" method="POST">
                <input class="logInput" type="text" name="FirstName" placeholder="firstname" size='20'>
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input class="logInput" type="text" name="LastName" placeholder="lastname">
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input class="logInput" type="text" name="Username" placeholder="username">
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input class="logInput" type="password" name="Password" placeholder="password">
                <img class="loginImg" src="images/loginKey.png"/>
                <br>
                <input class="logInput" type="text" name="Email" placeholder="email">
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input class="logInput" type="text" name="UserStart" placeholder="StartDateFormat:####-##-##">
                <img class="loginImg" src="images/loginUsername.png"/>
                <br>
                <input id="logButton" type="submit" value="Submit" name="submitbutton">
              </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
 session_start();
  //Checking the variables are empty
  $fname="";
  $lname="";
  $username="";
  $password="";
  $email="";
  $userstart="";
  $errors = array();
  $_SESSION['success'] = "";
  //connecting to the DataBase
  $db = mysqli_connect('localhost', 'root', '', 'Project1');

  if (isset($_POST['submitbutton'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['FirstName']);
    $lname = mysqli_real_escape_string($db, $_POST['LastName']);
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $userstart = mysqli_real_escape_string($db, $_POST['UserStart']);
    // form validation: ensure that the form is correctly filled
    if (empty($fname)) { array_push($errors, "FirstName is required"); }
    if (empty($lname)) { array_push($errors, "LastName is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($userstart)) { array_push($errors, "UserStart is required"); }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
      //encrypt the password before saving in the database
      $password = md5($password);
      $query = "INSERT INTO Users (FirstName, LastName, Password, Username, Email, UserStart)
                  VALUES('$fname', '$lname', '$password', '$username', '$email', '$userstart')";
      mysqli_query($db, $query);

      $_SESSION['Username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: register.php');
     }
   }
?>
