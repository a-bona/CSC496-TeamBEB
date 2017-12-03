<?php
  include 'connectDB.php';
  include 'classes/customerMasterClass.php';

  $jobs = new jobs($dbh);
  $allJobRows = $jobs->getAllJobs();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Customer Master</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleAltered.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2 nameBanner">
            <h3>Software X</h3>
        </div>
        <div class="col-xs-10 pageBanner">
          <h3>Customer Master</h3>
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
          <div class="tab">
            <button class="tablinks">Main</button>
            <button class="tablinks">Jobs</button>
            <button class="tablinks">Employees</button>
            <button class="tablinks">History</button>
            <button class="tablinks">Billing Profile</button>
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
        <table class="table table-condensed table-striped">
          <tr class="success">
            <th>Job Title</th>
            <th>Department</th>
            <th>Salary Hourly</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>City</th>
            <th>State</th>
            <th>County</th>
            <th>Active</th>
          </tr>
          <?php
            foreach($allJobRows as $row)
            {
              $id = $row["JobID"];
            ?>
            <td><?= $row["JobTitle"] ?></td>
            <td><?= $row["Department"] ?></td>
            <td><?= $row["Pay"] ?></td>
            <td><?= $row["StartDate"] ?></td>
            <td><?= $row["EndDate"] ?></td>
            <td><?= $row["City"] ?></td>
            <td><?= $row["State"] ?></td>
            <td><?= $row["County"] ?></td>
            <td><?= $row["Active"] ?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="jobID" value="<?= $id ?>">
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
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
