<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "book_store";

$connection = mysqli_connect($hostname, $username, $password, $databasename) or die("Can not connect to the userver" . mysqli_error($connection));
$sql = "CREATE TABLE books 
(
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(1000),
    author VARCHAR(1000),
    average_rating VARCHAR(100),
    ISBN VARCHAR(20),
    ISBN13 VARCHAR(50),
    language_code VARCHAR(50),
    num_pages INT(50),
    ratings_count INT(40),
    pages_reviews_count INT(40),
    publication_date VARCHAR(20),
    publisher VARCHAR(100)
)";


mysqli_query($connection, $sql) or die("Unable to execute the query!" . mysqli_error($connection));

echo "The table is created successfully";

mysqli_close($connection);


?>

