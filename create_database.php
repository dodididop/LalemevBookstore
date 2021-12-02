<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "book_store";

$connection = mysqli_connect($hostname, $username, $password) or die("Can not connect to the server" . mysqli_error($connection));
$sql = "CREATE DATABASE $databasename";


mysqli_query($connection, $sql) or die("Unable to execute the query!" . mysqli_error($connection));

echo "The database is created successfully";

mysqli_close($connection);

?>