<?php
    
    class customers
    {
        private $dbh; 
    
        public function __construct($dbh) {
            $this->$dbh = $dbh;
        }
        
        public function getAllCustomers() {
            
            $sqlGetCustomers = ("SELECT * FROM Customers");
            $query = $dbh->prepare($sqlGetCustomers);
            
            $success = $query->execute();
            
            if(!$success) {
                exit("error");     
            }
    
            $allCustomerRows = $query->fetchAll();
            return $allCustomerRows; 
        }
                
    }


