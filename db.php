<?php
    $username = "caseym_monkey"; //Use your database username
    $password = "Midget11";  //Use your database password
    $hostname = "localhost"; //keep the same
    $dbname="caseym_BAS"; //Change to your own database name
    
    try {
      //database object
      $dbh = new PDO ("mysql:host=$hostname;
                      dbname=$dbname", $username, $password);
      //echo 'connected to database';
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
?>