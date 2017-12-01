<?php
require 'UserAuthenticator.php';
$UserAuthenticator = new UserAuthenticator;
$isLoggedIn=$UserAuthenticator->isLoggedIn();

if($isLoggedIn==false)
{
  $UserAuthenticator->redirectToLogin();
}

if(isset($_POST["no"]))
{
  header("location: dashboard.php");
}
if(isset($_POST["yes"]))
{
  $UserAuthenticator->logout();
  $UserAuthenticator->redirectToLogin();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Logout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  <form  action="logout.php" method="POST">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2 nameBanner">
            <h3>Software X</h3>
        </div>
        <div class="col-xs-10 pageBanner">
          <h3>Logout</h3>
        </div>
      </div>
      <div class="row">
          <ul class="col-xs-2 ulNav">
              <li class="navTitle"><a><i class="fa fa-bars"></i>Menu</a></li>
              <li class="navLinks"><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
              <li class="navLinks"><a href="employeeLookup.php"><i class="fa fa-users"></i>Employees</a></li>
              <li class="navLinks"><a href="customerLookup.php"><i class="fa fa-building"></i>Customers</a></li>
              <li class="navLinks"><a href="jobLookup.php"><i class="fa fa-briefcase"aria-hidden="true"></i>Jobs</a></li>
              <li class="navLinks"><a href="/calendar/index.html"><i class="fa fa-calendar"></i>Schedule</a></li>
              <li class="navLinks"><a href="settings.php"><i class="fa fa-cogs"></i>Settings</a></li>
              <li class="navLinks"><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
            </ul>
        <div class="col-xs-10" class="pagecontent">
          <h3 id="logoutTitle">Are you sure you want to Logout?</h3>
        <div class="center col-md-12">
              <br><input class="addSubBtn" type="submit" name="yes" value="Yes"><br> <br>
          </div>
          
          <div class="center col-md-12">
              <input class="addSubBtn" type="submit" name="no" value="No">
          </div>
        </div>

      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</form>
  </body>
</html>
