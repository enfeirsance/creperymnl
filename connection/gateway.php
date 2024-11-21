<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "parkinglotsystem";

function connection() {
    global $host, $username, $password, $dbname;
    
    $con = new mysqli($host, $username, $password, $dbname);

    if ($con->connect_error) {
        echo $con->connect_error;
    } else {
        return $con;
    }
}

$con = connection();

?>
