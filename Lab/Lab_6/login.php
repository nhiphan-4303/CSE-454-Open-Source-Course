<?php
session_start();

$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$dbName = "storeUser";

$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $conn = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['Password'])) {
         
            $_SESSION['UserId'] = $user['Id'];
            $_SESSION['UserType'] = $user['Type'];
            $_SESSION['UserName'] = $user['FullName'];

            if ($user['Type'] == 'Admin') {
                header("Location: http://localhost/Lab_6/admin-dashboard.php");
            } elseif ($user['Type'] == 'Author' || $user['Type'] == 'Normal User') {
                header("Location: http://localhost/Lab_6/admin-dashboard.php");
            }
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="h3 mb-3 font-weight-normal text-center">Please log in</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form method="POST">
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" id="inputEmail" name="Email"
                    value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Email address"
                    required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        </form>
    </div>
</body>

</html>