<?php
    if (isset($_GET['id'])) {
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "cse454_book_management";
        $port = 3306;

        $conn = mysqli_connect($serverName, $userName, $password, $dbName);
        if (!$conn) {
            die("Connection failed.");
        }

        $id = $_GET["id"];
        $sql = "DELETE FROM `books` WHERE Id=$id";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        header("Location: http://localhost/cse454/index.php");
        die();
    }
?>
