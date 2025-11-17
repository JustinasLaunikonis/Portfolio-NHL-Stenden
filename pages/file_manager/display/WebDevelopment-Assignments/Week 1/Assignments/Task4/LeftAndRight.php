<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left and Right</title>
</head>

    <body>

        <?php
        $left = 5;
        $right = 7;
        echo "Initial values:<br>";
        echo "Left: $left<br>Right: $right<br>";
        echo "==================<br>";
        

        $left = $left + $right; // left is now 12 = (7 + 5)
        $right = $left - $right; // right is now 5 = (12 - 7)


        $left = $left - $right; // left is now 7 = (12 - 5)

        echo "Left: $left<br>Right: $right";
        ?>

    </body>
</html>