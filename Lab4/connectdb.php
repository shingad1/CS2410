<?php
//A script which connects to the mySQL database "carent" using PDO
  $db_host = 'localhost';  //the name of the host
  $db_name = 'carent';    //the name of the database name
  $username = 'root';    //The name of the username for the database access
  $password = '';       //The name of hte password for this database access

  try {
    //Create a new PDO object so that we can access the database from localhost
    $db = new PDO("mysql:dbname=$db_name; host = $db_host", $username. $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $ex) {
    echo('Failed to connect to the database.<br>');
    echo($ex->getMessage());
    exit;
  }
 ?>
