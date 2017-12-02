<?php
    include 'connectDB.php';
    include 'classes/employeeClass.php';
    
    $employees = new employees($dbh);
    
    if(isset($_POST["search"])) {
      
      $searchStr = $_POST["searchBox"];
      $ddValue = $_POST["assigned"];
      
      $allEmployeeRows = $employees->searchEmployees($searchStr, $ddValue);
    
    }
    
    else {

      $allEmployeeRows = $employees->getAllEmployees(); 
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Employee Lookup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styleAltered.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2 nameBanner">
            <h3>Software X</h3>
        </div>
        <div class="col-xs-10 pageBanner">
          <h3>Employee Lookup</h3>
        </div>
      </div>
      <div class="row">
          <ul class="col-xs-2 ulNav">
            <li><a href=""><i class="fa fa-bars"></i>Menu</a></li>
            <li><a href=""><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href=""><i class="fa fa-users"></i>Employees</a></li>
            <li><a href=""><i class="fa fa-building"></i>Customers</a></li>
            <li><a href=""><i class="fa fa-calendar"></i>Schedule</a></li>
            <li><a href=""><i class="fa fa-cogs"></i>Settings</a></li>
            <li><a href=""><i class="fa fa-power-off"></i>Logout</a></li>
          </ul>
        <div class="col-xs-10 searchBanner">
          <a href="addEmployee.php" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
          <form action="employeeLookup.php" method="POST">
              <button class="searchItems" type="submit" name="search">Search</button>
              <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search">
              <select class="statusDD searchItems" name="assigned">
                <option value="assigned">Assigned</option>
                <option value="unassigned">Unassigned</option>
                <option value="All">All</option>
              </select>
          </form>
        </div>
        <div class="col-xs-10">
            <table class="table-hover tableLookup">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>State</th>
                <th>Assigned</th>
              </tr>
              <?php
              foreach($allJobRows as $row)
              {
                $id = $row["EmployeeID"];
              ?>
                <td><?= $row["First_Name"] ?></td>
                <td><?= $row["Last_Name"] ?></td>
                <td><?= $row["Phone"] ?></td>
                <td><?= $row["Email"] ?></td>
                <td><?= $row["City"] ?></td>
                <td><?= $row["State"] ?></td>
                <td><?= $row["Assigned"] ?></td>
                <td>
                  <form action="employeeMaster-Main.php" method="POST">
                    <input type="hidden" name="employeeID" value="<?= $id ?>">
                    <input class="viewBtn" type="submit" name="view" value="view">
                  </form>
                </td>
              </tr>
              <?php
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