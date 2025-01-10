<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "cse454_book_management";
    $port = 3306;

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn) {
        die("Connection failed.");
    }

    $sql = "SELECT * FROM `books`";
    $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Book Management - Lib</title>
</head>

<body>
    <div class="container">
        <a class="btn btn-outline-primary mb-2" href="addNew.php">Add New</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
<?php
    $stt = 1;
    while ($row = mysqli_fetch_assoc($result)) {
?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row["BookTitle"]; ?></td>
                    <td><?php echo $row["Authors"]; ?></td>
                    <td><?php echo $row["Quantity"]; ?></td>
                    <td><?php echo $row["Status"]; ?></td>
                    <td>
                        <button class="btn btn-outline-danger" data-id="<?php echo $row['Id'] ?>">×</button>
                    </td>
                </tr>
<?php
    }
    mysqli_close($conn);
?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("tbody").on("click", ".btn-outline-danger", function() {
            if(confirm("Are you sure?")) {
                let id = $(this).attr("data-id");
                location.href = "http://localhost/cse454/function.php?id=" + id;
            }
        });
    </script>
</body>
</html>
