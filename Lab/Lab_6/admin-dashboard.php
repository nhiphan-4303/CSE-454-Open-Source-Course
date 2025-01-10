<?php
session_start();
if (!isset($_SESSION['UserType'])) {
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
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">CSE 454</a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="mb-4">
            Welcome, <?php echo $_SESSION['UserName']; ?>!
        </h1>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="product-page.php">
                                <span data-feather="bar-chart-2"></span>
                                Manage Products
                            </a>
                        </li>


                        <?php if ($_SESSION['UserType'] == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="user-list.php">
                                    <span data-feather="layers"></span>
                                    Manage Users
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <p>Welcome to the dashboard! You can manage products and, if you're an Admin, you can manage users.</p>

                <div class="table-responsive">
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
                                        } else {
                                            echo "No Image";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                
                            <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>