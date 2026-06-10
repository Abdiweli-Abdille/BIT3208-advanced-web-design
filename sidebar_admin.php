<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="10" fill="url(#brandGrad)"/>
                <path d="M8 28L20 12L32 28H8Z" fill="white" opacity="0.9"/>
                <circle cx="20" cy="20" r="4" fill="#00D4AA"/>
                <defs>
                    <linearGradient id="brandGrad" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#1A3A5C"/>
                        <stop offset="1" stop-color="#0D2137"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="brand-text">
            <span class="brand-name">AI-WMS</span>
            <span class="brand-role">Admin Portal</span>
        </div>
    </div>

    <div class="sidebar-divider"></div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">MAIN</div>

        <a href="dashboard.php" class="nav-item <?= $current_page === 'dashboard' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
            </span>
            <span class="nav-label">Dashboard</span>
            <?php if ($current_page === 'dashboard'): ?>
            <span class="nav-active-dot"></span>
            <?php endif; ?>
        </a>

        <div class="nav-section-label">INVENTORY</div>

        <div class="nav-group">
            <div class="nav-item nav-parent <?= in_array($current_page, ['inventory','categories','stock_movement']) ? 'open active-parent' : '' ?>" onclick="toggleGroup(this)">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                    </svg>
                </span>
                <span class="nav-label">Inventory</span>
                <span class="nav-arrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </span>
            </div>
            <div class="nav-children <?= in_array($current_page, ['inventory','categories','stock_movement']) ? 'open' : '' ?>">
                <a href="inventory.php" class="nav-child <?= $current_page === 'inventory' ? 'active' : '' ?>">
                    <span class="child-dot"></span> Products
                </a>
                <a href="categories.php" class="nav-child <?= $current_page === 'categories' ? 'active' : '' ?>">
                    <span class="child-dot"></span> Categories
                </a>
                <a href="stock_movement.php" class="nav-child <?= $current_page === 'stock_movement' ? 'active' : '' ?>">
                    <span class="child-dot"></span> Stock Movement
                </a>
            </div>
        </div>

        <div class="nav-section-label">OPERATIONS</div>

        <div class="nav-group">
            <div class="nav-item nav-parent <?= in_array($current_page, ['orders','incoming_orders','outgoing_orders']) ? 'open active-parent' : '' ?>" onclick="toggleGroup(this)">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 01-8 0"/>
                    </svg>
                </span>
                <span class="nav-label">Orders</span>
                <span class="nav-arrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </span>
            </div>
            <div class="nav-children <?= in_array($current_page, ['orders','incoming_orders','outgoing_orders']) ? 'open' : '' ?>">
                <a href="incoming_orders.php" class="nav-child <?= $current_page === 'incoming_orders' ? 'active' : '' ?>">
                    <span class="child-dot"></span> Incoming Orders
                </a>
                <a href="outgoing_orders.php" class="nav-child <?= $current_page === 'outgoing_orders' ? 'active' : '' ?>">
                    <span class="child-dot"></span> Outgoing Orders
                </a>
            </div>
        </div>

        <a href="suppliers.php" class="nav-item <?= $current_page === 'suppliers' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>
            </span>
            <span class="nav-label">Suppliers</span>
        </a>

        <div class="nav-section-label">ANALYTICS</div>

        <a href="reports.php" class="nav-item <?= $current_page === 'reports' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6" y1="20" x2="6" y2="14"/>
                </svg>
            </span>
            <span class="nav-label">Reports</span>
        </a>

        <a href="invoices.php" class="nav-item <?= $current_page === 'invoices' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
                </svg>
            </span>
            <span class="nav-label">Invoices</span>
        </a>

        <a href="alerts.php" class="nav-item <?= $current_page === 'alerts' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>
                </svg>
            </span>
            <span class="nav-label">Alerts</span>
            <span class="nav-badge" id="alert-count">0</span>
        </a>

        <div class="nav-section-label">AI MODULES</div>

        <div class="nav-group">
            <div class="nav-item nav-parent <?= in_array($current_page, ['robots','inventory_robot','sales_robot','order_robot','monitoring_robot']) ? 'open active-parent' : '' ?>" onclick="toggleGroup(this)">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="2"/>
                        <path d="M12 7v4"/><line x1="8" y1="16" x2="8" y2="16"/><line x1="16" y1="16" x2="16" y2="16"/>
                    </svg>
                </span>
                <span class="nav-label">AI Robots</span>
                <span class="nav-badge ai-badge">AI</span>
                <span class="nav-arrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </span>
            </div>
            <div class="nav-children">
                <a href="inventory_robot.php" class="nav-child">
                    <span class="child-dot ai-dot"></span> Inventory Robot
                </a>
                <a href="sales_robot.php" class="nav-child">
                    <span class="child-dot ai-dot"></span> Sales Robot
                </a>
                <a href="order_robot.php" class="nav-child">
                    <span class="child-dot ai-dot"></span> Order Robot
                </a>
                <a href="monitoring_robot.php" class="nav-child">
                    <span class="child-dot ai-dot"></span> Monitoring Robot
                </a>
            </div>
        </div>

        <div class="nav-section-label">SYSTEM</div>

        <a href="users.php" class="nav-item <?= $current_page === 'users' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            <span class="nav-label">Users</span>
        </a>

        <a href="settings.php" class="nav-item <?= $current_page === 'settings' ? 'active' : '' ?>">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
                </svg>
            </span>
            <span class="nav-label">Settings</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="user-avatar">
                <?= strtoupper(substr($current_user['name'], 0, 1)) ?>
            </div>
            <div class="user-info">
                <span class="user-name"><?= htmlspecialchars($current_user['name']) ?></span>
                <span class="user-role">Administrator</span>
            </div>
            <a href="../logout.php" class="logout-btn" title="Logout">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
            </a>
        </div>
    </div>
</aside>
