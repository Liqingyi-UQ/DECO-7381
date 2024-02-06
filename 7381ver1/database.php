
<?php

//connect to the MySQL database
$host = "localhost";
$dbname = "deco7381";
$username = "zsq";
$password = "123";

$mysqli = new mysqli($host,$username,$password,$dbname);

//if the connection is failed, there will be an error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;