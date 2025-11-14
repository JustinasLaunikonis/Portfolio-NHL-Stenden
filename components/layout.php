<?php
require_once __DIR__ . '/config.php';

if(!isset($currentPage)){
    $currentPage = basename($_SERVER['PHP_SELF']);
}

// calculate how deep in folder structure we are
if(!isset($depth)){
    $scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME']);
    $pagesPos = strpos($scriptPath, '/pages/');
    if($pagesPos !== false){
        $afterPages = substr($scriptPath, $pagesPos + 7); // +7 for '/pages/'
        
        //only count directories
        $dirPath = dirname($afterPages);
        $depth = ($dirPath === '.' || $dirPath === '') ? 1 : (substr_count($dirPath, '/') + 2);
    } else {
        $depth = 2; // default back
    }
}


$relativePrefix = str_repeat('../', $depth);

$currentPageIndex = array_search(basename($currentPage), array_map('basename', $navigationLink));
$pageTitle = ($currentPageIndex !== false) ? $navigation[$currentPageIndex] : '';

function renderHeader($pageTitle){
    echo '<header>';
    echo '<h2 class="headerTitle">'.htmlspecialchars($pageTitle).'</h2>';
    echo '<h4 class="headerCaption">Justinas Launikonis</h4>';
    echo '</header>';
}

function renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix){
    echo '<aside class="sidebar"><nav>';
    echo '<img src="'.$relativePrefix.'assets/profile.jpg" alt="profile">';
    echo '<ul>';
    foreach($navigation as $i => $label){
        $link = $relativePrefix . 'pages/' . $navigationLink[$i];
        $icon = $relativePrefix . 'assets/sidebar/' . basename($navigationLogo[$i]);
        $alt  = strtolower(str_replace(' ', '_', $label));
        $selected = (basename($navigationLink[$i]) === basename($currentPage));

        if($selected){
            $icon = str_replace('.png', '_blue.png', $icon);
            echo '<li><a class="selected" href="'.$link.'"><img src="'.$icon.'" alt="'.$alt.'">'.$label.'</a></li>';
        } else {
            echo '<li><a href="'.$link.'"><img src="'.$icon.'" alt="'.$alt.'">'.$label.'</a></li>';
        }
    }
    echo '</ul></nav><div class="bottomText">';
    echo '<a href="'.$versionLink.'" target="_blank" style="color: inherit; text-decoration: none;">';
    echo '<p>Portfolio Release "'.htmlspecialchars($versionName).'"</p>';
    echo '<div class="tiny">v'.htmlspecialchars($version).', built '.htmlspecialchars($buildDate).'</div>';
    echo '</a>';
    echo '</div></aside>';
}
?>