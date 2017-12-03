<?php

    class currentJobs
    {
        private $dbh;

        public function __construct($dbh) {
            $this->$dbh = $dbh;
        }

        public function getAllCurrentEmployeesJobs() {

            $sqlGetCurrentEmployees= ("SELECT * FROM employees INNER JOIN jobs ON employees.EmployeeID = jobs.JobID");
            $query = $dbh->prepare($sqlGetCurrentEmployees);

            $success = $query->execute();

            if(!$success) {
                exit("error");
            }

            $allCurrentEmployeesRows = $query->fetchAll();
            return $allCurrentEmployeesRows;
        }
    }
