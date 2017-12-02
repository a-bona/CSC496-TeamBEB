<?php

  $dbUser = "root";
  $dbPass = "root";
  $dbName = "staffingDB";
  $servername = "localhost";
  
  try {
            
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass); 
  }
            
  catch(PDOException $e) {
                
    exit("Error");
  }