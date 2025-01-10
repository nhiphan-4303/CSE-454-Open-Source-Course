<?php
$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$dbName = "storeUser";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["Email"])) {
        $email = $_POST["Email"];
        $password = password_hash($_POST["Password"], PASSWORD_BCRYPT);
        $fullName = $_POST["FullName"];
        $phoneNumber = $_POST["PhoneNumber"];
        $address = $_POST["Address"];
        $dateOfRegister = $_POST["DateOfRegister"];
        $type = $_POST["Type"];
        $status = $_POST["Status"];

        $conn = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
        if (!$conn) {
            die("Connection failed.");
        }
        mysqli_set_charset($conn, "utf8");

        $sql = "INSERT INTO users (Email, Password, FullName, PhoneNumber, Address, DateOfRegister, Type, Status) 
                VALUES ('$email', '$password', '$fullName', '$phoneNumber', '$address', '$dateOfRegister', '$type', '$status')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $lastID = mysqli_insert_id(mysql: $conn);
            echo "User inserted successfully. ID = $lastID";
        } else {
            echo "Error.";
        }

        mysqli_close($conn);
        header("refresh:3; url = http://localhost/Lab_6/user-list.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Add User</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mt-4 mb-3">Add New User</h1>
        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="Password" required>
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="FullName">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="Address">
            </div>
            <div class="form-group">
                <label>Date of Register</label>
                <input type="date" class="form-control" name="DateOfRegister">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select name="Type" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Author">Author</option>
                    <option value="Normal User">Normal User</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option value="activated">Activated</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
            
            <a href="user-list.php">
                <button type="button" class="btn btn-primary">Show data</button>
            </a>
        </form>
    </div>
</body>

</html>