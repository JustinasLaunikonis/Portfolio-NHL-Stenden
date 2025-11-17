<!DOCTYPE html>
<html lang="en">
    <head>
        <title>File:Echo_Print.php</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
    <?php
    //Author: Gerjan
    //Date: 22/07/2022
    //Time: 14:26

    echo "Use an echo or a print to show something on screen <br><br>";

    echo "This could be a standard piece of text, or it could be:";

    $text = "variables";
    $html = " or html content like <b>bold</b> or even ";
    $link = "<a href='phpblocks.php'>a link</a><br><br>";
    echo $text;
    echo $html;
    echo $link;

    print "Print works in the same way, but there is a small difference. Can you find out what it is? 
    (Feel free to ask this in class!)";

    print "It's important to keep your {$text} free within your strings.";
    print "There are several ways to keep your ".$text." free within strings";

    /*
     * By keeping variables free it's possible to use or manipulate them during the echo or print call.
     * Check out the next example to see what I mean.
     */

    $peterAge = 16;
    $billyAge = 18;

    echo "Little Peter is {$peterAge} years old. He might not want te be called 'little' anymore. 
    However little Billy is {$billyAge} years old and he doesn't mind.<br>";
    //With the example above (using the curly braces) only a simple expression is allowed. No manipulation is allowed.
    echo "The age difference between Peter and Billy is ". ($billyAge - $peterAge)." years. But knowing that Billy's birthday
    is next month, we can also say there's a ". ($billyAge - $peterAge + 1) ." year gap between them.";
    //This method (variable concatenation) allows for manipulation like calculations and lots more. Even within the echo call.
    ?>
    </body>
</html>
