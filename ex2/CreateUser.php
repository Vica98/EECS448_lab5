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
if(empty($theUser)){
  echo("Error because username was empty!(go back and try again)");
  echo("<br>");
}else {
  //check this, its not working
$query = "SELECT UserID FROM Users";
$existsInTable = 0;
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      if($theUser == $row["UserID"]){
        $existsInTable ++;
      }

    }
    if($existsInTable>0)
    {
      echo("Username already in database, please go back and type another username");
      echo("<br>");
    }else {
      if(strlen($theUser)>15){
        echo("Username too long, please go back and type another username with less than 16 characters");
        echo("<br>");
      }else{
        echo("'");
        echo($theUser);
        echo("' added to username database");
        echo("<br>");
        $query = "INSERT INTO Users(UserID) VALUES ('$theUser')";
        if ($result = $mysqli->query($query)) {

        }
      }

    }
    /* free result set */
    //$result->free();
  }



}


//$query = "INSERT INTO Users (UserID) VALUES ('test1')";


/* close connection */
$mysqli->close();
?>
