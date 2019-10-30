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

$theUser = $_POST["userName"];
$thePost = $_POST["thePost"];

if(empty($thePost)){
  echo("Error because the post was empty!(go back and try again)");
  echo("<br>");
}else {
  $query = "SELECT UserID FROM Users";
  $existsInTable = 0;
  if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
        if($theUser == $row["UserID"]){
          $existsInTable ++;
        }
      }

    if($existsInTable>0){
      if(strlen($thePost)>2000){
        echo("There was an error because the post is too long. Please, go back and post again something with less than 2000 characters");
        echo("<br>");
      }else {
        $query = "INSERT INTO Posts(Content,AuthorID) VALUES ('$thePost','$theUser')";
        if ($result = $mysqli->query($query)) {
        echo("Your message has been posted!");
        }
      }
    }else {
      echo("We were unable to find this username. Please, create a username or try with another existing one ");
      echo("<br>");
    }
  }
}

/* close connection */
$mysqli->close();
?>
