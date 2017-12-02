<?php
    include 'connectDB.php';
    include 'classes/customerClass.php';
    
    $customers = new customers($dbh);
    
    if(isset($_POST["search"])) {
      
      $searchStr = $_POST["searchBox"];
      
    }
    else {
        
        $allCustomerRows = $customers->getAllCustomers();
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Customer Lookup</title>
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
          <h3>Customer Lookup</h3>
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
          <a href="addCustomer.php" class="searchItems"><i class="fa fa-plus fa-2x"></i></a>
          <form>
              <button class="searchItems" type="submit">Search</button>
              <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search">
          </form>

        </div>
        <div class="col-xs-10">
            <table class="table-hover tableLookup">
                <tr>
                  <th>Name</th>
                  <th>Division</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>
                <?php
                foreach($allCustomerRows as $row)
                {
                    $id = $row["CustomerID"]
                ?>
                <tr>
                    <td><?=$row["Name"]?></td>
                    <td><?=$row["Division"]?></td>
                    <td><?=$row["Address"]?></td>
                    <td><?=$row["City"]?></td>
                    <td><?=$row["State"]?></td>
                    <td><?=$row["Phone"]?></td>
                    <td><?=$row["Email"]?></td>
                    <td>
                        <form action="customerMaster-Main.php" method="POST">
                            <input type="hidden" name="customerID" value="<?= $id ?>">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>