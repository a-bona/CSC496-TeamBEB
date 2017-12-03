
<?php
  session_start();

  if(isset($_POST["submit"])) {

    $dbUser = "root";
    $dbPass = "root";
    $dbName = "staffingdb";
    $servername = "localhost";

    $name = $_POST["Name"];
    $division = $_POST["Division"];
    $address = $_POST["Address"];
    $city = $_POST["City"];
    $state = $_POST["State"];
    $county = $_POST["County"];
    $country = $_POST["Country"];
    $website = $_POST["Website"];
    $email = $_POST["Email"];
    $phone = $_POST["Phone"];

    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $sql = ("INSERT INTO Customers (Name, Division, Address, City, State, County, Website, Email, Phone)
                       VALUES (:Name, :Division, :Address, :City, :State, :County, :Website, :Email, :Phone)");

    $query = $dbh->prepare($sql);
    $query->bindValue(":Name", $name);
    $query->bindvalue(":Division", $division);
    $query->bindvalue(":Address", $address);
    $query->bindvalue(":City", $city);
    $query->bindValue(":State", $state);
    $query->bindValue(":County", $county);
    $query->bindValue(":Country", $website);
    $query->bindValue(":Website", $email);
    $query->bindValue(":Email", $email);
    $query->bindValue(":Phone", $phone);



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
          <h2 class="headerLabel">Billing Profile</h2>
          <form  action="customerMasterBillingProfile.php" method="POST">
            <div class="row topBuffer">
              <div class="col-md-6">
                <label for="Name">Name</label>
                <input class="form-control" type="text" name="Name" placeholder="Name">
              </div>
              <div class="col-md-6">
                  <label for="Address">Address</label>
                  <input class="form-control" type="text" name="Address" placeholder="Address">
              </div>
            </div>
            <div class="row topBuffer">
              <div class="col-md-6">
                <label for="City">City</label>
                <input class="form-control" type="text" name="City" placeholder="City">
              </div>
              <div class="col-md-6">
                  <label for="State">State</label>
                  <input class="form-control" type="text" name="State" placeholder="State">
              </div>
            </div>
            <div class="row topBuffer">
              <div class="col-md-6">
                  <label for="County">County</label>
                  <input class="form-control" type="text" name="County" placeholder="Division">
              </div>
              <div class="col-md-6">
                <label for="Country">Country</label>
                <input class="form-control" type="text" name="Country" placeholder="Country">
              </div>
            </div>
            <div class="row topBuffer">
              <div class="col-md-6">
                  <label for="Website">Website</label>
                  <input class="form-control" type="text" name="Website" placeholder="Website">
              </div>
              <div class="col-md-6">
                <label for="Email">Email</label>
                <input class="form-control" type="text" name="Email" placeholder="Email">
              </div>
            </div>
            <div class="row topBuffer">
              <div class="col-md-6">
                  <label for="Phone">Phone</label>
                  <input class="form-control" type="text" name="Phone" placeholder="Phone">
              </div>
              <div class="col-md-6">
                <label for="Division">Division</label>
                <input class="form-control" type="Division" name="Division" placeholder="Division">
              </div>
            </div>
            <br>
            <div class="row topBuffer">
              <div class="center col-md-12">
                  <input class="addSubBtn" type="submit" name="submit" value="Add Billing">
              </div>
            </div>
          </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
