<?php
$serverName = "DESKTOP-NG6KAT0"; // Replace with your server name
$connectionOptions = array(
    "Database" => "db_innovation",
    // "username"=> "sa",
    "Uid" => "sa",
    "PWD" => "123456"
);

//Establishes the connection
$conn =sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Connection failed: ");
// } else {
    // echo "Connected successfully";
}

// Close the connection when done

?>