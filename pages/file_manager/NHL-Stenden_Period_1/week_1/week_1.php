<?php
    $currentPage = "file_manager.php";
    $customPageTitle = "Week 1";
    require_once '../../../../components/layout.php';

    $faviconPath = $relativePrefix . "assets/sidebar/file_manager.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../../../components/head_file_manager.php'; ?>
</head>
<body>
    <?php
    renderHeader($customPageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>

    <div class="herobox" style="height: 100vh;">
        <a href="../../file_manager.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">
                /
            </div>
        </a>
        <a href="../NHL-Stenden_Period_1.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment2">
                NHL-Stenden_Period_1
            </div>
        </a>
        <div class="pathSegment">
            week_1
        </div>


        <div class="fileManagerEntry">
            <a href="week_1/assignments.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>Assignments</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="Study_Material/study_material.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>Study Material</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>