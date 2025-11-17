<!doctype HTML>
<html>
    <head>
        <title>File:AssignmentOps.php</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
    <?php
    //Author: Gerjan van Oenen
    //Date: 22/07/2022
    //Time: 10:35

    // (Standard) Assignment Operators

    /*
    * (Standard) Assignment - Used for assigning values of different datatypes to a variable.
    * The 2 in the example can be replace with a value of any datatype.
    * We'll stick with the 2 so that the other assignments will continue working and not throw errors.
    */
    $foo = 2;
    echo $foo;

    //Arithmetic Assignment Operators

    //Addition Assignment -> $foo = $foo + 4;
    $foo += 4;
    echo $foo;

    //Subtraction Assignment -> $foo = $foo + 4
    $foo -= 4;
    echo $foo;

    //Multiplication Assignment -> $foo = $foo + 4
    $foo *= 4;
    echo $foo;

    //Division Assignment -> $foo = $foo + 4
    $foo /= 4;
    echo $foo;

    //Modulus Assignment -> $foo = $foo + 4
    $foo %= 4;
    echo $foo;

    //Exponentiation Assignment -> $foo = $foo + 4
    $foo **= 4;
    echo $foo;

    // String Concatenation - Used for the prolonging a string by appending more characters to the current value

    $foo = "Fat Tony, we've got a problem with Two-Time Jimmy in Little Italy. Make sure you take care of him";

    $bar = "by giving him this chicken noodle soup. Jimmy's been sick for days, poor thing.";

    echo $foo .= $bar;

    ?>
    </body>
</html>
