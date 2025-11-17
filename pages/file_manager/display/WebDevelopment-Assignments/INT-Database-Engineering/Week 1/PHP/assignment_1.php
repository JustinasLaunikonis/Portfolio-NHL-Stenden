<?php 

$distances = array(
    "Berlin" => array(
        "Berlin" => 0,
        "Moscow" => 1607.99,
        "Paris" => 876.96,
        "Prague" => 280.34,
        "Rome" => 1181.67
    ),
    "Moscow" => array(
        "Berlin" => 1607.99,
        "Moscow" => 0,
        "Paris" => 2484.92,
        "Prague" => 1664.04,
        "Rome" => 2374.26
    ),
    "Paris" => array(
        "Berlin" => 876.96,
        "Moscow" => 641.31,
        "Paris" => 0,
        "Prague" => 885.38,
        "Rome" => 1105.76
    ),
    "Prague" => array(
        "Berlin" => 280.34,
        "Moscow" => 1664.04,
        "Paris" => 885.38,
        "Prague" => 0,
        "Rome" => 922
    ),
    "Rome" => array(
        "Berlin" => 1181.67,
        "Moscow" => 2374.26,
        "Paris" => 1105.76,
        "Prague" => 922,
        "Rome" => 0
    )
);

$cities = array_keys($distances);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
</head>
<body>
    <h1>City Distance Calculator</h1>
    
    <?php 
    $message = "";

    if (isset($_POST["city1"]) && isset($_POST["city2"]))
    {
        $city1 = $_POST["city1"];
        $city2 = $_POST["city2"];

        $distance = $distances[$city1][$city2];
        $message = "The distance between $city1 and $city2 is $distance kilometers";
    }
    else
    {
        $message = "Please select two cities to calculate the distance.";
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <label for="city1">From City:</label>
        <select name="city1" id="city1">
            <?php
            foreach ($cities as $city){
                echo "<option value='$city'>";
                echo $city;
                echo "</option>";
            }
            ?>
        </select>
        
        <br>
        
        <label for="city2">To City:</label>
        <select name="city2" id="city2">
            <?php
            foreach ($cities as $city){
                echo "<option value='$city'>";
                echo $city;
                echo "</option>";
            }
            ?>
        </select>
        
        <br>
        
        <button type="submit">Calculate Distance</button>
    </form>
    
    <?php
        if (!empty($message))
        {
            echo "<b>$message</b>";
        }
    ?>
</body>
</html>