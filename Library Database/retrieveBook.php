<?php
    $servername = "localhost";
    $dbname = "myDB";


    try
    {
        $conn = new PDO("mysql:host = $servername; dbname = $dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("SELECT bookISBN, bookTitle, bookGenre FROM book");

        $statement->execute();

        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        if($result)
        {
            echo "<table><tr><th>ISBN</th><th>Title</th><th>Genre</th></tr>"

            foreach(new $result as $s)
            {
                echo "<tr><td>".$row["bookISBN"]."</td><td>".$row["bookTitle"]." ".$row["bookGenre"]."</td></tr>";
            }
            echo </table>

        }
        else
        {
            echo "no results";
        }


    }



?>