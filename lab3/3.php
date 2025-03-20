<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulating HTML</title>
    <style>
        .even {
            color: black;
        }
        .odd {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Numbers List</h1>
    <ul>
        <?php
            for ($i = 1; $i <= 5; $i++) {
                if ($i % 2 == 0) {
                    echo "<li class='even'>Number $i</li>";
                } else {
                    echo "<li class='odd'>Number $i</li>";
                }
            }
        ?>
    </ul>
</body>
</html>
