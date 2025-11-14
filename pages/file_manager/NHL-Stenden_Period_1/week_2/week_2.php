<?php
    require_once '../../../../components/layout.php';

    $faviconPath = $relativePrefix . "assets/sidebar/statistics.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo $pageTitle; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $faviconPath; ?>">

    <link rel="stylesheet" href="<?php echo $relativePrefix; ?>style.css">
    <link rel="stylesheet" href="<?php echo $relativePrefix; ?>file_manager.css">
</head>
<body>
    <?php
    renderHeader($pageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>

    <div class="herobox" style="height: auto;">
        <a href="../NHL-Stenden_Period_1.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">
                /
            </div>
        </a>
    </div>
</body>
</html>