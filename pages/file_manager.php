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
    <link rel="stylesheet" href="../file_manager.css">
</head>
<body>
    <?php
    renderHeader($pageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate);
    ?>

    <div class="herobox" style="height: auto;">
        <div class="pathSegment">
            /
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>LocalBackups</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/trash_bin.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>Trashed Files</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>config</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>crash-reports</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>debug</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>libraries</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>logs</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>plugins</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>NHL-Stenden_Period_1</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>NHL-Stenden_Period_2</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>versions</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Directory</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_text.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>PortfolioBackupManifest.json</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>433.00 B Modified 12/11/2025 12:19:25</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_text.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>banned-individuals.json</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>7.58 KB Modified 12/11/2025 12:21:44</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>CV.yml</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>705.00 B Modified 12/11/2025 07:11:03</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/folder.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>commands</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>104.00 B Modified 12/11/2025 07:11:03</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>eula.txt</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>9.00 B Modified 11/11/2025 15:56:49</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>help.yml</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Modified 25/02/2025 22:02:44</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_extra.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>permissions.yml</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>Modified 25/02/2025 22:02:44</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_text.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>usercache.json</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>73.22 KB Modified 12/11/2025 11:44:40</p>
                </div>
            </div>
        </div>

        <div class="fileManagerEntry">
            <img src="../assets/file_manager/files_text.png" alt="folder" class="fileEntryIcon">
            <div class="fileEntryInfo">
                <div class="fileEntryTitle">
                    <p>whitelist.json</p>
                </div>
                <div class="fileEntrySubtitle">
                    <p>175.00 B Modified 21/09/2025 15:56:49</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>