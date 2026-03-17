<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator kredytowy</title>

    <link href="<?= _APP_URL ?>/assets/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="<?= _APP_URL ?>/index.php">Kalkulator kredytowy</a>

    <div class="ms-auto me-3">
        <?php if (!empty($role)): ?>
            <span class="badge bg-primary"><?= htmlspecialchars($role) ?></span>
        <?php endif; ?>

        <a class="btn btn-outline-light btn-sm ms-2" href="<?= _APP_URL ?>/app/security/logout.php">
            Wyloguj
        </a>
    </div>
</nav>

<div id="layoutSidenav">

    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= _APP_URL ?>/index.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-calculator"></i></div>
                        Kalkulator
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4 mt-4">