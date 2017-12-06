<?php

class employees
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  public function getAllEmployees()
  {
    $sqlGetEmployees = ("SELECT * FROM employees");
    $stmt = $this->db->prepare($sqlGetEmployees);
    $stmt->execute();

    $allEmployeeRows = $stmt->fetchAll();
    return $allEmployeeRows;
  }

  public function getMasterEmployees()
  {
    $id = $_POST["EmployeeID"];
    $sqlGetEmployeesMaster = ("SELECT * FROM employees WHERE EmployeeID = $id");
    $stmt1 = $this->db->prepare($sqlGetEmployeesMaster);
    $stmt1->execute();

    $allEmployeeMasterRows = $stmt1->fetchAll();
    return $allEmployeeMasterRows;
  }
/*
    public function searchEmployees($searchStr, $ddValue) {

      $sqlSelEmployees= ("SELECT * FROM Employees WHERE First_Name LIKE :First_Name
                                                  OR Last_Name LIKE :Last_Name
                                                  OR Phone LIKE :Phone
                                                  OR Email LIKE :Email
                                                  OR City LIKE :City
                                                  OR State LIKE :State
                                                  OR Assigned LIKE :Assigned"); //Add OR for each column. Then add AND for ddValue.
      $query = $dbh->prepare($sqlSelEmployees);
      $searchStr = '%' . $searchStr . '%'; // % used with LIKE is used to match something similar to the search string
      $query->bindvalue(':First_Name', $searchStr); // Do this for every sql value starting with ":"
      $query->bindvalue(':Last_Name', $searchStr);
      $query->bindvalue(':Phone', $searchStr);
      $query->bindvalue(':Email', $searchStr);
      $query->bindvalue(':City', $searchStr);
      $query->bindvalue(':State', $searchStr);
      $query->bindvalue(':Assigned', $ddValue);

      $success = $query->execute();

      if(!$success) {
          exit("error");
      }

      $selEmployeeRows = $query->fetchAll();
      return $selEmployeeRows;

  }
  */
}
