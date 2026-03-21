<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">

<title>Logowanie</title>

<link href="<?= _APP_URL ?>/assets/css/styles.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

body{
background:#f5f7fb;
display:flex;
align-items:center;
justify-content:center;
height:100vh;
}

.login-card{
width:420px;
}

</style>

</head>

<body>

<div class="card shadow login-card">

<div class="card-header bg-dark text-white text-center">

<h4 class="mb-0">
<i class="bi bi-shield-lock me-2"></i>
Logowanie
</h4>

</div>

<div class="card-body">

<form action="<?= _APP_URL ?>/app/security/login.php" method="post">

<div class="mb-3">
<label class="form-label">Login</label>
<input type="text" name="login" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Hasło</label>
<input type="password" name="pass" class="form-control">
</div>

<?php if (!empty($messages)): ?>
<div class="alert alert-danger">

<?php foreach ($messages as $msg): ?>
<div><?= htmlspecialchars($msg) ?></div>
<?php endforeach; ?>

</div>
<?php endif; ?>

<button class="btn btn-primary w-100">

<i class="bi bi-box-arrow-in-right me-2"></i>
Zaloguj

</button>

</form>

<div class="text-center mt-3 small text-muted">

admin / admin  
user / user

</div>

</div>

</div>

</body>
</html>