<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "products";
$port = 3306;
$id = '';
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) {
    die("Connection failed.");
}
if (isset($_GET['id'])) {


    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE ProductCode=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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

    <title>Edit Product</title>
</head>

<body>
    <div class="container">
        <form method="GET">
            <div class="form-group">
                <label for="">Product Code</label>
                <input type="text" class="form-control" name="ProductCode" value="<?php echo $row['ProductCode'] ?>"
                    readonly />
            </div>

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="ProductName" value="<?php echo $row['ProductName'] ?>" required />
            </div>

            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" class="form-control" name="Brand" value="<?php echo $row['Brand'] ?>" />
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" class="form-control" name="Quantity" value="<?php echo $row['Quantity'] ?>" required />
            </div>
            <div class=" form-group">
                <label for="">Importing Date</label>
                <input type="date" class="form-control" name="ImportingDate" value=" <?php echo $row['ImportingDate'] ?>" />
            </div>
            <div class="form-group">
                <label for="">Image URL</label>
                <input type="text" class="form-control" name="ImageURL" value="<?php echo $row['ImageURL'] ?>" required />
            </div>
            <button type=" submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        if (isset($_GET["ProductCode"])) {
            $ProductCode = $_GET["ProductCode"];
            $ProductName = $_GET["ProductName"];
            $Brand = $_GET["Brand"];
            $Quantity = $_GET["Quantity"];
            $ImportingDate = date('Y-m-d', strtotime($_GET["ImportingDate"]));
            $ImageURL = $_GET["ImageURL"];
            mysqli_set_charset($conn, "utf8");

            $sql = "UPDATE `product` SET `ProductCode` = '$ProductCode', `ProductName` = '$ProductName', `Brand` = '$Brand',
`Quantity`= $Quantity , `ImportingDate`= '$ImportingDate',`ImageURL`= '$ImageURL' WHERE `ProductCode` = $ProductCode ;";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Your book is updated. ID = $ProductCode";
            } else {
                echo "Error.";
            }

            mysqli_close($conn);
            header("Location: http://localhost/Lab_5/Assignment1/product-page.php");
        }
    }

    ?>
</body>

</html>