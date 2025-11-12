<?php
    require_once '../components/layout.php';

    $faviconPath = "../assets/sidebar/" . pathinfo($currentPage, PATHINFO_FILENAME) . ".png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="icon" type="image/x-icon" href="<?php echo $faviconPath; ?>">

    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
    renderHeader($pageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate);
    ?>
</body>
</html>