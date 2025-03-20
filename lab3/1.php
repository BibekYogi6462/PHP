<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Webpage</title>
</head>
<body>
    <h1>Welcome to My Dynamic Webpage</h1>
    <p>
        <?php
            echo "Today's date is " . date("l, F j, Y") . ".";
        ?>
    </p>
</body>
</html>
