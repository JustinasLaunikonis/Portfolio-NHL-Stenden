<?php
require_once 'config.php';

if(!isset($currentPage)){
    $currentPage = basename($_SERVER['PHP_SELF']);
}

$currentPageIndex = array_search(basename($currentPage), array_map('basename', $navigationLink));
$pageTitle = $navigation[$currentPageIndex];

function renderHeader($pageTitle){
    echo '<header>';
    echo '<h2 class="headerTitle">'.htmlspecialchars($pageTitle).'</h2>';
    echo '<h4 class="headerCaption">Justinas Launikonis</h4>';
    echo '</header>';
}

function renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate){
    echo '<aside class="sidebar"><nav>';
    echo '<img src="../assets/profile.jpg" alt="profile">';
    echo '<ul>';
    foreach($navigation as $i => $label){
        $link = $navigationLink[$i];
        $icon = $navigationLogo[$i];
        $alt  = strtolower(str_replace(' ', '_', $label));
        $selected = (basename($link) === basename($currentPage));

        if($selected){
            $icon = str_replace('.png', '_blue.png', $icon);
            echo '<li><a class="selected" href="'.$link.'"><img src="'.$icon.'" alt="'.$alt.'">'.$label.'</a></li>';
        } else {
            echo '<li><a href="'.$link.'"><img src="'.$icon.'" alt="'.$alt.'">'.$label.'</a></li>';
        }
    }
    echo '</ul></nav><div class="bottomText">';
    echo '<p>Portfolio Release "'.htmlspecialchars($versionName).'"</p>';
    echo '<div class="tiny">v'.htmlspecialchars($version).', built '.htmlspecialchars($buildDate).'</div>';
    echo '</div></aside>';
}
?>