<?php
$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$dbName = "storeUser";
$port = 3306;

$conn = mysqli_connect($serverName, $userName, $dbPassword, $dbName, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die("User not found with ID = $id");
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Email'])) {
    $email = $_POST["Email"];
    $fullName = $_POST["FullName"];
    $phoneNumber = $_POST["PhoneNumber"];
    $address = $_POST["Address"];
    $type = $_POST["Type"];
    $status = $_POST["Status"];
    $dateOfRegister = $_POST["DateOfRegister"];
    $password = $_POST["Password"];

    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET Email = ?, FullName = ?, PhoneNumber = ?, Address = ?, Type = ?, Status = ?, Password = ?, DateOfRegister = ? WHERE Id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssi", $email, $fullName, $phoneNumber, $address, $type, $status, $password, $dateOfRegister, $id);
    } else {
        $sql = "UPDATE users SET Email = ?, FullName = ?, PhoneNumber = ?, Address = ?, Type = ?, Status = ?, DateOfRegister = ? WHERE Id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $email, $fullName, $phoneNumber, $address, $type, $status, $dateOfRegister, $id);
    }


    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: http://localhost/Lab_6/user-list.php");
            exit();
        } else {
            echo "No changes were made.";
        }
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Edit User</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-3">Edit User</h1>

        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($user['Email'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="Password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="FullName" value="<?php echo htmlspecialchars($user['FullName'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber" value="<?php echo htmlspecialchars($user['PhoneNumber'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="Address" value="<?php echo htmlspecialchars($user['Address'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form-group">
                <label>Date of Register</label>
                <input type="date" class="form-control" name="DateOfRegister" value="<?php echo htmlspecialchars($user['DateOfRegister'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label>Type</label>
                <select name="Type" class="form-control">
                    <option value="Admin" <?php if ($user['Type'] == 'Admin') echo 'selected'; ?>>Admin</option>
                    <option value="Author" <?php if ($user['Type'] == 'Author') echo 'selected'; ?>>Author</option>
                    <option value="Normal User" <?php if ($user['Type'] == 'Normal User') echo 'selected'; ?>>Normal User</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option value="activated" <?php if ($user['Status'] == 'activated') echo 'selected'; ?>>
                        Activated
                    </option>
                    <option value="disabled" <?php if ($user['Status'] == 'disabled') echo 'selected'; ?>>
                        Disabled
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</body>

</html>