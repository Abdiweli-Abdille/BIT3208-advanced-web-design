<?php
session_start();

// 1. Capture the role BEFORE destroying the session
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'staff'; 

// 2. Clear session
session_unset();
session_destroy();

// 3. Clear remember-me cookie
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

// 4. Conditional Redirection
if ($user_role === 'customer') {
    // Redirect customers to their specific folder
    header('Location: http://localhost/ai_warehouse_system/customer/login.php?logged_out=1');
} else {
    // Redirect admins and managers to the default login
    header('Location: login.php?logged_out=1');
}

exit();
?>