<?php
if (!isset($page_title)) $page_title = 'Dashboard';
if (!isset($page_subtitle)) $page_subtitle = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?> | AI-WMS Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- Admin Theme CSS -->
    <link rel="stylesheet" href="../assets/css/admin-theme.css">

    <?php if (isset($extra_css)) echo $extra_css; ?>
</head>
<body>
<div class="app-wrapper">
    <?php include dirname(__FILE__) . '/sidebar_admin.php'; ?>

    <div class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <header class="topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
                <div class="page-breadcrumb">
                    <span class="breadcrumb-home">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </span>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-current"><?= htmlspecialchars($page_title) ?></span>
                    <?php if ($page_subtitle): ?>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-sub"><?= htmlspecialchars($page_subtitle) ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="topbar-right">
                <div class="topbar-time" id="topbarTime"></div>

                <div class="topbar-icon-btn" onclick="location.href='alerts.php'" title="Alerts">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>
                    </svg>
                    <span class="icon-badge" id="header-alert-badge"></span>
                </div>

                <div class="topbar-divider"></div>

                <div class="topbar-profile dropdown">
                    <button class="profile-btn dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="profile-avatar"><?= strtoupper(substr($current_user['name'], 0, 1)) ?></div>
                        <div class="profile-info">
                            <span class="profile-name"><?= htmlspecialchars($current_user['name']) ?></span>
                            <span class="profile-role">Administrator</span>
                        </div>
                        <svg class="profile-caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end profile-dropdown">
                        <li><a class="dropdown-item" href="settings.php">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><circle cx="12" cy="12" r="3"/></svg>
                            Settings
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="../logout.php">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                                <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                            </svg>
                            Sign Out
                        </a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Page Content Area -->
        <div class="page-content">
