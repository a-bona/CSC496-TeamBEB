<?php

    class history
    {
        private $dbh;

        public function __construct($dbh) {
            $this->$dbh = $dbh;
        }

        public function getHistory() {

            $sqlGetHistory= ("SELECT * FROM jobhistory");
            $query = $dbh->prepare($sqlGetHistory);

            $success = $query->execute();

            if(!$success) {
                exit("error");
            }

            $allHistoryRows = $query->fetchAll();
            return $allHistoryRows;
        }

    }
