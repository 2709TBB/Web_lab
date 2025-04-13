<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $inputCaptcha = strtoupper(trim($_POST['captcha'] ?? ''));

    if ($inputCaptcha === ($_SESSION['captcha'] ?? '')) {
        $success = "Thông tin đã được lưu thành công!";
        file_put_contents("data_process.php", "Tên: $name\nEmail: $email\n", FILE_APPEND);
    } else {
        $error = "Captcha không đúng. Vui lòng thử lại.";
    }

    unset($_SESSION['captcha']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form với Captcha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Nhập thông tin</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" class="p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="captcha" class="form-label">Captcha:</label>
            <div class="d-flex align-items-center">
                <img src="captcha.php" alt="CAPTCHA" class="me-3">
                <input type="text" id="captcha" name="captcha" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Gửi thông tin</button>
    </form>
</div>

</body>
</html>