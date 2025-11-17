<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
</head>

<body>
    <h2>Set 1: (6 | 4 | 4 | 1)</h2>
    <h2>Set 2: (8 | 2 | 6 | 1)</h2>
    <h2>Set 3: (6 | 8 | 8 | 2)</h2>

    <?php
    $a = 6;
    $b = 4;
    $c = 4;
    $d = 1;

    // (6 - 1) * 4 + 4 = 24
    $answerSet1 = ($a - $d) * $b + $c;
    echo "<p>Answer Set 1: (" . $a . " - " . $d . ") * " . $b . " + " . $c . " = <b>" . $answerSet1 . "</b></p>";
    

    $a = 8;
    $b = 2;
    $c = 6;
    $d = 1;
    // ((8 - 6) * (2 + 1) * 2) * 2 = 24
    $answerSet2 = (($a - $c) * ($b + $d) * $b) * $b;
    echo "<p>Answer Set 2: ((" . $a . " - " . $c . ") * (" . $b . " + " . $d . ") * " . $b . ") = <b>" . $answerSet2 . "</b></p>";


    $a = 6;
    $b = 8;
    $c = 8;
    $d = 2;
    // (6 + 8 + 8 + 2) = 24
    $answerSet3 = $a + $b + $c + $d;
    echo "<p>Answer Set 3: " . $a . " + " . $b . " + " . $c . " + " . $d . " = <b>" . $answerSet3 . "</b></p>";
    ?>
</body>
</html>