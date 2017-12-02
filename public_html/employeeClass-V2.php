<?php
    
    class employees
    {
        private $dbh; 
    
        public function __construct($dbh) {
            $this->$dbh = $dbh;
        }
        
        public function getAllEmployees() {
            
            $sqlGetEmployees= ("SELECT * FROM Employees");
            $query = $dbh->prepare($sqlGetEmployees);
            
            $success = $query->execute();
            
            if(!$success) {
                exit("error");     
            }
    
            $allEmployeeRows = $query->fetchAll();
            return $allEmployeeRows; 
        }
        
        public function searchEmployees($searchStr, $ddValue) {

            $sqlSelEmployees= ("SELECT * FROM Employees WHERE First_Name LIKE :First_Name OR Last_Name LIKE : "); //Add OR for each column. Then add AND for ddValue. 
            $query = $dbh->prepare($sqlSelEmployees);
            $searchStr = '%' . $searchStr . '%'; // % used with LIKE is used to match something similar to the search string
            $query->bindvalue(':First_Name', $searchStr); // Do this for every sql value starting with ":"
       
            $success = $query->execute();
            
            if(!$success) {
                exit("error");     
            }
    
            $selEmployeeRows = $query->fetchAll();
            return $selEmployeeRows; 
        
        }
    }