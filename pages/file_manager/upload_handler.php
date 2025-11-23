<?php
header('Content-Type: application/json');

$baseDir = 'display';
$response = ['success' => false, 'message' => ''];

// get directory from POST
$targetPath = isset($_POST['path']) ? $_POST['path'] : '';
$targetPath = str_replace(['..', "\0"], '', $targetPath);
$uploadDir = realpath($baseDir . '/' . $targetPath);

// check if directory exists
if (!$uploadDir || strpos($uploadDir, realpath($baseDir)) !== 0) {
    $response['message'] = 'Invalid upload directory';
    echo json_encode($response);
    exit;
}

if (!isset($_FILES['file'])) {
    $response['message'] = 'No file uploaded';
    echo json_encode($response);
    exit;
}

$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpPath = $file['tmp_name'];
$fileSize = $file['size'];

$fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
if (strlen($fileNameWithoutExt) > 50) {
    $response['message'] = 'File name must not exceed 50 characters';
    echo json_encode($response);
    exit;
}

if (!preg_match('/[A-Z]/', $fileNameWithoutExt)) {
    $response['message'] = 'File name must contain at least one uppercase letter';
    echo json_encode($response);
    exit;
}

$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$allowedExtensions = ['png', 'jpeg', 'jpg', 'gif'];

if (!in_array($fileExtension, $allowedExtensions)) {
    $response['message'] = 'Only .png, .jpeg, .jpg, and .gif files are allowed';
    echo json_encode($response);
    exit;
}

if ($fileSize > 3145728) {
    $response['message'] = 'File size must not exceed 3MB';
    echo json_encode($response);
    exit;
}

$imageInfo = getimagesize($fileTmpPath);
if ($imageInfo === false) {
    $response['message'] = 'File is not a valid image';
    echo json_encode($response);
    exit;
}

$destinationPath = $uploadDir . '/' . $fileName;

if (file_exists($destinationPath)) {
    $response['message'] = 'File already exists';
    echo json_encode($response);
    exit;
}

if (move_uploaded_file($fileTmpPath, $destinationPath)) {
    $response['success'] = true;
    $response['message'] = 'File uploaded successfully';
} else {
    $response['message'] = 'Failed to save file';
}

echo json_encode($response);
?>