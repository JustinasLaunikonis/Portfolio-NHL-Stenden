<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VanWinteren</title>
        <meta charset="UTF-8"/>
    </head>

    <body>

    <?php
    $name = "<i>Van Winteren</i>";
    $age = 33;
    $yearsCollecting = 4;
    $cars = 33;
    $horses = 37;
    $instruments = 29;
    $rarestInstrument = "<u>guitar</u>";
    $rarestInstrumentAge = 132;
    $favHorse = "<i>Bensley</i>";
    $favHorseAge = 8;
    $favHorseType = "stallion";

    $fullName = "Mr. $name";
    $favHorseDesc = "$favHorse</i>, the <b>$favHorseAge</b> year old $favHorseType";

    echo "<p>
    $fullName, <b>$age</b> years old, has been collecting
    special objects for the past <b>$yearsCollecting</b> years.
    $name currently has <b>$cars</b> <u>cars</u>, <b>$horses</b> <u>horses</u> and
    <b>$instruments</b> rare musical <u>instruments</u>. The rarest <u>instrument</u>
    in $name's possession is a <b>$rarestInstrumentAge</b>-year-old $rarestInstrument.
    His favorite horse is $favHorseDesc.
    </p>";
    ?>
    </body>
</html>
