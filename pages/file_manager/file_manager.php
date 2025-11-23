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
        <a href="file_manager.php" style="text-decoration: none; color: inherit;">
            <div class="pathSegment">/</div><!--
    --></a><!--
    --><?php

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

        <div class="uploadOverlay" id="uploadOverlay">
            <div class="uploadOverlayContent">
                <p>Drop to upload here</p>
            </div>
        </div>

        <div class="fileManagerContainer" id="fileManagerContainer">
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
        const currentPath = <?php echo json_encode($requestedPath); ?>;
        const fileInfoPanel = document.getElementById('fileInfoPanel');
        const fileManagerContainer = document.getElementById('fileManagerContainer');
        const uploadOverlay = document.getElementById('uploadOverlay');
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
            <div class="contextMenuItem" data-action="delete">
                <span>Delete</span>
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

        // ---- drag and drop upload ----
        let dragCounter = 0;
        
        function showUploadOverlay() {
            uploadOverlay.classList.add('active');
        }
        
        function hideUploadOverlay() {
            uploadOverlay.classList.remove('active');
        }
        
        fileManagerContainer.addEventListener('dragenter', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dragCounter++;
            showUploadOverlay();
        });
        
        fileManagerContainer.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dragCounter--;
            if (dragCounter === 0) {
                hideUploadOverlay();
            }
        });
        
        fileManagerContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
        
        fileManagerContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dragCounter = 0;
            hideUploadOverlay();
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                uploadFiles(files);
            }
        });
        
        function uploadFiles(files) {
            Array.from(files).forEach(file => {
                const fileName = file.name;
                const fileNameWithoutExt = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
                const fileExtension = fileName.split('.').pop().toLowerCase();
                const allowedExtensions = ['png', 'jpeg', 'jpg', 'gif'];
                
                if (fileNameWithoutExt.length > 50) {
                    alert(`"${fileName}": File name must not exceed 50 characters`);
                    return;
                }
                
                if (!/[A-Z]/.test(fileNameWithoutExt)) {
                    alert(`"${fileName}": File name must contain at least one uppercase letter`);
                    return;
                }
                
                if (!allowedExtensions.includes(fileExtension)) {
                    alert(`"${fileName}": Only .png, .jpeg, .jpg, and .gif files are allowed`);
                    return;
                }
                
                if (file.size > 3145728) {
                    alert(`"${fileName}": File size must not exceed 3MB`);
                    return;
                }
                
                const formData = new FormData();
                formData.append('file', file);
                formData.append('path', currentPath);
                
                fetch('upload_handler.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`"${fileName}" uploaded successfully!`);
                        window.location.reload();
                    } else {
                        alert(`Upload failed: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Upload error:', error);
                    alert('An error occurred during upload');
                });
            });
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
            } else if (action === 'delete') {
                if (confirm(`Are you sure you want to delete "${currentContextMenu.name}"? This action cannot be undone.`)) {
                    deleteFile(currentContextMenu.path, currentContextMenu.name);
                }
            }
            
            contextMenu.classList.remove('active');
        });

        function deleteFile(filePath, fileName) {
            const formData = new FormData();
            formData.append('path', filePath);
            
            fetch('delete_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`"${fileName}" deleted successfully!`);
                    //sessionStorage.removeItem('lastSelectedFile');
                    window.location.reload();
                } else {
                    alert(`Delete failed: ${data.message}`);
                }
            })
            .catch(error => {
                console.error('Delete error:', error);
                alert('An error occurred during deletion');
            });
        }
        
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