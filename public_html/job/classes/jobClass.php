<?php

    class jobs
    {
          private $db;

          function __construct($DB_con)
          {
            $this->db = $DB_con;
          }

          public function getAllJobs()
          {
            $sqlGetJobs = ("SELECT * FROM jobs INNER JOIN customers ON jobs.CustomerID = customers.CustomerID");
            $stmt = $this->db->prepare($sqlGetJobs);
            $stmt->execute();

            $allJobRows = $stmt->fetchAll();
            return $allJobRows;
          }

          public function getMasterJobs()
          {
            $id = $_POST["JobID"];
            $sqlGetJobs1 = ("SELECT * FROM jobs INNER JOIN customercontacts ON jobs.CustomerID = customercontacts.CustomerID WHERE JobID = $id");
            $stmt1 = $this->db->prepare($sqlGetJobs1);
            $stmt1->execute();

            $allJobRows1 = $stmt1->fetchAll();
            return $allJobRows1;
          }
          /*
          public function searchJobs($searchStr, $ddValue) {
              $sqlSelJobs= ("SELECT * FROM jobs WHERE JobTitle LIKE :JobTitle OR Department LIKE :Department OR City LIKE :City OR State LIKE :State AND Active = :$active "); //Add OR for each column. Then add AND for ddValue.
              $stmt2 = $this->db->prepare($sqlSelJobs);
              $searchStr = '%' . $searchStr . '%'; // % used with LIKE is used to match something similar to the search string
              $stmt2->bindvalue(':JobTitle', $searchStr); // Do this for every sql value starting with ":"
              $stmt2->bindvalue(':Department', $searchStr);
              $stmt2->bindvalue(':City', $searchStr);
              $stmt2->bindvalue(':State', $searchStr);
              $stmt2->bindvalue(':Active', $ddValue);


              $stmt2->execute();

              if(!$stmt2) {
                  exit("error");
              }

              $allJobRows1 = $stmt2->fetchAll();
              return $allJobRows1;

          }

        public function searchJobs($searchStr2, $ddValue2)
        {
          $active = $_POST["Active"];
          $sqlSelJobs2= ("SELECT * FROM jobs WHERE JobTitle LIKE :JobTitle
                                              OR Department LIKE :Department
                                              OR City LIKE :City
                                              OR State LIKE :State
                                              AND Active LIKE :Active");  //Add OR for each column. Then add AND for ddValue.
            $stmt2 = $this->db->prepare($sqlSelJobs2);
            $searchStr2 = '%' . $searchStr2 . '%'; // % used with LIKE is used to match something similar to the search string
            $stmt2->bindvalue(':JobTitle', $searchStr2); // Do this for every sql value starting with ":"
            $stmt2->bindvalue(':Department', $searchStr2);
            $stmt2->bindvalue(':City', $searchStr2);
            $stmt2->bindvalue(':State', $searchStr2);
            $stmt2->bindvalue(':Active', $ddValue2);

            $success = $stmt2->execute();

            if(!$success) {
                exit("error");
            }

            $selJobsRows2 = $stmt2->fetchAll();
            return $selJobsRows2;

        }
*/
    }
