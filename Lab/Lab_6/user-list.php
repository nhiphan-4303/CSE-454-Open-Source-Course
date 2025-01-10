<?php
session_start();
if (!isset($_SESSION['UserType']) || $_SESSION['UserType'] != 'Admin') {
    header("Location: admin-dashboard.php");
    exit();
}

$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$dbName = "storeUser";

$conn = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
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
    <title>User List</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-3">User List</h1>
        <a href="add-user.php" class="btn btn-outline-primary mb-3">Add New User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date of Register</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['FullName']; ?></td>
                        <td><?php echo $row['PhoneNumber']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['DateOfRegister']; ?></td>
                        <td><?php echo $row['Type']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                        
                        <td>
                            <a href="edit-user.php?id=<?php echo $row['Id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete-user.php?id=<?php echo $row['Id']; ?>&type=delete"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <a href="admin-dashboard.php" class="btn btn-primary">Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>