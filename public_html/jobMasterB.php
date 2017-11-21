<!DOCTYPE html>
<html>
  <head>
    <title>Job Master</title>
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
          <h3>Job Master</h3>
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
            <button class="tablinks">Description</button>
            <button class="tablinks">Assigned</button>
            <button class="tablinks">History</button>
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
            <h3 class="headerLabel">Primary Contact</h3>
            <div class="col-xs-2" id="firstColumnPC">
              <label class="pageLabels" for="fname">First Name</label><br>
              <label class="pageLabels" for="lname">Last Name</label><br>
              <label class="pageLabels" for="jobTitle">Job Title</label><br>
          </div>
          <?php
            //connecting to the DataBase
            $db = mysqli_connect('localhost', 'root', '', 'Project1');
            $errors = array();

            $sql="SELECT * FROM CustomerContacts";

            $results= mysqli_query($db, $sql);
            if($row = mysqli_fetch_array($results)){

            ?>
          <div class="col-xs-3" id="entryColumn">
              <input class="pageEntry" type="text" name="fname" value=" <?php echo $row['FirstName']; ?>">
              <input class="pageEntry" type="text" name="lname" value=" <?php echo $row['LastName']; ?>">
              <input class="pageEntry" type="text" name="jobTitle" value=" <?php echo $row['Title']; ?>">
          </div>
          <div class="col-xs-2" id="secondColumnPC">
              <label class="pageLabels" for="department">Department</label><br>
              <label class="pageLabels" for="phone">Phone</label><br>
              <label class="pageLabels" for="email">Email</label><br>
          </div>
          <div class="col-xs-3" id="entryColumn">
              <input class="pageEntry" type="text" name="department" value=" <?php echo $row['Phone']; ?>">
              <input class="pageEntry" type="text" name="phone" value=" <?php echo $row['Department']; ?>">
              <input class="pageEntry" type="text" name="email" value=" <?php echo $row['Email']; ?>">
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
                <h3 class="headerLabel">Secondary Contact</h3>
                <div class="col-xs-2" id="secondColumnPC">
                    <label class="pageLabels" for="fname">First Name</label><br>
                    <label class="pageLabels" for="lname">Last Name</label><br>
                    <label class="pageLabels" for="jobTitle">Job Title</label><br>
                </div>
                <div class="col-xs-3" id="entryColumn">
                  <input class="pageEntry" type="text" name="fname" value=" <?php echo $row['FirstName']; ?>">
                  <input class="pageEntry" type="text" name="lname" value=" <?php echo $row['LastName']; ?>">
                  <input class="pageEntry" type="text" name="jobTitle" value=" <?php echo $row['Title']; ?>">
                </div>
                <div class="col-xs-2" id="secondColumnPC">
                    <label class="pageLabels" for="department">Department</label><br>
                    <label class="pageLabels" for="phone">Phone</label><br>
                    <label class="pageLabels" for="email">Email</label><br>
                </div>
                <div class="col-xs-3" id="entryColumn">
                  <input class="pageEntry" type="text" name="department" value=" <?php echo $row['Phone']; ?>">
                  <input class="pageEntry" type="text" name="phone" value=" <?php echo $row['Department']; ?>">
                  <input class="pageEntry" type="text" name="email" value=" <?php echo $row['Email']; ?>">
                </div>
              </div>
              <?php
            }
            ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
