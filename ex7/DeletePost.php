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
$chosen = $_POST["toDelete"];
echo("DELETED: ");
echo ("<br>");
foreach ($chosen as $toDelete){
    echo ("Post ID was: ");
    $query = "SELECT PostID
              FROM Posts
              WHERE Content= '$toDelete'";
              if ($result = $mysqli->query($query)) {
                  /* fetch associative array */
                  while ($row = $result->fetch_assoc()) {
                    echo($row["PostID"]);
                    echo("<br>");
                    }
                  }
$query = "DELETE
          FROM Posts
          WHERE Content= '$toDelete'";
if ($result = $mysqli->query($query)) {

    }
}


 ?>
