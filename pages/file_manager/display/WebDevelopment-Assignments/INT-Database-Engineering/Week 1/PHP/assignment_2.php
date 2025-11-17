<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $type = filter_input(INPUT_POST, "type");
    $comment = filter_input(INPUT_POST, "comment");
    $option = filter_input(INPUT_POST, "option");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
</head>
<body>
    <?php
        $errors = [];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($name)) {
                $errors[] = "First name cannot be empty.";
            } elseif (strlen($name) < 2) {
                $errors[] = "First name must be at least 2 characters long.";
            }
    
            if (empty($_POST["email"])) {
                $errors[] = "Email cannot be empty.";
            } elseif (!$email) {
                $errors[] = "Please enter a valid email address.";
            }
    
            if (!isset($_POST["type"])) {
                $errors[] = "Please select a Student or a Teacher.";
            }
    
            if (empty($comment)) {
                $errors[] = "Comments cannot be empty.";
            } else {
                $wordCount = str_word_count(trim($comment));
                if ($wordCount < 5) {
                    $errors[] = "Comments must contain at least 5 words.";
                }
            }         
    
            if (!empty($errors)) {
                echo "<ul style='color: red;'>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            } else {
                echo "<div style='color: green;'>";
                echo "<p>Dear <b>$name</b>,</p>";
                echo "<p>You will post comments as <b>$type</b> with the following email address: <b>$email</b>.</p>";
                echo "<p>The comment is as follows: <b>$comment</b>.</p>";
                if (isset($option) && $option === "Yes") {
                    echo "<p>All users will be notified.</p>";
                }
                echo "</div>";
            }
        }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <div>
            <label for="name">First Name:</label>
            <input type="text" name="name" id="name">
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="myname@example.com">   
        </div>

        <div>
            <input type="radio" name="type" id="radio_1" checked="" value="Student">
            <label for="radio_1">Student</label>

            <input type="radio" name="type" id="radio_2" value="Teacher">
            <label for="radio_2">Teacher</label>
        </div>

        <label for="comment">Comments:</label>
        <textarea id="comment" name="comment" style="resize: none;"></textarea>

        <div>
            <p>Send email to all users?</p>
            <label for="checkbox1">Yes</label>
            <input type="checkbox" name="option" value="Yes" id="checkbox1">
        </div>

        <div class="buttons">
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>
</html>