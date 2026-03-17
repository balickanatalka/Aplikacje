<?php
require_once dirname(__FILE__) . '/../../config.php';

function getLoginParams(&$form) {
    $form['login'] = $_POST['login'] ?? null;
    $form['pass']  = $_POST['pass'] ?? null;
}

function validateLogin(&$form, &$messages) {
    if (!isset($form['login']) && !isset($form['pass'])) {
        return false;
    }

    if ($form['login'] === '') {
        $messages[] = 'Nie podano loginu';
    }

    if ($form['pass'] === '') {
        $messages[] = 'Nie podano hasła';
    }

    if (!empty($messages)) {
        return false;
    }

    // przykładowe loginy
    if ($form['login'] === 'admin' && $form['pass'] === 'admin') {
        session_start();
        $_SESSION['role'] = 'admin';
        return true;
    }

    if ($form['login'] === 'user' && $form['pass'] === 'user') {
        session_start();
        $_SESSION['role'] = 'user';
        return true;
    }

    $messages[] = 'Niepoprawny login lub hasło';
    return false;
}

$form = [];
$messages = [];

getLoginParams($form);

if (!validateLogin($form, $messages)) {
    include _ROOT_PATH . '/app/security/login_view.php';
} else {
    header('Location: ' . _APP_URL);
    exit();
}