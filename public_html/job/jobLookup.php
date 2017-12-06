<?php
    include 'connectDB1.php';
    include 'classes/jobClass.php';

    $jobs = new jobs($DB_con);

    $allJobRows = $jobs->getAllJobs();

?>
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
        <a href="addJob.php" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
        <form action="jobLookup.php" method="POST">
            <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search" id="filter">
        </form>
      </div>
      <div class="col-xs-10">
      <table class="table-hover tableLookup">
        <tr>
          <th>Title</th>
          <th>Company</th>
          <th>City</th>
          <th>State</th>
          <th>Active</th>
          <th>View</th>
        </tr>
        <?php
          foreach($allJobRows as $row)
          {
            $id = $row["JobID"];
        ?>
        <tbody class="searchable">
          <tr>
          <td><?= $row["JobTitle"] ?></td>
          <td><?= $row["Department"] ?></td>
          <td><?= $row["City"] ?></td>
          <td><?= $row["State"] ?></td>
          <td><?= $row["Active"] ?></td>
          <td>
            <form action="jobMaster.php" method="POST">
              <input type="hidden" name="JobID" value="<?= $id ?>">
              <input class="viewBtn" type="submit" name="view" value="View">
            </form>
          </td>
          </tr>
          <?php
          }
          ?>
         </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
<script>
$(document).ready(function () {

    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});
</script>
