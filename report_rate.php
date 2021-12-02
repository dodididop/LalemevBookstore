<HTML>
<head><title>Result</title>
<style>
body{
    background-color:#FAEBD7;
    font-family:calibri;
    font-size:20px;
}
</style>
</head><body>

<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "book_store";
    $average_rating = $_POST["average_rating"];// user enter average rating from index.html

    $connection = mysqli_connect($hostname, $username, $password, $databasename) or 
    die("Can not connect to the server" . mysqli_error($connection));//to check if there is a connection or not.
    $sql ="select * from books ";//to select all head from created books table.

    $result = mysqli_query($connection, $sql) or
    die("Unable to execute the query!" . mysqli_error($connection));//to check if query is succesfull or not.

    if ( mysqli_num_rows($result) > 0 ) {
        echo "<b><u>The book you are looking for depends on enter average:<br><br></u></b>";
        $i=0;
        while ($row = mysqli_fetch_assoc($result) ) {//thanks to mysqli_fetch_assoc function we can check row in $result which is our array.
            if($average_rating < $row['average_rating'] )//to control given average rating is less than average rating in table.
            $array[$i]=$row['average_rating']."-".$row['title'];//to store average rating and title within an array.
            $i++;//increment    
        }        
        sort($array);//sorting our array to look regularly.
        for($i=0; $i<count($array); $i++)//looping for display our array.
        {
            echo "<ul><li>".$array[$i].""."<br></li></ul>";// display items in our array. 
        }
        mysqli_close($connection);//close connection.
        } else {
            echo "There is no such book!";
        }
?>
</body></HTML>