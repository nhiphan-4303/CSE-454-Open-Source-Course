<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "products";
$port = 3306;

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET["ProductCode"])) {
        $ProductCode = $_GET["ProductCode"];
        $ProductName = $_GET["ProductName"];
        $Brand = $_GET["Brand"];
        $Quantity = $_GET["Quantity"];
        $ImportingDate = date('Y-m-d', strtotime($_GET["ImportingDate"]));
        $ImageURL = $_GET["ImageURL"];

        $conn = mysqli_connect(hostname: $serverName, username: $userName, password: $password, database: $dbName);
        if (!$conn) {
            die("Connection failed.");
        }

        mysqli_set_charset(mysql: $conn, charset: "utf8");

        $sql = "INSERT INTO `product`(`ProductCode`, `ProductName`, `Brand`, `Quantity`,`ImportingDate`,`ImageURL`) 
        VALUES ('$ProductCode','$ProductName','$Brand', $Quantity, '$ImportingDate','$ImageURL')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Your product is inserted. ID = $ProductCode";
        } else {
            echo "Error.";
        }

        mysqli_close($conn);
        header("refresh:3; url = http://localhost/Lab_5/Assignment1/product-page.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Add A New Product</title>
</head>

<body>
    <div class="container mt-5">
        <form method="GET">
            <div class="form-group">
                <label for="">Product Code</label>
                <input type="text" class="form-control" name="ProductCode" required>
            </div>

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="ProductName" required>
            </div>

            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" class="form-control" name="Brand" required>
            </div>

            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="Quantity" min=0 required>
            </div>

            <div class="form-group">
                <label for="">Importing Date</label>
                <input type="date" class="form-control" name="ImportingDate" required>
            </div>

            <div class="form-group">
                <label for="">Image URL</label>
                <input type="url" class="form-control" name="ImageURL" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

</body>

</html>