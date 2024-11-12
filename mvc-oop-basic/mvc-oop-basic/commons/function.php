<?php

// Kết nối CSDL qua PDO


function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
// Thêm file
function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

// Xóa file
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// xoa section sau khi load trang
function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        // huy session sau khi da tai trang
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}
function uploadFileAlbum($file, $folderUpload, $key)
{
    // Define the file path with the folder and filename, including the timestamp for uniqueness
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    // Define source and destination paths
    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;  // Assuming PATH_ROOT is defined elsewhere in your code

    // Move the uploaded file to the desired location
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }

    // Return null if the file upload fails
    return null;
}
