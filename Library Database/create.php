<!DOCTYPE html>
<html>
<body>

<form action="" method="POST">
    bookID: <br>
    <input type="text" name="bookID">
    <br>
    bookISBN: <br>
    <input type="text" name="bookISBN">
    <br>
    bookTitle: <br>
    <input type="text" name="bookTitle">
    <br>
    bookGenre: <br>
    <input type="text" name="bookGenre">
    <br>
    bookFormat: <br>
    <input type="text" name="bookFormat">
    <br>
    bookDescription: <br>
    <input type="text" name="bookDescription">
    <br>
    bookFloor: <br>
    <input type="text" name="bookFloor">
    <br>
    bookRow: <br>
    <input type="text" name="bookRow">
    <br>
    bookColumn: <br>
    <input type="text" name="bookColumn">
    <br>
    userID:<br>
    <input type="text" name="userID">
    <br>
    <input type="submit" name="submit">
</form>

<?php
    $host = "localhost";
    $db_name = "library database2";
    $user = "root";
    $password = ""; // no pswd

    //Connect to the database.
    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $exception)
    {
        exit();
    }

    if(isset($_POST['submit'])) {
        $bookID = $_POST['bookID'];
        $bookISBN = $_POST['bookISBN'];
        $bookTitle = $_POST['bookTitle'];
        $bookGenre = $_POST['bookGenre'];
        $bookFormat = $_POST['bookFormat'];
        $bookDescription = $_POST['bookDescription'];
        $bookFloor = $_POST['bookFloor'];
        $bookRow = $_POST['bookRow'];
        $bookColumn = $_POST['bookColumn'];
        $userID = $_POST['userID'];
    

        if(!empty($bookID)) {
            // book has relation with libraryuser,
            // an user has been manually created in the `libraryuser` table with userID = 1
            $sql = "INSERT INTO book (bookISBN,bookTitle,bookGenre,bookFormat,bookDescription,bookFloor,bookRow,bookColumn,userID) VALUES ('$bookISBN','$bookTitle','$bookGenre','$bookFormat','$bookDescription','$bookFloor','$bookRow','$bookColumn', 1)";

            $result = $conn->query($sql);

            if($result == TRUE) {
                echo "New record created successfully";
            }
            else{
                echo "Error:" . $sql . "<br>". $conn->error;
            }
        }
    }


?>
</body>
</html>
