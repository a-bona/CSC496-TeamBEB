<?php
    include 'connectDB1.php';
    include 'classes/customerClass.php';

    $customers = new customers($DB_con);

    $allCustomerRows = $customers->getMasterCustomers();
    $allCustomerRows1 = $customers->getMasterCustomersTable();

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
            <div class="col-xs-2" id="firstColumnPC">
              <label class="pageLabels" for="customerName">Customer Name</label><br>
              <label class="pageLabels" for="phone">Phone</label><br>
              <label class="pageLabels" for="address">Address</label><br>
              <label class="pageLabels" for="website">Website</label><br>
              <label class="pageLabels" for="email">Email</label><br>
          </div>
          <?php
          foreach($allCustomerRows as $row)
          {
            $id = $_POST["CustomerID"];
          ?>
          <div class="col-xs-2" id="entryColumn">
            <input class="pageEntry" type="text" name="name" value="<?=$row["Name"] ?>">
            <input class="pageEntry" type="text" name="phone" value="<?=$row["Phone"] ?>">
            <input class="pageEntry" type="text" name="address" value="<?=$row["Address"] ?>">
            <input class="pageEntry" type="text" name="website" value="<?=$row["Website"] ?>">
            <input class="pageEntry" type="text" name="email" value="<?=$row["Email"] ?>">
          </div>
          <div class="col-xs-2" id="secondColumnPC">
            <label class="pageLabels" for="divison">Divison</label><br>
            <label class="pageLabels" for="city">City</label><br>
            <label class="pageLabels" for="state">State</label><br>
            <label class="pageLabels" for="county">County</label><br>
            <label class="pageLabels" for="country">Country</label><br>
          </div>
          <div class="col-xs-2" id="entryColumn">
            <input class="pageEntry" type="text" name="divison" value=" <?=$row["Division"] ?>">
            <input class="pageEntry" type="text" name="city" value=" <?=$row["City"] ?>">
            <input class="pageEntry" type="text" name="state" value=" <?=$row["State"] ?>">
            <input class="pageEntry" type="text" name="county" value=" <?=$row["County"] ?>">
            <input class="pageEntry" type="text" name="country" value=" <?=$row["Country"] ?>">
          </div>
        </div>
        <?php
        }
        ?>
        <div class="col-xs-10" class="contactContent">
          <h3 class="headerLabel">Contacts</h3>
          <div class="contactSearch">
              <form>
              <input class="searchItems searchBox" type="text" name="searchBox" placeholder="search" id="filter">
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
                foreach($allCustomerRows1 as $row)
                {
                    $id = $row["CustomerID"]
                ?>
                <tbody class="searchable">
                <tr>
                  <td><?=$row["FirstName"]?></td>
                  <td><?=$row["LastName"]?></td>
                  <td><?=$row["JobTitle"]?></td>
                  <td><?=$row["Phone"]?></td>
                  <td><?=$row["Department"]?></td>
                  <td><?=$row["Email"]?></td>
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
