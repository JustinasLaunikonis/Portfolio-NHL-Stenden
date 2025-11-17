<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VanWinteren</title>
        <meta charset="UTF-8"/>
    </head>

    <body>

    <?php
    $name = "Van Winteren";
    $age = 33;
    $yearsCollecting = 4;
    $cars = 33;
    $horses = 37;
    $instruments = 29;
    $rarestInstrument = "guitar";
    $rarestInstrumentAge = 132;
    $favHorse = "Bensley";
    $favHorseAge = 8;
    $favHorseType = "stallion";

    $fullName = "Mr. $name";
    $favHorseDesc = "$favHorse, the $favHorseAge year old $favHorseType";

    echo "<p>
    $fullName , $age years old, has been collecting
    special objects for the past $yearsCollecting years.
    $name currently has $cars cars, $horses horses and
    $instruments rare musical instruments. The rarest instrument
    in $name's possession is a $rarestInstrumentAge-year-old $rarestInstrument.
    His favorite horse is $favHorseDesc.
    </p>";
    ?>
    </body>
</html>
