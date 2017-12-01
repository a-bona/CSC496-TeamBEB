<!DOCTYPE html>
<html>
<head>
    <title>Employee Master</title>
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
            //connecting to the DataBase
            $db = mysqli_connect('localhost', 'root', '', 'capstone');
            $errors = array();
            $sql="SELECT * FROM Employees";
            $results= mysqli_query($db, $sql);
            if($row = mysqli_fetch_array($results)){
            ?>
            <div class="col-xs-3" id="entryColumn">
            <input class="pageEntry" type="text" name="firstName" value=" <?php echo $row['First_Name']; ?>">
            <input class="pageEntry" type="text" name="lastName" value=" <?php echo $row['Last_Name']; ?>">
            <input class="pageEntry" type="text" name="phone" value=" <?php echo $row['Phone']; ?>">
            <input class="pageEntry" type="text" name="email" value=" <?php echo $row['Email']; ?>">
            <input class="pageEntry" type="text" name="ssn" value=" <?php echo $row['SSN']; ?>">
            </div>

          <div class="col-xs-2" id="secondColumnPC">
              <label class="pageLabels" for="address">Address</label><br>
              <label class="pageLabels" for="city">City</label><br>
              <label class="pageLabels" for="state">State</label><br>
              <label class="pageLabels" for="county">County</label><br>
              <label class="pageLabels" for="country">Country</label><br>

          </div>
          <div class="col-xs-3" id="entryColumn">
          <input class="pageEntry" type="text" name="address" value=" <?php echo $row['Address']; ?>">
          <input class="pageEntry" type="text" name="city" value=" <?php echo $row['City']; ?>">
          <input class="pageEntry" type="text" name="state" value=" <?php echo $row['State']; ?>">
          <input class="pageEntry" type="text" name="county" value=" <?php echo $row['County']; ?>">
              <select class="pageEntry" name="country" value=" <?php echo $row['Country']; ?>">>
                  <option value="canada">Canada</option>
                  <option value="india">India</option>
                  <option value="uk">United Kingdom</option>
                  <option value="United States" selected>United States</option>
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
            <div class="col-xs-3" id="entryColumn">
                <select class="pageEntry" name="industryArea" value="<?php echo $row['IndustryArea']; ?>">
                        <option value=""><?php echo $row['IndustryArea']; ?></option>
                        <option value=""><?php echo $row['IndustryArea']; ?></option>
                        <option value=""><?php echo $row['IndustryArea']; ?></option>
                </select><br>
                <select class="pageEntry" name="educationLevel" value="<?php echo $row['EducationLevel']; ?>">
                        <option value=""><?php echo $row['EducationLevel']; ?></option>
                        <option value=""><?php echo $row['EducationLevel']; ?></option>
                        <option value=""><?php echo $row['EducationLevel']; ?></option>
                </select><br>
                <select class="pageEntry" name="liftingAbility" value="<?php echo $row['LiftingAbility']; ?>">
                        <option value=""><?php echo $row['LiftingAbility']; ?></option>
                        <option value=""><?php echo $row['LiftingAbility']; ?></option>
                        <option value=""><?php echo $row['LiftingAbility']; ?></option>
                </select><br>
              <input class="pageEntry" type="text" name="desiredPay" value=" <?php echo $row['DesiredPay']; ?>">
                <input class="pageEntry" type="text" name="minPay" value=" <?php echo $row['MinPay']; ?>">
            </div>
            <div class="col-xs-2" id="secondColumnPC">
                    <label class="pageLabels" for="travelDistance">Travel Distance (mi)</label><br>
                    <label class="pageLabels" for="weekdays">Weekdays</label><br>
                    <label class="pageLabels" for="weekends">Weekends</label><br>
                </div>
                <div class="col-xs-3" id="entryColumn">

                    <select class="pageEntry" name="travelDistance" value="<?php echo $row['TravelDistance']; ?>">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                            </select><br>
                    <select class="pageEntry" name="weekdays" value="<?php echo $row['WeekDays']; ?>">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                          </select><br>
                    <select class="pageEntry" name="weekends" value="<?php echo $row['Weekends']; ?>">
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
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