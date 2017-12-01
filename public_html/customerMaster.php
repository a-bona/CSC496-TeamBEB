<!DOCTYPE html>
<html>
  <head>
    <title>Customer Master</title>
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
          <h3>Customer Master</h3>
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
            <button class="tablinks">Jobs</button>
            <button class="tablinks">Employees</button>
            <button class="tablinks">History</button>
            <button class="tablinks">Billing Profile</button>
          </div>
        </div>
        <div class="col-xs-10" class="pagecontent">
          <div class="col-xs-2" id="firstColumnPC">
              <label class="pageLabels" for="customerName">Customer Name</label><br>
              <label class="pageLabels" for="phone">Phone</label><br>
              <label class="pageLabels" for="address">Address</label><br>
              <label class="pageLabels" for="website">Website</label><br>
              <label class="pageLabels" for="email">Email</label><br>
          </div>
          <?php
            //connecting to the DataBase
            $db = mysqli_connect('localhost', 'root', '', 'capstone');
            $errors = array();
            $sql="SELECT * FROM Customers";
            $results= mysqli_query($db, $sql);
            if($row = mysqli_fetch_array($results)){
            ?>
          <div class="col-xs-3" id="entryColumn">
              <input class="pageEntry" type="text" name="name" value=" <?php echo $row['Name']; ?>">
              <input class="pageEntry" type="text" name="phone" value=" <?php echo $row['Phone']; ?>">
              <input class="pageEntry" type="text" name="address" value=" <?php echo $row['Address']; ?>">
              <input class="pageEntry" type="text" name="website" value=" <?php echo $row['Website']; ?>">
              <input class="pageEntry" type="text" name="email" value=" <?php echo $row['Email']; ?>">
          </div>
          <div class="col-xs-2" id="secondColumnPC">
              <label class="pageLabels" for="divison">Divison</label><br>
              <label class="pageLabels" for="city">City</label><br>
              <label class="pageLabels" for="state">State</label><br>
              <label class="pageLabels" for="county">County</label><br>
              <label class="pageLabels" for="country">Country</label><br>
          </div>
          <div class="col-xs-3" id="entryColumn">
              <input class="pageEntry" type="text" name="divison" value=" <?php echo $row['Division']; ?>">
              <input class="pageEntry" type="text" name="city" value=" <?php echo $row['City']; ?>">
              <input class="pageEntry" type="text" name="state" value=" <?php echo $row['State']; ?>">
              <input class="pageEntry" type="text" name="county" value=" <?php echo $row['County']; ?>">
              <input class="pageEntry" type="text" name="country" value=" <?php echo $row['Country']; ?>">
          </div>
          <?php
        }
        ?>
        </div>

        <div class="col-xs-10" class="contactContent">
          <h3 class="headerLabel">Contacts</h3>
          <div class="contactSearch">

              <form>
                  <button class="searchItems" type="submit">Search</button>
                  <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search">
              </form>
              <a href="newContact.html" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
          </div>
          <br>
          <table class="table-hover tableLookup">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Email</th>
              </tr>
              <?php
                //connecting to the DataBase
                $db = mysqli_connect('localhost', 'root', '', 'capstone');
                $errors = array();
                $sql="SELECT * FROM CustomerContacts";
                $results= mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($results))
                {
                  echo "<tr>
                          <td>".$row["FirstName"]."</td></a>
                          <td>".$row["LastName"]."</td></a>
                          <td>".$row["Title"]."</td></a>
                          <td>".$row["Phone"]."</td></a>
                          <td>".$row["Department"]."</td></a>
                          <td>".$row["Email"]."</td>
                        </tr>";
                }
                ?>
            </table>
          </div>
        </div>

      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>