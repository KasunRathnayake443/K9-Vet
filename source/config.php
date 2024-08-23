<?php

$db_server = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = "K9-vets";
 
 // Create connection
 $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<script> console.log(' Connected successfully') </script>";
}

?>