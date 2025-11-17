<?php
    $navigation = array("Vip-Card", "Pizza points", "Customer support", "Locations");
    $navigationLink = array("index.php", "#", "#", "#");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Em Men Pizza</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="Resources_IT/logo.png" alt="logo">
        <div class="navbar">
            <img src="Resources_IT/header-image-lg.jpg" alt="green-bg">
            <div class="navbar-links">
                <ul>
                    <?php
                        for ($i = 0; $i < count($navigation); $i++) {
                            echo '<li><a href="' . $navigationLink[$i] . '">' . $navigation[$i] . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="searchbar">
            <div class="header-image-container">
                <img src="Resources_IT/header.png" alt="header-pizza">
            </div>
            <div class="searchbar-type">
                <textarea name="search" id="search" placeholder="What are you looking for?" style="width: 700px; height: 50px;"></textarea>
            </div>
        </div>
    </header>

    <main>
        <h1>Em Men Pizza</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis posuere nulla, quis ultrices quam sollicitudin ut. Maecenas ac arcu ullamcorper, aliquam dui vel, scelerisque turpis. Vivamus urna sem, rutrum sed arcu in, cursus dictum diam. Vestibulum bibendum vulputate magna et sagittis. Nullam nunc mauris, laoreet at eros id, maximus ullamcorper lectus. Nulla rhoncus quam eu tristique viverra. Cras risus dolor, pellentesque molestie dictum quis, blandit a augue. Cras pharetra massa ut nisi ullamcorper, ut cursus lorem dictum. Quisque vulputate orci malesuada massa porta sagittis. Aliquam sit amet dui quis ex vehicula placerat.</p>
        <h1>Pick your dough!</h1>

        <div class="underline"></div>


        <div class="pizza-container">
            <div>
                <img src="Resources_IT/doublepizza.png" alt="double-pizza">
                <h3>Double Pizza Special</h3>
                <h5>Double tasty: 2 flavours, 1 pizza</h5>
                <p>The best of both worlds on one pizza. Order the Double tasty and create your own pizza. One pizza, two flavours. </p>
                <p>Starting from € 4,99</p>

                <a href="index.php">
                    <button class="flavour_button">Choose your flavours</button>
                </a>
            </div>
            <div>
                <img src="Resources_IT/doublepizza.png" alt="double-pizza">
                <h3>Double Pizza Special</h3>
                <h5>Double tasty: 2 flavours, 1 pizza</h5>
                <p>The best of both worlds on one pizza. Order the Double tasty and create your own pizza. One pizza, two flavours. </p>
                <p>Starting from € 4,99</p>

                <a href="index.php">
                    <button class="flavour_button">Choose your flavours</button>
                </a>
            </div>
            <div>
                <img src="Resources_IT/doublepizza.png" alt="double-pizza">
                <h3>Double Pizza Special</h3>
                <h5>Double tasty: 2 flavours, 1 pizza</h5>
                <p>The best of both worlds on one pizza. Order the Double tasty and create your own pizza. One pizza, two flavours. </p>
                <p>Starting from € 4,99</p>

                <a href="index.php">
                    <button class="flavour_button">Choose your flavours</button>
                </a>
            </div>
            <div>
                <img src="Resources_IT/doublepizza.png" alt="double-pizza">
                <h3>Double Pizza Special</h3>
                <h5>Double tasty: 2 flavours, 1 pizza</h5>
                <p>The best of both worlds on one pizza. Order the Double tasty and create your own pizza. One pizza, two flavours. </p>
                <p>Starting from € 4,99</p>

                <a href="index.php">
                    <button class="flavour_button">Choose your flavours</button>
                </a>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-left">
            <p>&copy; 2022 Em Men Pizza</p>
            <p style="color: black">Do good. Be nice. Order pizza by mail!</p>
        </div>

        <div class="footer-right">
            <ul>
                <li>Monday 18:00 - 21:00</li>
                <li>Tuesday 18:00 - 21:00</li>
                <li>Wednesday 18:00 - 21:00</li>
                <li>Thursday 18:00 - 21:00</li>
                <li>Friday 18:00 - 21:00</li>
                <li>Saturday 18:00 - 23:00</li>
            </ul>
        </div>
    </footer>
</body>
</html>