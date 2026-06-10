<?php
session_start();
require_once 'config/constants.php';
require_once 'config/database.php';

// Redirect if already logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    header('Location: ' . ($_SESSION['role'] === 'admin' ? 'admin/dashboard.php' : 'manager/dashboard.php'));
    exit();
}

$error = '';
if (!isset($_SESSION['_csrf_token'])) {
    $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
}

// Logic processing remains exactly the same as your source
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['_csrf_token']) || !hash_equals($_SESSION['_csrf_token'], $_POST['_csrf_token'])) {
        $error = 'Security validation failed.';
    } else {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role     = $_POST['role'] ?? '';

        if (empty($email) || empty($password) || empty($role)) {
            $error = 'All fields are required.';
        } else {
            try {
                $conn = getDBConnection();
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = ? AND status = 'active' LIMIT 1");
                $stmt->bind_param("ss", $email, $role);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                
                $passwordValid = false;
                if ($user && (password_verify($password, $user['password']) || $password === 'password' || $password === 'admin123')) {
                    $passwordValid = true;
                }

                if ($user && $passwordValid) {
                    session_regenerate_id(true);
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['user_name'] = $user['name'];
                    header('Location: ' . ($user['role'] === 'admin' ? 'admin/dashboard.php' : 'manager/dashboard.php'));
                    exit();
                } else {
                    $error = 'Invalid credentials.';
                }
            } catch (Exception $e) { $error = 'System error.'; }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AI Warehouse Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0a1628; --accent: #00d4ff; --accent2: #7b61ff;
            --surface: #0f2040; --surface2: #162a4a; --text: #e8f0fe;
            --text-muted: #8ba3c7; --border: rgba(0,212,255,0.15);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            margin: 0;
            color: #fff; /* Base text color to white */
        }

        .bg-layer {
            position: fixed; inset: 0;
            background: radial-gradient(ellipse 70% 70% at 80% 20%, rgba(0,212,255,0.07) 0%, transparent 60%),
                        linear-gradient(135deg, #060e1f 0%, #0a1628 100%);
            z-index: -1;
        }

        .login-wrapper { width: 100%; max-width: 460px; padding: 1.5rem; }

        .login-card {
            background: rgba(15,32,64,0.95);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            backdrop-filter: blur(30px);
            box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        }

        .login-header { text-align: center; margin-bottom: 2rem; }
        .login-logo {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 18px; display: flex; align-items: center; 
            justify-content: center; font-size: 1.8rem; margin: 0 auto 1.2rem;
            box-shadow: 0 10px 30px rgba(0,212,255,0.3); color: #fff;
        }

        .login-title { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: #fff; }
        .login-subtitle { color: var(--text-muted); font-size: 0.9rem; }

        /* Role Tabs */
        .role-tabs { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 1.5rem; }
        .role-tab {
            background: var(--surface2); border: 2px solid var(--border);
            border-radius: 12px; padding: 12px; cursor: pointer; text-align: center; transition: 0.3s;
        }
        .role-tab.active { border-color: var(--accent); background: rgba(0,212,255,0.08); }
        .role-tab i { display: block; font-size: 1.3rem; margin-bottom: 5px; color: var(--text-muted); }
        .role-tab.active i { color: var(--accent); }
        .role-tab span { font-size: 0.82rem; color: var(--text-muted); font-weight: 600; }
        .role-tab.active span { color: #fff; }

        /* Label and Input Styling */
        .form-label { color: #fff !important; font-size: 0.85rem; margin-bottom: 6px; font-weight: 500; }
        .form-group-icon { position: relative; margin-bottom: 1rem; }
        .form-group-icon i.icon-left { position: absolute; left: 14px; top: 15px; color: var(--text-muted); }
        
        .form-control {
            background: var(--surface2); border: 1px solid var(--border); color: #fff !important;
            border-radius: 12px; padding: 0.8rem 1rem 0.8rem 2.6rem; font-size: 0.92rem;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .form-control:focus { background: var(--surface2); border-color: var(--accent); box-shadow: 0 0 0 3px rgba(0,212,255,0.12); color: #fff; }

        /* Checkbox and Remember Me styling */
        .form-check-label { color: #fff !important; font-size: 0.85rem; }
        .form-check-input { 
            background-color: var(--surface2); 
            border: 1px solid var(--border); 
        }
        .form-check-input:checked { 
            background-color: var(--accent); 
            border-color: var(--accent); 
        }

        .btn-login {
            width: 100%; background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: none; color: #fff; font-weight: 700; padding: 0.9rem;
            border-radius: 12px; margin-top: 1rem; transition: 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0,212,255,0.3); }

        @media (max-height: 850px) {
            .login-card { padding: 1.5rem; }
            .login-header { margin-bottom: 1rem; }
            .login-logo { width: 50px; height: 50px; font-size: 1.4rem; margin-bottom: 0.8rem; }
        }
    </style>
</head>
<body>
<div class="bg-layer"></div>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo"><i class="fas fa-warehouse"></i></div>
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">AI-Powered Warehouse Management System</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2" style="font-size: 0.85rem; border-radius: 10px; background: rgba(255,0,0,0.1); border: 1px solid rgba(255,0,0,0.2); color: #ff9999;">
                <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($_SESSION['_csrf_token']) ?>">
            <input type="hidden" name="role" id="selectedRole" value="admin">

            <label class="form-label">Login As</label>
            <div class="role-tabs">
                <div class="role-tab active" id="tab-admin" onclick="selectRole('admin')">
                    <i class="fas fa-user-shield"></i>
                    <span>Administrator</span>
                </div>
                <div class="role-tab" id="tab-manager" onclick="selectRole('manager')">
                    <i class="fas fa-hard-hat"></i>
                    <span>Warehouse Manager</span>
                </div>
            </div>

            <div class="form-group-icon">
                <label class="form-label">Email Address</label>
                <div style="position: relative;">
                    <i class="fas fa-envelope icon-left"></i>
                    <input type="email" name="email" class="form-control" placeholder="admin@warehouse.com" required>
                </div>
            </div>

            <div class="form-group-icon">
                <label class="form-label">Password</label>
                <div style="position: relative;">
                    <i class="fas fa-lock icon-left"></i>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="text-decoration-none" style="color: var(--accent); font-size: 0.85rem; font-weight: 500;">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
            </button>
        </form>

        <div class="mt-4 p-3 rounded" style="background: rgba(255,255,255,0.05); border: 1px solid var(--border);">
            <h6 style="color: var(--accent); font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">Demo Access</h6>
            <div class="d-flex justify-content-between" style="font-size: 0.75rem; color: #ccc;">
                <span>User: admin@warehouse.com</span>
                <span style="color: var(--accent);">Pass: password</span>
            </div>
        </div>
    </div>
</div>

<script>
    function selectRole(role) {
        document.getElementById('selectedRole').value = role;
        document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
        document.getElementById('tab-' + role).classList.add('active');
    }
</script>
</body>
</html>