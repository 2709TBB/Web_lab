<?php
require_once 'data.php';

$gr = $_GET['gr'] ?? null;
$brand = $_GET['brand'] ?? null;

if ($gr && array_key_exists($gr, $data)) {
    if ($brand && array_key_exists($brand, $data[$gr])) {
        echo "<h2 class='text-center my-4'>Sản phẩm của $brand</h2>";
        echo "<div class='row'>";
        foreach ($data[$gr][$brand] as $product) {
            echo "
                <div class='col-md-4 mb-3'>
                    <div class='card text-center bg-primary text-white'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product</h5>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";
    } else {
        echo "<h2 class='text-center my-4'>Chọn thương hiệu để xem sản phẩm.</h2>";
    }
} else {
    echo "<h2 class='text-center my-4'>Nhóm sản phẩm không tồn tại.</h2>";
}
?>