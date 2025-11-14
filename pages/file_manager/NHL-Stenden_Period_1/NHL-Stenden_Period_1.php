<?php
    $currentPage = "file_manager.php";
    $customPageTitle = "NHL-Stenden_Period_1";
    require_once '../../../components/layout.php';

    $faviconPath = $relativePrefix . "assets/sidebar/file_manager.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../../components/head_file_manager.php'; ?>
</head>
<body>
    <?php
    renderHeader($customPageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>

    <div class="herobox" style="height: 100vh;">
        <a href="../file_manager.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">
                /
            </div>
        </a>
        <div class="pathSegment2">
            NHL-Stenden_Period_1
        </div>

        <div class="fileManagerEntry">
            <a href="week_1/week_1.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>week_1</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="week_2/week_2.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>week_2</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="week_3/week_3.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>week_3</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="week_4/week_4.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>week_4</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="week_5/week_5.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>week_5</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>Sunny Socks</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>