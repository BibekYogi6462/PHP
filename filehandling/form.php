<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>
<body>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="upload">Upload:</label>
    <input type="file" name="filetoUpload" id="filetoUpload"><br><br>
    <input type="submit" value="Submit" name="submit">
  </form>
</body>
</html>
