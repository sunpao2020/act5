<?php
$host = 'sql210.infinityfree.com';
$port = '3306';
$dbname = 'if0_42361374_std';
$username = 'if0_42361374';
$password = 'SunnyXD555';

try {
    // กำหนดการเชื่อมต่อแบบ PDO รองรับภาษาไทย (utf8mb4)
    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";
    $conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // แสดงข้อความความสำเร็จเมื่อเข้าหน้า connect.php โดยตรง
    if (basename($_SERVER['PHP_SELF']) == 'connect.php') {
        echo "<h2 style='color: green; font-family: sans-serif; padding: 20px;'>
                นายตรัยรัตน์ ประทีปคีรี เชื่อมต่อข้อมูลสำเร็จ Success
              </h2>";
    }
} catch (PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}
?>