<?php
header('Content-Type: application/json');

$baseDir = 'display';
$response = ['success' => false, 'message' => ''];

$filePath = isset($_POST['path']) ? $_POST['path'] : '';
$filePath = str_replace(['..', "\0"], '', $filePath);
$fullPath = realpath($baseDir . '/' . $filePath);

if (!$fullPath || strpos($fullPath, realpath($baseDir)) !== 0) {
    $response['message'] = 'Invalid file path';
    echo json_encode($response);
    exit;
}

if (!file_exists($fullPath)) {
    $response['message'] = 'File does not exist';
    echo json_encode($response);
    exit;
}

if (unlink($fullPath)) {
    $response['success'] = true;
    $response['message'] = 'File deleted successfully';
} else {
    $response['message'] = 'Failed to delete file';
}

echo json_encode($response);
?>