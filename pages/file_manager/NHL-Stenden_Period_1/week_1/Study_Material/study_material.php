<?php
    $currentPage = "file_manager.php";
    $customPageTitle = "Study Material";
    require_once '../../../../../components/layout.php';

    $faviconPath = $relativePrefix . "assets/sidebar/file_manager.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../../../../components/head_file_manager.php'; ?>
</head>
<body>
    <?php
    renderHeader($customPageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>

    <div class="herobox" style="height: 100vh;">
        <a href="../../../file_manager.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">
                /
            </div>
        </a>
        <a href="../../NHL-Stenden_Period_1.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment2">
                NHL-Stenden_Period_1
            </div>
        </a>
        <a href="../week_1.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">
                week_1
            </div>
        </a>
        <div class="pathSegment2">
            Study Material
        </div>


        <div class="fileManagerEntry">
            <a href="week_1/assignments.php" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>Demo 1</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <a href="" class="fileEntryLink">
                <img src="<?php echo $relativePrefix; ?>assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
                <div class="fileEntryInfo">
                    <div class="fileEntryTitle">
                        <p>For Students</p>
                    </div>
                    <div class="fileEntrySubtitle">
                        <p>Directory</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>ArithmetBinOps.php</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>AssignmentOps.php</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files_text.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>BridgesCanals-VanWinteren.pdf</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>Echo_Print.php</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>phpblocks.php</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>TernaryOps.php</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="<?php echo $relativePrefix; ?>assets/file_manager/files_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>Week 1 - Webdev Basics.pptx</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>