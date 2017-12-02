<!DOCTYPE html>
<html>
  <head>
    <title>Job Lookup</title>
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
          <h3>Job Lookup</h3>
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
            <a href="newJob.html" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
            <form action="" method="post">
                <button class="searchItems" type="submit">Search</button>
                <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search" id="myInput" onkeyup="myFunction()">
                <select class="statusDD searchItems" name="Status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                  <option value="">All</option>
                </select>
            </form>
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
          </div>
          <div class="col-xs-10">
              <table class="table-hover tableLookup" id="myTable">
              <tr>
                <th>Title</th>
                <th>Company</th>
                <th>City</th>
                <th>State</th>
                <th>Active</th>
              </tr>
              <?php
                  session_start();

                  if(isset($_POST['submit']))
                  {
                    $active = $_POST['Status'];
                    //connecting to the DataBase
                    $db = mysqli_connect('localhost', 'root', '', 'Project1');
                    $errors = array();
                    $sql="SELECT * FROM Jobs WHERE Active = $active ";
                    $results= mysqli_query($db, $sql);
                    $jobMaster = 'jobMaster.php';

                  while($row = mysqli_fetch_array($results))
                  {
                    "<a href='$jobMaster'>".$row["CustomerID"]."</a>";
                    echo "<tr>
                        <td><a href='$jobMaster'>".$row["JobTitle"]."</td></a>
                        <td><a href='$jobMaster'>".$row["Department"]."</td></a>
                        <td><a href='$jobMaster'>".$row["City"]."</td></a>
                        <td><a href='$jobMaster'>".$row["State"]."</td></a>
                        <td><a href='$jobMaster'>".$row["Active"]."</td>
                        </tr>";
                  }
                  }
                  else
                  {
                    $db = mysqli_connect('localhost', 'root', '', 'Project1');
                    $errors = array();
                    $sql1="SELECT * FROM Jobs";
                    $results= mysqli_query($db, $sql1);
                    $jobMaster = 'jobMaster.php';

                  while($row = mysqli_fetch_array($results))
                  {
                    "<a href='$jobMaster'>".$row["CustomerID"]."</a>";
                    echo "<tr>
                            <td><a href='$jobMaster'>".$row["JobTitle"]."</td></a>
                            <td><a href='$jobMaster'>".$row["Department"]."</td></a>
                            <td><a href='$jobMaster'>".$row["City"]."</td></a>
                            <td><a href='$jobMaster'>".$row["State"]."</td></a>
                            <td><a href='$jobMaster'>".$row["Active"]."</td>
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
