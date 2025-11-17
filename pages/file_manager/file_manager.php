<?php
    $currentPage = "file_manager.php";
    $customPageTitle = "File Manager";
    
    require_once '../../components/layout.php';
    $faviconPath = $relativePrefix . "assets/sidebar/file_manager.png";

    // base directory where files are stored
    $baseDir = 'display';
    
    // folder path from URL
    $requestedPath = isset($_GET['path']) ? $_GET['path'] : '';
    
    // just in case someone tries to be funny and goes up my directories
    $requestedPath = str_replace(['..', "\0"], '', $requestedPath);
    
    // combine base with requested paths to make an absolute one
    $currentDir = realpath($baseDir . '/' . $requestedPath);
    

    $items = [];
    
    if (is_dir($currentDir)) {
        $files = scandir($currentDir);
        
        foreach ($files as $file) {
            // disable current directory (.) and parent directory (..)
            if ($file === '.' || $file === '..')
            {
                continue;
            }

            $fullPath = $currentDir . '/' . $file;
            $isDir = is_dir($fullPath);
            
            $items[] = [
                'name' => $file,                                                 // file/folder name
                'type' => $isDir ? 'directory' : 'file',                         // directory or file
                'size' => $isDir ? 0 : filesize($fullPath),                      // bytes size (directory = 0)
                'modified' => filemtime($fullPath),                              // last modified
                'path' => $requestedPath ? $requestedPath . '/' . $file : $file, // relative path for links
                'extension' => $isDir ? '' : pathinfo($file, PATHINFO_EXTENSION) // file extension (none if directory)
            ];
        }
    }

    $pathParts = array_filter(explode('/', $requestedPath));
    
    function formatFileSize($bytes) {
        if ($bytes == 0)
        {
            return '0 B';
        }
        
        $units = ['B', 'KB', 'MB', 'GB'];
        
        // calculate what unit to use
        $i = floor(log($bytes) / log(1024));
        
        // convert bytes to unit and display 2 numbers after decimal
        return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
    }

    
    function getFileIcon($item, $relativePrefix) {
        if ($item['type'] === 'directory')
        {
            return $relativePrefix . 'assets/file_manager/folder.png';
        }
        
        $ext = strtolower($item['extension']);
        
        if (in_array($ext, ['pdf', 'doc', 'docx', 'txt']))
        {
            return $relativePrefix . 'assets/file_manager/files_text.png';
        }

        elseif (in_array($ext, ['ppt', 'pptx', 'zip', 'rar']))
        {
            return $relativePrefix . 'assets/file_manager/files_extra.png';
        }

        else
        {
            return $relativePrefix . 'assets/file_manager/files.png';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include '../../components/head_file_manager.php'; 
    ?>
</head>

<body>
    <?php
    renderHeader($customPageTitle);
    renderSidebar($navigation, $navigationLink, $navigationLogo, $currentPage, $versionName, $version, $buildDate, $versionLink, $relativePrefix);
    ?>

    <div class="herobox">
        <a href="file_manager.php" style="text-decoration: none; color: inherit;"><div class="pathSegment">/</div></a><?php
        // what the fuck is happening here

        $buildPath = '';
        $isFirst = true;
        
        foreach ($pathParts as $part) {
            // add current part to the new path
            $buildPath .= ($buildPath ? '/' : '') . $part;
            $class = $isFirst ? 'pathSegment2' : 'pathSegment';
            
            // change for next iteration (opposite)
            $isFirst = !$isFirst;
            echo '<a href="file_manager.php?path=' . urlencode($buildPath) . '" style="text-decoration: none; color: inherit; display: inline-block;"><div class="' . $class . '">' . htmlspecialchars($part) . '</div></a>';
        }
        ?>

        <div class="fileManagerContainer">
            <div class="fileManagerList">
                <?php foreach ($items as $index => $item): ?>
                <div class="fileManagerEntry" data-index="<?php echo $index; ?>" data-type="<?php echo $item['type']; ?>">
                    <?php if ($item['type'] === 'directory'): ?>
                        <a href="file_manager.php?path=<?php echo urlencode($item['path']); ?>" class="fileEntryLink">

                            <img src="<?php echo getFileIcon($item, $relativePrefix); ?>" alt="folder" class="fileEntryIcon">
                            
                            <!-- display folder info -->
                            <div class="fileEntryInfo">
                                <div class="fileEntryTitle">
                                    <p><?php echo $item['name']; ?></p>
                                </div>

                                <div class="fileEntrySubtitle">
                                    <p>Directory</p>
                                </div>
                            </div>
                        </a>
                    <?php else: ?>

                        <img src="<?php echo getFileIcon($item, $relativePrefix); ?>" alt="file" class="fileEntryIcon">
                        
                        <!-- display file info -->
                        <div class="fileEntryInfo">
                            <div class="fileEntryTitle">
                                <p><?php echo $item['name']; ?></p>
                            </div>
                            
                            <div class="fileEntrySubtitle">
                                <p>
                                    <?php echo formatFileSize($item['size']); ?> 
                                    Modified
                                    <?php echo date('d/m/Y H:i:s', $item['modified']); ?>
                                </p>
                            </div>
                        </div>
                        
                        <img src="<?php echo $relativePrefix; ?>assets/file_manager/three_dots.png" alt="options" class="fileEntryOptions">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="fileInfoPanel" id="fileInfoPanel">
                <div class="fileInfoContent">
                    <p class="fileInfoPlaceholder"></p>
                </div>
            </div>
        </div>
    </div>



    <!--- Get away from me Javascript -->
    <!--- Get away from me Javascript -->
    <!--- Get away from me Javascript -->

    <script>
        const items = <?php echo json_encode($items); ?>;
        const relativePrefix = <?php echo json_encode($relativePrefix); ?>;
        const fileInfoPanel = document.getElementById('fileInfoPanel');
        let lastSelectedIndex = null;
        let currentContextMenu = null;
        
        const contextMenu = document.createElement('div');
        contextMenu.className = 'contextMenu';
        contextMenu.innerHTML = `
            <div class="contextMenuItem" data-action="download">
                <span>Download</span>
            </div>
            <div class="contextMenuItem" data-action="github">
                <span>Open with GitHub</span>
            </div>
        `;
        document.body.appendChild(contextMenu);
        
        window.addEventListener('DOMContentLoaded', () => {
            const savedSelection = sessionStorage.getItem('lastSelectedFile');
            if (savedSelection) {
                const savedData = JSON.parse(savedSelection);
                displayFileInfo(savedData);
            }
        });
        
        function displayFileInfo(fileData) {
            const formatFileSize = (bytes) => {
                if (bytes == 0) return '0 B';
                const units = ['B', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + units[i];
            };
            
            const formatDate = (timestamp) => {
                const date = new Date(timestamp * 1000);
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                const seconds = String(date.getSeconds()).padStart(2, '0');
                return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
            };
            
            fileInfoPanel.innerHTML = `
                <div class="fileInfoContent">
                    <div class="fileInfoHeader">
                        <img src="${fileData.iconSrc}" alt="file icon" class="fileInfoIcon">
                        <p class="fileInfoName">${fileData.name}</p>
                    </div>
                    <div class="fileInfoDetails">
                        <div class="fileInfoRow">
                            <span class="fileInfoLabel">Size</span>
                            <span class="fileInfoValue">${formatFileSize(fileData.size)}</span>
                        </div>
                        <div class="fileInfoRow">
                            <span class="fileInfoLabel">Last Modified</span>
                            <span class="fileInfoValue">${formatDate(fileData.modified)}</span>
                        </div>
                        <div class="fileInfoRow">
                            <span class="fileInfoLabel">Full Path</span>
                            <span class="fileInfoPath">${fileData.path}</span>
                        </div>
                    </div>
                </div>
            `;
        }
        
        document.querySelectorAll('.fileEntryOptions').forEach(optionsBtn => {
            optionsBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                
                const entry = optionsBtn.closest('.fileManagerEntry');
                const index = entry.dataset.index;
                const item = items[index];
                
                const rect = optionsBtn.getBoundingClientRect();
                contextMenu.style.left = `${rect.left}px`;
                contextMenu.style.top = `${rect.bottom + 5}px`;
                contextMenu.classList.add('active');
                
                currentContextMenu = item;
            });
        });
        
        contextMenu.addEventListener('click', (e) => {
            const menuItem = e.target.closest('.contextMenuItem');
            if (!menuItem || !currentContextMenu) return;
            
            const action = menuItem.dataset.action;
            
            if (action === 'download') {
                const downloadUrl = `display/${currentContextMenu.path}`;
                const a = document.createElement('a');
                a.href = downloadUrl;
                a.download = currentContextMenu.name;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            } else if (action === 'github') {
                const pathParts = currentContextMenu.path.split('/');
                const repoName = pathParts[0];
                const remainingPath = pathParts.slice(1).join('/');
                const encodedPath = remainingPath.split('/').map(encodeURIComponent).join('/');
                
                const githubUrl = `https://github.com/JustinasLaunikonis/${repoName}/tree/main/${encodedPath}`;
                window.open(githubUrl, '_blank');
            }
            
            contextMenu.classList.remove('active');
        });

        document.addEventListener('click', (e) => {
            if (!contextMenu.contains(e.target) && !e.target.closest('.fileEntryOptions')) {
                contextMenu.classList.remove('active');
            }
        });
        
        document.querySelectorAll('.fileManagerEntry').forEach(entry => {
            entry.addEventListener('click', (e) => {
                if (entry.dataset.type === 'directory') return;
                
                if (e.target.closest('a')) return;
                if (e.target.closest('.fileEntryOptions')) return;
                
                const index = entry.dataset.index;
                const item = items[index];
                
                if (lastSelectedIndex === index) {
                    return;
                }
                
                lastSelectedIndex = index;
                
                document.querySelectorAll('.fileManagerEntry').forEach(e => e.classList.remove('selected'));
                entry.classList.add('selected');
                
                const iconSrc = entry.querySelector('.fileEntryIcon').src;
                
                const fileData = {
                    name: item.name,
                    size: item.size,
                    modified: item.modified,
                    path: item.path,
                    iconSrc: iconSrc
                };
                
                sessionStorage.setItem('lastSelectedFile', JSON.stringify(fileData));
                
                displayFileInfo(fileData);
            });
        });
    </script>
</body>
</html>