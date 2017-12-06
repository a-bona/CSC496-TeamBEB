<?php
    include 'connectDB1.php';
    include 'classes/employeeClass.php';

    $employees = new employees($DB_con);

    $allEmployeeMasterRows = $employees->getMasterEmployees();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Employee Master</title>
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
          <h3>Employee Master</h3>
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
          <div class="tab">
            <button class="tablinks">Main</button>
            <button class="tablinks">Background</button>
            <button class="tablinks">History</button>
            <button class="tablinks">Interview</button>
            <button class="tablinks">Assignment</button>
            <button class="tablinks">Payroll</button>
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
          <div class="col-xs-2" id="firstColumnPC">
              <label class="pageLabels" for="fname">First Name</label><br>
              <label class="pageLabels" for="lname">Last Name</label><br>
              <label class="pageLabels" for="phone">Phone</label><br>
              <label class="pageLabels" for="email">Email</label><br>
              <label class="pageLabels" for="ssn">SSN</label><br>
          </div>
          <?php
          foreach($allEmployeeMasterRows as $row)
          {
            $id = $_POST["EmployeeID"];
          ?>
            <div class="col-xs-2" id="entryColumn">
            <input class="pageEntry" type="text" name="firstName" value=" <?=$row["First_Name"] ?>">
            <input class="pageEntry" type="text" name="lastName" value=" <?=$row["Last_Name"] ?>">
            <input class="pageEntry" type="text" name="phone" value=" <?=$row["Phone"] ?>">
            <input class="pageEntry" type="text" name="email" value=" <?=$row["Email"] ?>">
            <input class="pageEntry" type="text" name="ssn" value=" <?=$row["SSN"] ?>">
            </div>

          <div class="col-xs-2" id="secondColumnPC">
              <label class="pageLabels" for="address">Address</label><br>
              <label class="pageLabels" for="city">City</label><br>
              <label class="pageLabels" for="state">State</label><br>
              <label class="pageLabels" for="county">County</label><br>
              <label class="pageLabels" for="country">Country</label><br>

          </div>
          <div class="col-xs-2" id="entryColumn">
          <input class="pageEntry" type="text" name="address" value="<?=$row["Address"]?>">
          <input class="pageEntry" type="text" name="city" value="<?=$row["City"]?>">
          <input class="pageEntry" type="text" name="state" value="<?=$row["State"]?>">
          <input class="pageEntry" type="text" name="county" value="<?=$row["County"]?>">
          <select class="pageEntry" name="country" value="<?=$row["Country"] ?>">
            <option value='Canada' <?php echo ($row["Country"] == 'Canada')?'selected':''; ?>>Canada</option>
            <option value='India' <?php echo ($row["Country"] == 'India')?'selected':''; ?>>India</option>
            <option value='UK' <?php echo ($row["Country"] == 'UK')?'selected':''; ?>>United Kingdom</option>
            </select>
          </div>
        </div>
        <div class="col-xs-10" class="Requirements">
          <h3 class="headerLabel">Requirements</h3>
          <div class="col-xs-2" id="firstColumnPC">
                <label class="pageLabels" for="industryArea">Industry Area</label><br>
                <label class="pageLabels" for="educationLevel">Education Level</label><br>
                <label class="pageLabels" for="liftingAbility">Lifting Ability (lbs)</label><br>
                <label class="pageLabels" for="desiredPay">Desired Pay Rate</label><br>
                <label class="pageLabels" for="minimumPay">Minimum Pay Rate</label><br>
            </div>
            <div class="col-xs-2" id="entryColumn">
              <select class="pageEntry" name="industryArea" value="<?=$row["IndustryArea"] ?>">
                <option value='Technology' <?php echo ($row["IndustryArea"] == 'Technology')?'selected':''; ?>>Technology</option>
                <option value='Bussines' <?php echo ($row["IndustryArea"] == 'Bussines')?'selected':''; ?>>Bussines</option>
              </select>
              <select class="pageEntry" name="educationLevel" value="<?=$row["EducationLevel"] ?>">
                <option value='College' <?php echo ($row["EducationLevel"] == 'College')?'selected':''; ?>>College</option>
                <option value='Master' <?php echo ($row["EducationLevel"] == 'Master')?'selected':''; ?>>Master</option>
              </select><br>
              <select class="pageEntry" name="liftingAbility" value="<?=$row["LiftingAbility"] ?>">
                <option value='25' <?php echo ($row["LiftingAbility"] == '25')?'selected':''; ?>>25</option>
                <option value='50' <?php echo ($row["LiftingAbility"] == '50')?'selected':''; ?>>50</option>
                <option value='75' <?php echo ($row["LiftingAbility"] == '75')?'selected':''; ?>>75</option>
                <option value='100' <?php echo ($row["LiftingAbility"] == '100')?'selected':''; ?>>100</option>
              </select><br>
              <input class="pageEntry" type="text" name="desiredPay" value=" <?=$row["DesiredPay"]?>">
              <input class="pageEntry" type="text" name="minPay" value=" <?=$row["MinPay"]?>">
            </div>
            <div class="col-xs-2" id="secondColumnPC">
              <label class="pageLabels" for="travelDistance">Travel Distance (mi)</label><br>
              <label class="pageLabels" for="weekdays">Weekdays</label><br>
              <label class="pageLabels" for="weekends">Weekends</label><br>
            </div>
            <div class="col-xs-2" id="entryColumn">
              <select class="pageEntry" name="travelDistance" value="<?=$row["TravelDistance"] ?>">
                <option value='25' <?php echo ($row["TravelDistance"] == '25')?'selected':''; ?>>25</option>
                <option value='50' <?php echo ($row["TravelDistance"] == '50')?'selected':''; ?>>50</option>
                <option value='75' <?php echo ($row["TravelDistance"] == '75')?'selected':''; ?>>75</option>
                <option value='100' <?php echo ($row["TravelDistance"] == '100')?'selected':''; ?>>100</option>
              </select><br>
              <select class="pageEntry" name="weekdays" value="<?=$row["Weekdays"] ?>">
                <option value='Monday' <?php echo ($row["Weekdays"] == 'Monday')?'selected':''; ?>>Monday</option>
                <option value='Tuesday' <?php echo ($row["Weekdays"] == 'Tuesday')?'selected':''; ?>>Tuesday</option>
                <option value='Wednesday' <?php echo ($row["Weekdays"] == 'Wednesday')?'selected':''; ?>>Wednesday</option>
                <option value='Thursday' <?php echo ($row["Weekdays"] == 'Thursday')?'selected':''; ?>>Thursday</option>
                <option value='Friday' <?php echo ($row["Weekdays"] == 'Friday')?'selected':''; ?>>Friday</option>
              </select><br>
              <select class="pageEntry" name="weekends" value="<?=$row["Weekends"] ?>">
                <option value='Saturday' <?php echo ($row["Weekends"] == 'Saturday')?'selected':''; ?>>Saturday</option>
                <option value='Sunday' <?php echo ($row["Weekends"] == 'Sunday')?'selected':''; ?>>Sunday</option>
              </select>
                </div>
                <?php
                }
                ?>
          </div>
        <div class="col-xs-10" class="Requirements">
                <h3 class="headerLabel">Comments</h3>
                <textarea rows="4" cols="100">
                        </textarea>
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
