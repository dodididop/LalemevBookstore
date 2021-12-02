<?php

$myfile = fopen("books.csv", "r") or die ("Not successful!");

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "book_store";

$connection = mysqli_connect($hostname, $username, $password, $databasename) 
or die("Can not connect to the server" . mysqli_error($connection));

while(!feof($myfile)) {//loops until end of the books.csv which is $myfile.

  $line = fgets($myfile);//return a line from myfile and assign these lines to $line. 
  $line = explode(",", $line);//split a string based on ',' .

  $sql = "INSERT INTO books
  (id, title, author, average_rating, ISBN,
  ISBN13, language_code, num_pages, ratings_count, pages_reviews_count, publication_date, publisher) VALUES 
  (NULL, '$line[0]', '$line[1]', '$line[2]', '$line[3]',
  '$line[4]', '$line[5]', '$line[6]', '$line[7]','$line[8]','$line[9]','$line[10]')";    
  mysqli_query($connection, $sql) or die("Unable to execute the query!" . mysqli_error($connection));
 
}

fclose($myfile);//to close books.csv.
mysqli_close($connection);//to close connection.

?>
