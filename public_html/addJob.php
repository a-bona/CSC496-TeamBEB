<?php
  session_start();
      
  if(isset($_POST["submit"])) {
    $dbUser = "root";
    $dbPass = "root";
    $dbName = "csc390";
    $servername = "localhost";
    
    $jobTitle = $_POST["jobTitle"];
    $cName = $_POST["ComapanyName"];
    $division = $_POST["divison"];
    $dept = $_POST["department"];
    $wage = $_POST["wage"];
    $sTime = $_POST["sTime"];
    $eTime= $_POST["eTime"];
    $sDate = $_POST["sDate"];
    $eDate = $_POST["eDate"];   
    $shift = $_POST["shift"];
    $requirements = $_POST["requirements"];
    $jDuties = $_POST["jDuties"];
    
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $sqlGetCustomer= ("SELECT * FROM Customers Where CompanyName = :CompanyName AND Division= :Division");
    $query = $dbh->prepare($sqlGetCustomer);
    $query->bindvalue(':CompanyName', $cName);
    $query->bindvalue(':Division', $division);
    $success = $query->execute();
    $row = $query->fetch();
    $custId = $row["CustomerID"];
    
    $sqlAddJob = ("INSERT INTO Jobs (JobTitle, CustomerID, Department, ContactID1, ContactID2, StartDate, EndDate, Shift, Pay, Requirements, Description, Active, Filled)
                       VALUES (:JobTitle, :CustomerID, :Department, :ContactID1, :ContactID2, :StartDate, :EndDate, :Shift, :Pay, :Requirements, :Description, :Active, :Filled)");  
    $query = $dbh->prepare($sqlAddJob);
    $query->bindValue(":JobTitle", $jobTitle);
    $query->bindvalue(":CustomerID", $custId);
    $query->bindvalue(":Department", $dept);
    $query->bindvalue(":ContactID1", NULL);
    $query->bindValue(":ContactID2", NULL);
    $query->bindValue(":StartDate", $sDate);
    $query->bindValue(":EndDate", $eDate);
    $query->bindValue(":Shift", $shift);
    $query->bindValue(":Pay", $wage);        
    $query->bindValue(":Requirements", $requirements);
    $query->bindValue(":Description", $jDuties);
    $query->bindValue(":Active", TRUE); 
    $query->bindValue(":Filled", FALSE);
    
    $success = $query->execute();
        
    if ($success) {

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
      <form  action="addCustomer.php" method="POST">
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