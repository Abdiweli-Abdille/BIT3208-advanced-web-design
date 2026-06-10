<?php
require_once dirname(__DIR__) . '/config/constants.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header('Location: ' . BASE_URL . 'login.php');
    exit();
}

// Session timeout check
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > SESSION_TIMEOUT) {
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . 'login.php?timeout=1');
    exit();
}
$_SESSION['last_activity'] = time();

// Role-based access: pass $required_role before including this file
if (isset($required_role) && $_SESSION['role'] !== $required_role) {
    header('Location: ' . BASE_URL . 'login.php?unauthorized=1');
    exit();
}

$current_user = [
    'id'    => $_SESSION['user_id'],
    'name'  => $_SESSION['user_name'] ?? 'User',
    'email' => $_SESSION['user_email'] ?? '',
    'role'  => $_SESSION['role'],
];
?>
