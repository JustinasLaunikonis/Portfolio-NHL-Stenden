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

    <div class="herobox" style="height: 165vh;">
        <h2>Reach Me</h2>


        <table style="width: auto; max-width: 100%;">
            <tr>
                <td>Got a quick question?</td>
                <td><button><a href="https://www.instagram.com/justinas.la/" target="_blank">Contact me on Instagram</a></button></td>
            </tr>
            <tr>
                <td>Interested in my work or how I do stuff?</td>
                <td><button><a href="https://github.com/JustinasLaunikonis" target="_blank">Check out my GitHub</a></button></td>
            </tr>
            <tr>
                <td>Still need assistance?</td>
                <td><button>Open a support ticket on my Discord</button></td>
            </tr>
        </table>

        <h2>Updates</h2>
        <p>Currently running version <?php echo $version; ?> - <?php echo $buildDate; ?></p>
        
        <button class="documentation">
            <span>View Release Notes</span>
            <img src="../assets/sidebar/file_manager.png" alt="icon">
            <a href="<?php echo $versionLink; ?>" target="_blank" style="position: absolute; width: 100%; height: 100%;"></a>
        </button>

        <h2 style="margin-top: 35px;">Personal Info</h2>
        <table class="personalInfoTable">
            <tr>
                <td>Deployment Zone</td>
                <td>Lithuania</td>
            </tr>
            <tr>
                <td>Platform</td>
                <td>Bipedal Mammal</td>
            </tr>
            <tr>
                <td>System Type</td>
                <td>Carbon-based Lifeform (14/08/2006 version)</td>
            </tr>
            <tr>
                <td>Hardware Platform</td>
                <td>NHL Stenden - Emmen</td>
            </tr>
            <tr>
                <td>CPU Model</td>
                <td>Overthinking Processor&trade; (8 Tabs Minimum)</td>
            </tr>
            <tr>
                <td>CPU Layout</td>
                <td>1 Brain / 2 Hemispheres / 16 Unfinished Ideas</td>
            </tr>
            <tr>
                <td>Installed RAM</td>
                <td>Forgetfulness (64GB Theoretical)</td>
            </tr>
            <tr>
                <td>Virtualization</td>
                <td>Overthinking Final Boss</td>
            </tr>
            <tr>
                <td>Network Mode</td>
                <td>Socially Awkward (Publicly Available)</td>
            </tr>
            <tr>
                <td>Module</td>
                <td>ProcrastinationModule</td>
            </tr>
            <tr>
                <td>Module Application</td>
                <td>Existential Dread and Misery</td>
            </tr>
            <tr>
                <td>Loaded Plugins</td>
                <td>Overanalysis, LateNightBrowsing, RandomFactGenerator, UnnecessarySarcasm, DarkHumor, SelfAwareHumor</td>
            </tr>
            <tr>
                <td>Application Name</td>
                <td>Simulation of Life</td>
            </tr>
            <tr>
                <td>Application Version</td>
                <td>Beta (ongoing changes)</td>
            </tr>
            <tr>
                <td>Codename</td>
                <td>Muppet</td>
            </tr>
            <tr>
                <td>Build Spec</td>
                <td>Human, (mostly functional)</td>
            </tr>
            <tr>
                <td>Last Executable</td>
                <td>/bedroom/justin.exe</td>
            </tr>
            <tr>
                <td>Last Arguments</td>
                <td>"Can't be asked"</td>
            </tr>
            <tr>
                <td>Last Process ID</td>
                <td>2027WillBeMyYear</td>
            </tr>
        </table>
    </div>
</body>
</html>