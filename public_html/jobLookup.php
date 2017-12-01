<!DOCTYPE html>
<html>
<head>
  <title>Job Lookup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
  <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2 nameBanner">
            <h3>Software X</h3>
        </div>
        <div class="col-xs-10 pageBanner">
          <h3>Job Lookup</h3>
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
          <div class="col-xs-10 searchBanner">
            <a href="addJob.php" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
            <form>
                <button class="searchItems" type="submit">Search</button>
                <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search">
                <select class="statusDD searchItems" name="status">
                  <option value="active">Active</option>
                  <option value="active">Inactive</option>
                  <option value="active">All</option>
                </select>
            </form>
          </div>
          <div class="col-xs-10">
              <table class="table-hover tableLookup">
                <form method="GET">
                  <input type="hidden" value="test" name="f" />
                </form>
              <tr>
                <th>Title</th>
                <th>Company</th>
                <th>City</th>
                <th>State</th>
                <th>Active</th>
              </tr>
            <?php
              //connecting to the DataBase
              $db = mysqli_connect('localhost', 'root', '', 'capstone');
              $errors = array();
              $sql="SELECT * FROM Jobs";
              $results= mysqli_query($db, $sql);
              $jobMaster = 'jobMaster.php';
              while($row = mysqli_fetch_array($results))
              {
                echo "<tr>
                        <td><a href='$jobMaster'>".$row["JobTitle"]."</td></a>
                        <td><a href='$jobMaster'>".$row["Department"]."</td></a>
                        <td><a href='$jobMaster'>".$row["City"]."</td></a>
                        <td><a href='$jobMaster'>".$row["State"]."</td></a>
                        <td><a href='$jobMaster'>".$row["Active"]."</td>
                      </tr>";
              }
              ?>

          </table>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>