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
        die("Connection failed: ");
    }

    $sql = "DELETE FROM `product` WHERE `ProductCode` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id); 

    if (mysqli_stmt_execute($stmt)) {
        header("Location: http://localhost/Lab_5/Assignment1/product-page.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
