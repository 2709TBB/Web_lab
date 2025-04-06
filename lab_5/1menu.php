<?php
require_once 'data.php';

$gr = $_GET['gr'] ?? null;
if ($gr && array_key_exists($gr, $data)) {
    echo "<ul class='list-group'>";
    foreach (array_keys($data[$gr]) as $brand) {
        echo "<li class='list-group-item'><a href='?gr=$gr&brand=$brand' class='text-decoration-none'>$brand</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>Chọn danh mục để xem menu.</p>";
}
?>