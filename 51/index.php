<?php
require_once 'connect.php';

// ดึงข้อมูลรายชื่อทั้งหมด โดยเรียงตาม student_number (นายตรัยรัตน์ เป็นเลขที่ 1)
$sql = "SELECT * FROM students ORDER BY student_number ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อนักเรียน ชั้น ม.6/8</title>
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
        .highlight-row { background-color: #d1e7dd !important; font-weight: 600; }
        .btn-github { background-color: #24292e; color: #fff; }
        .btn-github:hover { background-color: #000; color: #fff; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card p-4">
        <!-- Header & ปุ่ม GitHub -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h3 class="text-primary m-0">รายชื่อนักเรียน ชั้นมัธยมศึกษาปีที่ 6/8</h3>
            <a href="https://github.com/your-username/your-repository" target="_blank" class="btn btn-github d-inline-flex align-items-center gap-2">
                <i class="bi bi-github fs-5"></i> View on GitHub
            </a>
        </div>
        
        <table id="studentTable" class="table table-striped table-hover table-bordered" style="width:100%">
            <thead class="table-dark">
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
                <?php foreach ($students as $row): ?>
                    <tr class="<?= ($row['student_number'] == 1) ? 'highlight-row' : ''; ?>">
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

<!-- jQuery, Bootstrap & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#studentTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "pageLength": 10
        });
    });
</script>

</body>
</html>