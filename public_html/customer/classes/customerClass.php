<?php

class customers
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  public function getAllCustomers()
  {
    $sqlGetCustomers = ("SELECT *FROM customers");
    $stmt = $this->db->prepare($sqlGetCustomers);
    $stmt->execute();

    $allCustomerRows = $stmt->fetchAll();
    return $allCustomerRows;
  }

  public function getMasterCustomers()
  {
    $id = $_POST["CustomerID"];
    $sqlGetCustomers = ("SELECT * FROM customers WHERE CustomerID = $id LIMIT 1");
    $stmt = $this->db->prepare($sqlGetCustomers);
    $stmt->execute();

    $allCustomerRows = $stmt->fetchAll();
    return $allCustomerRows;
  }

  public function getMasterCustomersTable()
  {
    $sqlGetCustomers1 = ("SELECT * FROM jobs INNER JOIN customercontacts ON jobs.CustomerID = customercontacts.CustomerID ");
    $stmt = $this->db->prepare($sqlGetCustomers1);
    $stmt->execute();

    $allCustomerRows1 = $stmt->fetchAll();
    return $allCustomerRows1;
  }


/*
  public function searchCustomers($searchStr) {

    $name = $_POST["Name"];
    $division = $_POST["Division"];
    $address = $_POST["Address"];
    $city = $_POST["City"];
    $state = $_POST["State"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];

      $sqlGetCustomers= ("SELECT * FROM customers WHERE Name LIKE :Name
                                                  OR Division LIKE :Division
                                                  OR Address LIKE :Address
                                                  OR City LIKE :City
                                                  OR State LIKE :State
                                                  OR Phone LIKE :Phone
                                                  OR Email LIKE :Email"); //Add OR for each column. Then add AND for ddValue.
      $stmt = $this->db->prepare($sqlGetCustomers);
      $searchStr = '%' . $searchStr . '%'; // % used with LIKE is used to match something similar to the search string
      $stmt->bindvalue(':Name', $name); // Do this for every sql value starting with ":"
      $stmt->bindvalue(':Division', $address);
      $stmt->bindvalue(':Address', $city);
      $stmt->bindvalue(':City', $state);
      $stmt->bindvalue(':State', $searchStr);
      $stmt->bindvalue(':Phone', $searchStr);
      $stmt->bindvalue(':Email', $searchStr);

      $stmt->execute();

      $selCustomerRows = $stmt->fetchAll();
      return $selCustomerRows;

  }
  */
  public function searchCustomers($queryString)
{
  $sqlGetCustomers= ("SELECT * FROM customers WHERE Name LIKE :Name
                                              OR Division LIKE :Division
                                              OR Address LIKE :Address
                                              OR City LIKE :City
                                              OR State LIKE :State
                                              OR Phone LIKE :Phone
                                              OR Email LIKE :Email");

    $stmt = $this->prepare($sqlGetCustomers);
    $queryString = '%' . $queryString . '%';
    $stmt->bindValue(':Name', $queryString, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    if(empty($result) or $result == false)
       return array();
    else
        return $result;
}
}
