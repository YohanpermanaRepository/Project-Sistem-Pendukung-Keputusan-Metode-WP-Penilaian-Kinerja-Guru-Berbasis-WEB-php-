<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=belajar", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi atau query bermasalah: " . $e->getMessage();
    exit;
}

?>
