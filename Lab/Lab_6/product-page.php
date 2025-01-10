<?php
session_start();
if (!isset($_SESSION['UserType']) || !in_array($_SESSION['UserType'], ['Admin', 'Author', 'Normal User'])) {
    header("Location: login.php");
    exit();
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "products";
$port = 3306;

$conn = mysqli_connect($serverName, $userName, $password, $dbName, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `product`";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Product List</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product Management</h1>
        <p>Welcome, <?php echo $_SESSION['UserName']; ?> (Role: <?php echo $_SESSION['UserType']; ?>)</p>

        <div class="btn-container mb-3">
            <a class="btn btn-outline-primary" href="add-new-product.php">Add New Product</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Code</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Brand</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Importing Date</th>
                    <th scope="col" class="text-center">Product Image</th>
                    <th scope="col" class="text-center">Function</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $stt = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="col" class="text-center"><?php echo $stt++ ?></th>
                        <td class="text-center"><?php echo $row["ProductCode"] ?></td>
                        <td class="text-center"><?php echo $row["ProductName"] ?></td>
                        <td class="text-center"><?php echo $row["Brand"] ?></td>
                        <td class="text-center"><?php echo $row["Quantity"] ?></td>
                        <td class="text-center"><?php echo $row["ImportingDate"] ?></td>
                        <td class="text-center">
                            <?php
                            $ImageURL = trim($row["ImageURL"], '"');
                            if (filter_var($ImageURL, FILTER_VALIDATE_URL)) {
                                echo '<img src="' . $ImageURL . '" class="img-thumbnail border-0" loading="lazy" width="250px">';
                            }
                            ?>
                        </td>

                        <td class="text-center">
                           
                            <a href="edit-product.php?id=<?php echo $row['ProductCode']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                          
                            <a href="delete-product.php?id=<?php echo $row['ProductCode']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this product?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <a href="admin-dashboard.php" class="btn btn-primary">Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>