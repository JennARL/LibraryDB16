<?php
    $servername = "localhost";
    $dbname = "myDB";


    try
    {
        $conn = new PDO("mysql:host = $servername; dbname = $dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("SELECT userFirstName, userLastName, userType, printBalance, libraryFines FROM libraryUser");

        $statement->execute();

        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        if($result)
        {
            echo "<table><tr><th>"First Name"</th><th>"Last Name"</th><th>"Classification"</th>><th>"Printing Balance"</th>><th>"Fines"</th></tr>"

            foreach(new $result as $s)
            {
                echo "<tr><td>".$row["userFirstName"]."</td><td>".$row["userLastName"]." ".$row["userType"]."</td><td>".$row["printBalance"]."</td><td>".$row["libraryFines"]."</td></tr>";
            }
            echo </table>

        }
        else
        {
            echo "no results";
        }


    }



?>