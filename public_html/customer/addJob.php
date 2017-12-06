<?php
  session_start();
      
  if(isset($_POST["submit"])) {
    $dbUser = "root";
    $dbPass = "root";
    $dbName = "staffingDB";
    $servername = "localhost";
    
    $jobTitle = $_POST["jobTitle"];
    $cName = $_POST["CompanyName"];
    $division = $_POST["division"];
    $dept = $_POST["department"];
    $wage = $_POST["wage"];
    $sTime = $_POST["sTime"];
    $eTime= $_POST["eTime"];
    $sDate = strtotime($_POST["sDate"]);
    $eDate = strtotime($_POST["eDate"]);
    $sDate = date('Y-m-d H:i:s', $sDate);
    $eDate = date('Y-m-d H:i:s', $eDate);  
    $shift = $_POST["shift"];
    $requirements = $_POST["requirements"];
    $jDuties = $_POST["jDuties"];
    
 
    
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $sqlGetCustomer= ("SELECT * FROM Customers Where Name = :Name AND Division= :Division");
    $query = $dbh->prepare($sqlGetCustomer);
    $query->bindvalue(":Name", $cName);
    $query->bindvalue(":Division", $division);
    $success = $query->execute();
    $row = $query->fetch();
    $custId = $row["CustomerID"];
    
    if (!$success) {

        exit("error1");
    }
    
    $sqlAddJob = ("INSERT INTO Jobs (JobTitle, CustomerID, Department, ContactID1, ContactID2, StartDate, EndDate, Shift, StartTime, EndTime, Pay, Requirements, Description, Active, Filled)
                       VALUES (:JobTitle, :CustomerID, :Department, :ContactID1, :ContactID2, :StartDate, :EndDate, :Shift, :StartTime, :EndTime, :Pay, :Requirements, :Description, :Active, :Filled)");  
    $query2 = $dbh->prepare($sqlAddJob);
    $query2->bindValue(":JobTitle", $jobTitle);
    $query2->bindvalue(":CustomerID", $custId);
    $query2->bindvalue(":Department", $dept);
    $query2->bindvalue(":ContactID1", NULL);
    $query2->bindValue(":ContactID2", NULL);
    $query2->bindValue(":StartDate", $sDate);
    $query2->bindValue(":EndDate", $eDate);
    $query2->bindValue(":Shift", $shift);
    $query2->bindValue(":StartTime", $sTime);
    $query2->bindValue(":EndTime", $eTime);
    $query2->bindValue(":Pay", $wage);        
    $query2->bindValue(":Requirements", $requirements);
    $query2->bindValue(":Description", $jDuties);
    $query2->bindValue(":Active", TRUE); 
    $query2->bindValue(":Filled", FALSE);
    
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
    <title>Add Job</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row pageBanner">
          <h1 class="center">Add Job</h1>
      </div>
      <form  action="addJob.php" method="POST">
        <div class="row topBuffer">
          <div class="col-md-6">
            <label for="jobTitle">Job Title</label>
            <input class="form-control" type="text" name="jobTitle" placeholder="Job Title">
          </div>
          <div class="col-md-6">
              <label for="wage">Salary/Hourly</label>
              <input class="form-control" type="text" name="wage" placeholder="Salary/Hourly">
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
            <label for="CompanyName">Company Name</label>
            <input class="form-control" type="text" name="CompanyName" placeholder="Company Name">
          </div>
          <div class="col-md-6">
              <label for="sDate">Start Date</label>
              <input class="form-control" type="date" name="sDate" placeholder="Start Date">
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
              <label for="division">Division</label>
              <input class="form-control" type="text" name="division" placeholder="Division">
          </div>
          <div class="col-md-6">
            <label for="eDate">End Date</label>
            <input class="form-control" type="date" name="eDate" placeholder="End Date">
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
              <label for="department">Department</label>
              <input class="form-control" type="text" name="department" placeholder="Department">
          </div>
          <div class="col-md-6">
            <label for="shift">Shift</label>
            <select class="form-control" name="shift">
              <option>1st</option>
              <option>2nd</option>
              <option>3rd</option>
            </select>
          </div>
        </div>
        <div class="row topBuffer">
          <div class="col-md-6">
              <label for="sTime">Start Time</label>
              <input class="form-control" type="text" name="sTime" placeholder="Start Time">
          </div>
          <div class="col-md-6">
            <label for="eTime">End Time</label>
            <input class="form-control" type="eTime" name="eTime" placeholder="End Time">
          </div>
        </div>
        <div class="row topBuffer">
          <div class= "col-md-12">
            <h3>Requirements</h3>
            <textarea class="txtAddBox" name="requirements" placeholder="Requirements"></textarea>
          </div>
        </div>
        <div class="row topBuffer">
          <div class= "col-md-12">
            <h3>Job Duties</h3>
            <textarea class="txtAddBox" name="jDuties" placeholder="Job Duties"></textarea>
        </div>
        </div>
        <div class="row topBuffer">
          <div class="center col-md-12">
              <input class="addSubBtn" type="submit" name="submit" value="Add Job">
          </div>
        </div>
      </form>
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>