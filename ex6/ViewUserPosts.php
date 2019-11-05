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
$selectedUser = $_POST["selectedUser"];

$query = "SELECT Users.UserID, Posts.Content
          FROM Users
          INNER JOIN Posts
          ON Users.UserID=Posts.AuthorID";
if ($result = $mysqli->query($query)) {
  echo("Here are all the posts from the user: ");
  echo($selectedUser);
  echo("<br>");
  echo("<br>");
  echo("<br>");
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      if($row["UserID"]==$selectedUser)
      {
      echo($row["Content"]);
        echo("<br>");
        echo("<br>");
      }
      }
    }

 ?>
