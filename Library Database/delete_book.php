<?php
require 'connect.php';
// Attempt update query execution
if(isset($_POST['submit']))
{
    if(!empty($_POST['input']))
    {
        $text = $_POST['input'];
        $sql="SELECT * FROM book WHERE bookID LIKE '%$text%' or bookISBN LIKE '%$text%'";
        $statement = $conn->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ( $results) {
	        foreach ( $results as $result) {
		        $record = $result['userID'];
                $delete_sql = "DELETE FROM book WHERE bookID = $record";
                if ($conn->query($delete_sql) === FALSE) {
                    echo "Error deleting record: " . $conn->error;
                }
	        }
            echo "Record deleted successfully";
        }
        else{
            echo 'No record is found';
        }
    }
}
?>