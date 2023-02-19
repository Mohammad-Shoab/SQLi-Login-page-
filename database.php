<?php

$hostName = "sql12.freemysqlhosting.net";
$dbUser = "sql12595260";
$dbPassword = "4fhvidZGGl";
$dbName = "sql12595260";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>
