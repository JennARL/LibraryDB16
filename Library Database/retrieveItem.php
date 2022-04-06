<?php
    $servername = "localhost";
    $dbname = "myDB";


    try
    {
        $conn = new PDO("mysql:host = $servername; dbname = $dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("SELECT itemName FROM libraryItem");

        $statement->execute();

        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        if($result)
        {
            echo "<table><tr><th>Item</th>></tr>"

            foreach(new $result as $s)
            {
                echo "<tr><td>".$row["itemName"]."</td></tr>";
            }
            echo </table>

        }
        else
        {
            echo "no results";
        }


    }



?>