<?php
require_once 'connect.php';

$sql = "SELECT * FROM students WHERE first_name = :first_name";
$stmt = $conn->prepare($sql);
$stmt->execute([':first_name' => 'ตรัยรัตน์']);
$my_info = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมในชั้นเรียนที่ 5 - แสดงข้อมูลตนเอง</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Prompt Font -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Prompt', sans-serif; background-color: #f8f9fa; }
        .card { border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .btn-github { background-color: #24292e; color: #fff; }
        .btn-github:hover { background-color: #000; color: #fff; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h3 class="text-success m-0">กิจกรรมในชั้นเรียนที่ 5 (ข้อมูลนักเรียนเฉพาะบุคคล)</h3>
            <a href="https://github.com/sunpao2020/act5/tree/main/51/52" target="_blank" class="btn btn-github d-inline-flex align-items-center gap-2">
                <i class="bi bi-github fs-5"></i> View Source Code
            </a>
        </div>
        
        <table id="myTable" class="table table-bordered table-striped" style="width:100%">
            <thead class="table-success">
                <tr>
                    <th class="text-center">เลขที่</th>
                    <th class="text-center">รหัสประจำตัว</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th class="text-center">ชั้น/ห้อง</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($my_info as $row): ?>
                    <tr>
                        <td class="text-center"><?= htmlspecialchars($row['student_number']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['student_id']); ?></td>
                        <td><?= htmlspecialchars($row['prefix']); ?></td>
                        <td><?= htmlspecialchars($row['first_name']); ?></td>
                        <td><?= htmlspecialchars($row['last_name']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['class_room']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "paging": false,
            "searching": false,
            "info": false
        });
    });
</script>

</body>
</html>
