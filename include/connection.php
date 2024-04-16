<?php
// $servername = "sql313.byetcluster.com";
// $username = "if0_36100903";
// $password = "x35fCpOnwr9";
// $dbname = "if0_36100903_dbcitationticket";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_database";


$mysqli = new mysqli($servername, $username, $password, $dbname)or die (mysqli_error($mysqli));

// if ($mysqli->connect_errno) {
//     die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
// }

// // Set timeout
// $mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 60);
// 

?>
