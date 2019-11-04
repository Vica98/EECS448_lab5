<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "vicachevchenco", "password", "vicachevchenco");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
   echo "error";
}

$query = "SELECT * FROM Users";
if ($result = $mysqli->query($query)) {
  echo("Here are all the users:");
  echo("<br>");
  echo("<br>");
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      echo($row["UserID"]);
      echo("<br>");
      }
    }


?>
