<?php
require_once 'data.php';

$firstKey = array_key_first($data);
$gr = $_GET['gr'] ?? $firstKey;
if (!array_key_exists($gr, $data)) {
    header("Location: ?gr=$firstKey");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Listing</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        .banner { background-color: #333; color: #fff; padding: 20px; text-align: center; }
        .menu a { margin-right: 10px; }
        .footer { background-color: #333; color: white; text-align: center; padding: 10px; }
    </style>
</head>
<body>
    <div class="banner">
        <h1>Welcome to My Shop</h1>
    </div>
    <div class="menu text-center bg-dark py-2">
        <?php foreach (array_keys($data) as $category): ?>
            <a href="?gr=<?= $category ?>" class="btn btn-secondary"><?= ucfirst($category) ?></a>
        <?php endforeach; ?>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <?php include '1menu.php'; ?>
            </div>
            <div class="col-md-9">
                <?php include 'content.php'; ?>
            </div>
        </div>
    </div>
    <div class="footer mt-4">
        <p>&copy; 2025 My Shop</p>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>