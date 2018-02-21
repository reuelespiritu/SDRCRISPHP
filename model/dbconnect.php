<?php


function createconnection(){
// Create connection
$dbc = new mysqli("localhost", "root", "","sdrcris");

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}
return $dbc;
}

?>