<?php
$uploadDir = __DIR__ . "/uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_POST['replace_images']) && is_array($_POST['replace_images']) && !empty($_FILES['new_images']['tmp_name'])) {
        $replaceImages = array_values($_POST['replace_images']);
        $uploadedNewImages = $_FILES['new_images']['tmp_name'];
        $uploadedNewNames = $_FILES['new_images']['name'];

        foreach ($replaceImages as $index => $oldImage) {
            if (isset($uploadedNewImages[$index]) && is_uploaded_file($uploadedNewImages[$index])) {
                $oldImagePath = $uploadDir . basename($oldImage);
                $newFileName = basename($uploadedNewNames[$index]);
                $targetFile = $uploadDir . $newFileName;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $check = getimagesize($uploadedNewImages[$index]);

                if (
                    $check !== false && $_FILES['new_images']['size'][$index] <= 500000 &&
                    in_array($imageFileType, ['jpg', 'jpeg', 'png'])
                ) {
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    move_uploaded_file($uploadedNewImages[$index], $targetFile);
                }
            }
        }
    }

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            if (!empty($name)) {
                $targetFile = $uploadDir . basename($name);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES['images']['tmp_name'][$key]);

                if (
                    $check !== false && $_FILES['images']['size'][$key] <= 500000 &&
                    in_array($imageFileType, ['jpg', 'jpeg', 'png'])
                ) {
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFile);
                }
            }
        }
    }
}

$images = is_dir($uploadDir) ? array_diff(scandir($uploadDir), ['.', '..']) : [];
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Gallery</title>
</head>

<body>
    <header class="bg-dark text-white text-center p-3">Gallery</header>
    <div class="container mt-4">
        <a href="upload.php" class="btn btn-secondary mb-3">Back to Upload</a>

        <form action="" method="post" enctype="multipart/form-data" class="mb-5">
            <div class="form-group">
                <label for="images">
                    <b>Upload Multiple Images</b>
                </label>
                <input type="file" name="images[]" id="images" class="form-control-file" multiple accept=".png,.jpg,.jpeg">
            </div>
            <button type="submit" class="btn btn-primary">
                Upload Images
            </button>
        </form>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <?php if (!empty($images)): ?>

                    <?php foreach ($images as $image): ?>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="uploads/<?php echo htmlspecialchars($image); ?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input type="checkbox" name="replace_images[]" value="<?php echo htmlspecialchars($image); ?>" class="form-check-input">
                                        <label class="form-check-label">Select to Replace</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p class="text-center">No images found.</p>
                <?php endif; ?>
            </div>

            <div class="form-group mt-4">
                <label for="new_images">
                    <b>Upload New Images for Selected Items</b>
                </label>
                <input type="file" name="new_images[]" id="new_images" class="form-control-file" multiple accept=".png,.jpg,.jpeg">
            </div>
            <button type="submit" class="btn btn-danger mt-3">Change</button>
        </form>
    </div>

    <style>
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card {
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .card-body {
            padding: 10px;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .col-md-3 {
            padding: 10px;
        }

        #replace-section {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.form-check-input').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const anyChecked = document.querySelectorAll('.form-check-input:checked').length > 0;
                document.getElementById('replace-section').style.display = anyChecked ? 'block' : 'none';
            });
        });
    </script>
</body>

</html>