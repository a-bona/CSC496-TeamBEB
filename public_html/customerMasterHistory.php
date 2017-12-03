<?php
  include 'connectDB.php';
  include 'classes/customerMasterHistory.php';

  session_start();

  $history = new history($dbh);
  $allHistoryRows = $history->getHistory();
?>
<?php
  if(isset($_POST["submit"])) {
    $type= $_POST["Type"];
    $sDate = strtotime($_POST["sDate"]);
    $sDate = date('Y-m-d H:i:s', $sDate);
    $comments = $_POST["Comments"];

    $sqlJobHistory = ("INSERT INTO jobhistory (Type, Date, Comments)
                       VALUES (:Type, :Date, :Comments)");
    $query2 = $dbh->prepare($sqlJobHistory);
    $query2->bindValue(":Type", $type);
    $query2->bindvalue(":Date", $sDate);
    $query2->bindValue(":Comments", $comments);

    $success2 = $query2->execute();

  if ($success2) {
      header("location: jobLookup.php");
  }
  else {
      exit("Error");
  }
}
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
            <button class="tablinks">Contact</button>
            <button class="tablinks">Background</button>
            <button class="tablinks">History</button>
            <button class="tablinks">Interview</button>
            <button class="tablinks">Assignments</button>
            <button class="tablinks">Payroll</button>
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
        <table class="table table-condensed table-striped">
          <tr class="success">
            <th>Type</th>
            <th>Date</th>
            <th>User</th>
            <th>Comments</th>
          </tr>
          <?php
            foreach($allHistoryRows as $row)
            {
              $id = $row["JobID"];
            ?>
            <td><?= $row["Type"] ?></td>
            <td><?= $row["Date"] ?></td>
            <td><?= $row["User"] ?></td>
            <td><?= $row["Comments"] ?></td>

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
        <h3 class="headerLabel">New History Note</h3>
        <div class="col-xs-3" id="entryColumn">
        <div class="col-md-6">
          <label for="shift">Type</label>
          <select class="form-control" name="shift">
            <option>Type1</option>
            <option>Type2</option>
            <option>Type3</option>
          </select>
        </div>
          <div class="row topBuffer">
            <div class="col-md-6">
                <label for="sDate">Start Date</label>
                <input class="form-control" type="date" name="sDate" placeholder="Start Date">
            </div>
       </div>
     </div>
       <div class="col-xs-10" class="Comments">
               <h3 class="headerLabel">Comments</h3>
               <textarea class="txtAddHistoryNote" name="Comments" placeholder="Comments"></textarea>
       </div>
       <div class="row topBuffer">
         <div class="center col-md-12">
             <input class="addSubBtn" type="submit" name="submit" value="Add History Note">
         </div>
       </div>
      </div>
    </div>
   </div>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
