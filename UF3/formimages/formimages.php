<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="formimages.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*" />
    <button type="submit">Upload</button>
</form>


<?php

if (isset($_FILES["image"])) {
    $image_file = $_FILES["image"];
    if ($image_file["error"] > 0) {
        echo "Error uploading file: " . $image_file["error"];
    } else {
        move_uploaded_file(
            $image_file["tmp_name"],
            __DIR__ . "/images/" . $image_file["name"]
        );
        echo "File uploaded successfully: " . $image_file["name"];

    }
}

foreach (glob(__DIR__ . "/images/*") as $filename) {
    echo "<img src=\"{$filename}\" />";
}


?>
    
</body>
</html>