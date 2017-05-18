<?php
//connection information 
define('HOST', "localhost");
define('USER', "root");
define('PASSWORD', "");

// creating the connection 
    $conn = new mysqli(HOST, USER , PASSWORD);

//check connection 
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
 
?>


