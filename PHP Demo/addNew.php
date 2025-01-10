<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "cse454_book_management";
    $port = 3306;

    // Check submit method
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        // Check any params are submitted
        if (isset($_POST["BookTitle"])) {
            // Get values from browser
            $bookTitle = $_POST["BookTitle"];
            $authors = $_POST["Authors"];
            $quantity = $_POST["Quantity"];

            //echo "$bookTitle :: $authors :: $quantity";

            // Insert them to DB
            $conn = mysqli_connect($serverName, $userName, $password, $dbName);
            if (!$conn) {
                die("Connection failed.");
            }

            mysqli_set_charset($conn, "utf8");

            $sql = "INSERT INTO `books`(`BookTitle`, `Authors`, `Quantity`, `Status`) 
                    VALUES ('$bookTitle','$authors', $quantity, 0)";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $lastID = mysqli_insert_id($conn);
                echo "Your book is inserted. ID = $lastID";
            } else {
                echo "Error.";
            }

            mysqli_close($conn);
            // header("Location: http://localhost/cse454/index.php");
            header("refresh:3;url=http://localhost/cse454/index.php");
        }
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Adding book - Lib</title>
</head>

<body>
    <div class="container">
        <form method="GET">
            <div class="form-group">
                <label for="">Book Title</label>
                <input type="text" class="form-control" name="BookTitle">
            </div>

            <div class="form-group">
                <label for="">Authors</label>
                <input type="text" class="form-control" name="Authors">
            </div>

            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" class="form-control" name="Quantity">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</body>
</html>
