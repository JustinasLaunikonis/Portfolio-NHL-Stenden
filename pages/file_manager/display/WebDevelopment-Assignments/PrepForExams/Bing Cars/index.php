<?php
    $menuTexts = array("Home", "Most hired cars", "Contact");
    $menuLinks = array("index.php", "#", "#");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bing's Cars™</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="navbar-logo">
                <img src="ForStudents/logo.png" alt="logo">
            </div>
            <div class="navbar-links">
                <ul>
                    <?php
                        for ($i = 0; $i < count($menuTexts); $i++) {
                            echo '<li><a href="' . $menuLinks[$i] . '">' . $menuTexts[$i] . '</a></li>';
                        }
                    ?>
                </ul>
            </div>   
        </div>
        <div class="lower-header">
            <img src="ForStudents/header.png" alt="header-car">
            <div class="lower-header-text">
                <h1>Bing's Cars</h1>
                <h2>For all your special cars</h2>
            </div>
        </div>
    </header>


    <main>

    </main>

    <footer>
        <div class="footer-left">
            <p>&copy; 2022 Bing Cars</p>
            <p style="color: black; text-decoration: underline;">Send us a direct email!</p>
        </div>

        <div class="footer-right">
            <ul>
                <li>Monday 13:00 - 18:00</li>
                <li>Tuesday 9:00 - 18:00</li>
                <li>Wednesday 9:00 - 18:00</li>
                <li>Thursday 9:00 - 21:00</li>
                <li>Friday 9:00 - 21:00</li>
                <li>Saturday 9:00 - 17:00</li>
            </ul>
        </div>
    </footer>
</body>
</html>