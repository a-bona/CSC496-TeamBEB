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
          <a href="newemployee.html" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
          <form action="" method="POST">
              <button class="searchItems" type="submit" name="submit">Search</button>
              <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search" id="myInput" onkeyup="myFunction()">
              <select class="statusDD searchItems" name="Assigned">
                <option value="1">Assigned</option>
                <option value="0">Unassigned</option>
                <option value="All">All</option>
              </select>
          </form>
        </div>
        <script>
        function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
        <div class="col-xs-10">
            <table class="table-hover tableLookup" id="myTable">
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

              if(isset($_POST['submit']))
              {
                $name = $_POST['searchBox'];
                $assigned = $_POST['Assigned'];
                $db = mysqli_connect('localhost', 'root', '', 'Project1');
                $errors = array();
                $sql="SELECT * FROM Employees WHERE Assigned = $assigned ";
                $results= mysqli_query($db, $sql);
                $employeeMaster = 'employeeMaster.php';

                while($row = mysqli_fetch_array($results))
                {
                  "<a href='$employeeMaster'>".$row["EmployeeID"]."</a>";
                  echo "<tr>
                  <td><a href='$employeeMaster'>".$row["First_Name"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["Last_Name"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["Phone"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["Email"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["City"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["State"]."</td></a>
                  <td><a href='$employeeMaster'>".$row["Assigned"]."</td></a>
                </tr>";
                  }
                }
                else
                {
                  $db = mysqli_connect('localhost', 'root', '', 'Project1');
                  $errors = array();
                  $sql="SELECT * FROM Employees";
                  $results= mysqli_query($db, $sql);
                  $employeeMaster = 'employeeMaster.php';

                  while($row = mysqli_fetch_array($results))
                  {
                    "<a href='$customerMaster'>".$row["EmployeeID"]."</a>";
                    echo "<tr>
                    <td><a href='$employeeMaster'>".$row["First_Name"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["Last_Name"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["Phone"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["Email"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["City"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["State"]."</td></a>
                    <td><a href='$employeeMaster'>".$row["Assigned"]."</td></a>
                  </tr>";
                    }
                }
              ?>
              <script type="text/javascript">
              jQuery(document).ready(function($) {
                  $(".clickable-row").click(function() {
                      window.location = $(this).data("href");
                  });
              });
              </script>
          </table>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
