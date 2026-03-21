<?php
/* Smarty version 5.8.0, created on 2026-03-20 23:56:20
  from 'file:top.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69bdd0942f44e8_64639099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf685d50d67133e3aad742e2d8227186a16e67e8' => 
    array (
      0 => 'top.tpl',
      1 => 1774047314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69bdd0942f44e8_64639099 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\apCredit\\app\\templates\\smarty';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator kredytowy</title>

    <link href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php">Kalkulator kredytowy</a>

    <div class="ms-auto me-3">
        <?php if (!( !$_smarty_tpl->hasVariable('role') || empty($_smarty_tpl->getValue('role')))) {?>
            <span class="badge bg-primary"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('role'), ENT_QUOTES, 'UTF-8', true);?>
</span>
        <?php }?>

        <a class="btn btn-outline-light btn-sm ms-2" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/security/logout.php">
            Wyloguj
        </a>
    </div>
</nav>

<div id="layoutSidenav">

    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php">
                        <div class="sb-nav-link-icon"><i class="bi bi-calculator"></i></div>
                        Kalkulator
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4 mt-4"><?php }
}
