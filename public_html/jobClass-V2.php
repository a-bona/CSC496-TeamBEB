<?php
    
    class jobs
    {
        private $dbh; 
    
        public function __construct($dbh) {
            $this->$dbh = $dbh;
        }
        
        public function getAllJobs() {
            
            $sqlGetJobs= ("SELECT * FROM Jobs INNER JOIN Customers ON Jobs.CustomerID = Customers.CustomerID");
            $query = $dbh->prepare($sqlGetJobs);
            
            $success = $query->execute();
            
            if(!$success) {
                exit("error");     
            }
    
            $allJobRows = $query->fetchAll();
            return $allJobRows; 
        }
                
    }