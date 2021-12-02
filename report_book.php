<html>
    <head>
        <title>Result</title>
        <style>
            body{
                background-color:#FAEBD7;
                font-family:calibri;
                font-size:20px;
            }
        </style>
    </head>
    <body>
        <?php 
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $databasename = "book_store";
            $title = $_POST["title"];//user enter book title from index.html

            $connection = mysqli_connect($hostname, $username, $password, $databasename) or 
            die("Can not connect to the server" . mysqli_error($connection));
            $sql ="select * from books where title like '%$title%'";//select title like title as the user enters.
            $result = mysqli_query($connection, $sql) or
            die("Unable to execute the query!" . mysqli_error($connection));

            if ( mysqli_num_rows($result) > 0 ) {
                echo "<b><u>The book you are looking for:<br><br></u></b>" ;
                while ($row = mysqli_fetch_assoc($result) ) {
                    echo "<ul><li>".$row['title']."<br></li></ul>";
                }
            } else {
                echo "There is no such book!";
            }
            mysqli_close($connection);
        ?>
    </body>
</html>