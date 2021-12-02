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
            $author = $_POST["author"];//user enter author name from index.html

            $connection = mysqli_connect($hostname, $username, $password, $databasename) or 
            die("Can not connect to the server" . mysqli_error($connection));
            $sql ="select * from books where author like '%$author%'";//select author like author as the user enters from books table.
            $result = mysqli_query($connection, $sql) or
             die("Unable to execute the query!" . mysqli_error($connection));

            if ( mysqli_num_rows($result) > 0 ) {
                echo "<b><u>".$author."'s Books:<br></u></b>" ;
                $i=0;
                while ($row = mysqli_fetch_assoc($result) ) {
                    $newtitle[$i]=$row['title'];//to store title within newtitle array.
                    $i++;
                }
            } else {
                echo "There is a mistake with author name. Please check!";
            }
            sort($newtitle);//sorting newtitle.
            for($i=0; $i<count($newtitle); $i++)//looping for display $newtitle.
                {
                    echo "<ul><li>".$newtitle[$i]."<br></li></ul>";
                }
            mysqli_close($connection);
        ?>
    </body>
</html>