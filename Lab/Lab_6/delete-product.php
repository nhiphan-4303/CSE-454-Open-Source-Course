<?php
if (isset($_GET['id'])) {
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "products";

    $id = $_GET['id'];

    if (empty($id)) {
        die("Invalid ProductCode.");
    }

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($conn, $id);

    $sql = "DELETE FROM `product` WHERE `ProductCode` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/Lab_6/product-page.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
