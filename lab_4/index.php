<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Table</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Xóa</th>
                    <th>STT</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Quê quán</th>
                    <th>Trình độ</th>
                    <th>Hệ số lương</th>
                </tr>
            </thead>
            <tbody id="data-table">
                <?php
                
                $data = [
                    ["Nguyễn Văn", "A", "Hà Nội", "Đại học", 3.5],
                    ["Trần Thị", "B", "Sài Gòn", "Cao đẳng", 2.8],
                    ["Lê Văn", "C", "Đà Nẵng", "Trung cấp", 2.2],
                ];

                
                foreach ($data as $index => $item) {
                    echo "<tr id='row-{$index}'>";
                    echo "<td><button class='btn btn-danger btn-sm' onclick='deleteRow({$index})'>Xóa</button></td>";
                    echo "<td>" . ($index + 1) . "</td>";
                    echo "<td>{$item[0]}</td>"; // Họ
                    echo "<td>{$item[1]}</td>"; // Tên
                    echo "<td>{$item[2]}</td>"; // Quê quán
                    echo "<td>{$item[3]}</td>"; // Trình độ
                    echo "<td>{$item[4]}</td>"; // Hệ số lương
                    echo "</tr>";
                }
    ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteRow(index) {
            const row = document.getElementById(`row-${index}`);
            if (row) {
                row.remove();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>