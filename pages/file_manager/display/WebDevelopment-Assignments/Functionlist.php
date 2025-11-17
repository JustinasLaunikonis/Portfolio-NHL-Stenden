
    <?php
    // String? --> String is technically an array. Every character has its own index!
    $school = "<p>NHLStenden";
    $school .= " is a school.</p>";
    echo $school;

    // strlen() --> Returns the amount of chars (characters).
    $nummer = "password";
    echo "<p>" . strlen($nummer) . "</p>";

    // // str_word_count() --> Returns the amount of words.
    $film = "Alice in a Wonderland Two";
    echo "<p>" . str_word_count($film)  . "</p>";

    // ucfirst() --> First word, first letter uppercase.
    // lcfirst() --> First word, first letter lowercase.
    // ucwords() --> All words, first letter uppercase.
    // strtolower() --> All words fully lowercase. 
    // strotoupper() --> All words fully uppercase.
    // ctype_upper() --> Checks if the variable is fully upppercase, returns true or false.
    // ctype_lower() --> Checks if the variable is fully lowercase, returns true or false.
    $quote = "may thE fOrCe bE WIth yOU!";
    echo ucfirst($quote) . "<br />";
    echo lcfirst($quote) . "<br />"; 
    echo ucwords($quote);
    echo strtolower($quote);
    echo ucfirst(strtolower($quote)) . "<br />";  



    if(ctype_upper("HELLO"))
    {
        echo "This string consists of only uppercase letters";
    }
    if (!ctype_lower("Hello")) {
        echo "This string consists of only lowercase letters";
    }


    //substr() --> Returns a substring (part) of the provided string, can be provided with offset and length.
    //             Negative values will start from the back.
    $php = "hypertext preprocessor";
    echo substr($php, 4) . "<br />";
    echo substr($php, 5, 9) . "<br />";
    echo substr($php, -12) . "<br />";
    echo substr($php, -12, -7) . "<br />";


    // // strrev() --> Reverse string
    echo "<p>" . strrev($php) . "</p><br />";
    
    // strpos() --> Returns the position of the requested string (or character), false if not found.
    // strchr() --> Returns the part of the string starting from the requested string (or character), false if not found.
    // strrchr() --> Returns the part of the string starting from the request string (or character), false if not found. 
    //              This starts from the back.
    $email = "student@stenden.com";
    echo strpos($email, '@') . "<br />";
    echo strchr($email, '.com') . "<br />";
    echo strrchr($email, 'x') . "<br />";

    // str_replace()  --> Replaces a certain part of the string with a different string.
    // str_ireplace() --> Same result, but case-insensitive.
    $email = "name@stenden.com";
    $newemail = str_ireplace("popcorn", "nhlstenden", $email);
    echo $newemail . "<br />";
    
    // substr_replace() --> Replaces the part of the string assigned by index numbers. 
    $newemail2 = substr_replace($email, "student", 0, 4);
    echo $newemail2 . "<br />";
    
    // // String to Array
    $cat = "longcat is long";

    $arraySplit = str_split($cat, 6);
    echo "<pre>";
    print_r($arraySplit);
    echo "</pre>";

    echo "<pre>";
    var_dump($arraySplit);
    echo "</pre>";

    // // explode() -->  Breaks the string into an array, breaks occur based on provided string.
    $arrayExplode = explode(" ", $cat);
    echo "<pre>";
    var_export($arrayExplode);
    echo "</pre>";
    
    // // Array to String
    $catsArray = array("Bob", "Bob2", "Bob3");
    print_r($catsArray);
    echo "<br />";
    
    // implode() -->  Creates a string from the elements of the array, 'glueing' them together with the provided string.
    $cats = implode(" ", $catsArray);
    echo $cats;
    
    // // Sort Array --> Pass by REFERENCE
    $numberArray =  array(12, 14, 3, 29, 312, 0);

    echo "<br />";

    sort($numberArray);

    var_dump($numberArray);

    ?>
