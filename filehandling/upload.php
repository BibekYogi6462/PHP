<?php
$target_dir = "uploads/";

// Check if the form is submitted and file is uploaded
if (isset($_POST["submit"])) {
    if (isset($_FILES["filetoUpload"]) && $_FILES["filetoUpload"]["error"] === UPLOAD_ERR_OK) {
        $target_file = $target_dir . basename($_FILES["filetoUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES["filetoUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }

        // Allow only specific file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.<br>";
            $uploadOk = 0;
        }

        // Upload the file if no errors
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["filetoUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["filetoUpload"]["name"])) . " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    } else {
        echo "No file uploaded or an error occurred during upload.<br>";
    }
}
?>
