<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = __DIR__ . "/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (!empty($_POST['replace_image'])) {
        $replace_image = basename($_POST['replace_image']);
        $replace_path = $target_dir . $replace_image;

        if (file_exists($replace_path)) {
            unlink($replace_path);
        }
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!is_uploaded_file($_FILES["image"]["tmp_name"])) {
        echo "Temporary file is missing.";
        exit;
    }

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$uploaded_images = [];
$target_dir = __DIR__ . "/uploads/";
if (is_dir($target_dir)) {
    $uploaded_images = array_diff(scandir($target_dir), ['.', '..']);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>

<body>
    <header>LOGO</header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-title">Dashboard</div>

                    <ul class="sidebar-menu">
                        <li><a href="gallery.php">Gallery</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <main>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">
                                <b>Upload New Image</b>
                            </label>
                            <input type="file" name="image" class="form-control-file" id="image" accept=".png,.jpg">
                        </div>

                        <div class="form-group" id="replace-section" style="display: none;">
                            <label for="replace_image"><b>Select an Image to Replace</b> (Optional)</label>

                            <select name="replace_image" id="replace_image" class="form-control">
                                <option value="">-- None --</option>
                                <?php foreach ($uploaded_images as $img): ?>
                                    <option value="<?= htmlspecialchars($img) ?>"><?= htmlspecialchars($img) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="button" id="edit-btn" class="btn btn-secondary mt-3">Edit</button>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                    <hr>
                    <h3>Uploaded Images</h3>

                    <div class="row">
                        <?php foreach ($uploaded_images as $img): ?>
                            <div class="col-md-3 mb-3">
                                <img src="uploads/<?= htmlspecialchars($img) ?>" class="img-fluid img-thumbnail" alt="<?= htmlspecialchars($img) ?>">
                                <p class="text-center"><?= htmlspecialchars($img) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </main>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $("#image").change(function(ev) {
            $("#showImage").attr("src", URL.createObjectURL(ev.target.files[0]));
            $("#showImage").show();
        });

        document.getElementById('edit-btn').addEventListener('click', function() {
            const replaceSection = document.getElementById('replace-section');
            if (replaceSection.style.display === 'none') {
                replaceSection.style.display = 'block';
            } else {
                replaceSection.style.display = 'none';
            }
        });
    </script>

    <style>
        .showImage {
            display: none;
            width: 100%;
            height: auto;
            margin-top: 10px;
        }

        header {
            padding: 15px;
            background: #000;
            color: #fff;
            font-size: 28px;
        }

        .sidebar {
            background-color: #ddd;
            padding: 30px 10px;
            height: calc(100vh - 72px);
        }

        .sidebar-title {
            font-weight: bold;
        }

        .sidebar-menu {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-menu>li {
            margin: 0;
            padding: 0;
        }

        .sidebar-menu>li>a {
            display: block;
            padding: 5px 0px;
            color: #000;
            text-decoration: none;
        }

        main {
            padding: 30px;
        }

        img.img-thumbnail {
            max-height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        #replace-section {
            margin-top: 15px;
        }
    </style>
</body>

</html>