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
                    ["ho" => "Nguyễn Văn", "ten" => "A", "queQuan" => "Hà Nội", "trinhDo" => "Đại học", "heSoLuong" => 3.5],
                    ["ho" => "Trần Thị", "ten" => "B", "queQuan" => "Sài Gòn", "trinhDo" => "Cao đẳng", "heSoLuong" => 2.8],
                    ["ho" => "Lê Văn", "ten" => "C", "queQuan" => "Đà Nẵng", "trinhDo" => "Trung cấp", "heSoLuong" => 2.2],
                ];

                
                foreach ($data as $index => $item) {
                    echo "<tr id='row-{$index}'>";
                    echo "<td><button class='btn btn-danger btn-sm' onclick='deleteRow({$index})'>Xóa</button></td>";
                    echo "<td>" . ($index + 1) . "</td>";
                    echo "<td>{$item['ho']}</td>";
                    echo "<td>{$item['ten']}</td>";
                    echo "<td>{$item['queQuan']}</td>";
                    echo "<td>{$item['trinhDo']}</td>";
                    echo "<td>{$item['heSoLuong']}</td>";
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