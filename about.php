<?php
$pageTitle = 'About Us';
$activePage = 'about';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> | AI Warehouse Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0a1628;
            --accent: #00d4ff;
            --accent2: #7b61ff;
            --highlight: #00ffc8;
            --surface: #0f2040;
            --surface2: #162a4a;
            --text: #e8f0fe;
            --text-muted: #8ba3c7;
            --border: rgba(0,212,255,0.15);
            --card-bg: rgba(15,32,64,0.85);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--primary); color: var(--text); }
        h1,h2,h3,h4,h5 { font-family: 'Syne', sans-serif; }

        .navbar {
            background: rgba(10,22,40,0.97);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0.9rem 0;
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
        }
        .navbar-brand {
            font-family: 'Syne', sans-serif; font-weight: 800; font-size: 1.2rem;
            color: var(--text) !important; display: flex; align-items: center; gap: 10px;
        }
        .brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 10px; display: flex; align-items: center; justify-content: center;
        }
        .nav-link { color: var(--text-muted) !important; font-weight: 500; font-size: 0.9rem; transition: color 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--text) !important; }
        .btn-nav-login {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: none; color: var(--primary) !important; font-weight: 700;
            padding: 0.45rem 1.4rem !important; border-radius: 25px; font-size: 0.88rem;
        }
        .navbar-toggler { border: 1px solid var(--border); }
        .navbar-toggler-icon { filter: invert(1); }

        /* Page Hero */
        .page-hero {
            padding: 140px 0 80px;
            background: linear-gradient(180deg, #060e1f 0%, #0a1628 100%);
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            top: -50%; left: -20%;
            width: 60%; height: 200%;
            background: radial-gradient(ellipse, rgba(0,212,255,0.06) 0%, transparent 60%);
        }
        .page-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(0,212,255,0.08); border: 1px solid rgba(0,212,255,0.25);
            color: var(--accent); padding: 0.4rem 1rem; border-radius: 50px;
            font-size: 0.82rem; font-weight: 600; letter-spacing: 0.5px; margin-bottom: 1.5rem;
        }
        .page-title {
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            font-weight: 800; color: #fff; margin-bottom: 1rem;
        }
        .page-subtitle { color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; font-weight: 300; max-width: 600px; }

        /* Sections */
        section { padding: 80px 0; }
        .section-label {
            font-size: 0.78rem; font-weight: 700; letter-spacing: 2px;
            text-transform: uppercase; color: var(--accent); margin-bottom: 0.75rem; display: block;
        }
        .section-title { font-size: clamp(1.7rem, 3vw, 2.5rem); font-weight: 800; color: #fff; margin-bottom: 1rem; }
        .section-desc { color: var(--text-muted); font-size: 1rem; line-height: 1.7; font-weight: 300; }

        /* Cards */
        .info-card {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 16px; padding: 2rem; height: 100%; transition: all 0.35s;
        }
        .info-card:hover { border-color: rgba(0,212,255,0.3); box-shadow: 0 0 30px rgba(0,212,255,0.1); }
        .card-icon {
            width: 50px; height: 50px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; margin-bottom: 1.25rem;
        }

        /* Objectives list */
        .objective-list { list-style: none; padding: 0; }
        .objective-list li {
            display: flex; align-items: flex-start; gap: 12px;
            padding: 0.9rem 0; border-bottom: 1px solid var(--border); color: var(--text-muted); font-size: 0.95rem;
        }
        .objective-list li:last-child { border-bottom: none; }
        .objective-list li i { color: var(--highlight); flex-shrink: 0; margin-top: 3px; }

        /* Tech stack */
        .tech-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--surface2); border: 1px solid var(--border);
            border-radius: 10px; padding: 10px 16px; font-size: 0.88rem;
            font-weight: 600; color: var(--text); margin: 6px; transition: all 0.3s;
        }
        .tech-badge:hover { border-color: var(--accent); color: var(--accent); }
        .tech-badge i { font-size: 1rem; }

        /* Architecture diagram */
        .arch-layer {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 12px; padding: 1.2rem 1.5rem; margin-bottom: 8px;
            display: flex; align-items: center; gap: 14px; transition: border-color 0.3s;
        }
        .arch-layer:hover { border-color: rgba(0,212,255,0.3); }
        .arch-layer-icon {
            width: 42px; height: 42px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 1.1rem;
        }
        .arch-arrow {
            text-align: center; color: var(--accent); font-size: 1.2rem; margin: 4px 0;
        }

        /* Team card */
        .team-card {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 20px; padding: 2.5rem; text-align: center;
        }
        .team-avatar {
            width: 100px; height: 100px; border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem; margin: 0 auto 1.5rem; color: #fff; font-family: 'Syne', sans-serif; font-weight: 800;
        }
        .team-card h4 { font-size: 1.3rem; font-weight: 700; color: #fff; }
        .team-card .role { color: var(--accent); font-size: 0.9rem; font-weight: 600; }
        .team-card p { color: var(--text-muted); font-size: 0.9rem; margin-top: 0.75rem; }

        /* Footer */
        footer {
            background: #060e1f; border-top: 1px solid var(--border);
            padding: 40px 0 20px; text-align: center; color: var(--text-muted); font-size: 0.88rem;
        }
        footer a { color: var(--accent); text-decoration: none; }

        /* Reveal */
        .reveal { opacity: 0; transform: translateY(25px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <div class="brand-icon"><i class="fas fa-warehouse" style="color:#fff;"></i></div>
            <div style="font-family:'Syne',sans-serif;font-weight:800;">AI<span style="color:var(--accent)">WMS</span></div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#robots">AI Robots</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item ms-2"><a class="nav-link btn-nav-login" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="container">
        <div class="page-badge"><i class="fas fa-graduation-cap"></i> Academic Project — MKU</div>
        <h1 class="page-title">About This System</h1>
        <p class="page-subtitle">
            An AI-powered intelligent warehouse management system developed as a final year project for the Bachelor of Science in Computer Science at Mount Kenya University.
        </p>
    </div>
</div>

<!-- PROJECT BACKGROUND -->
<section style="background:var(--surface);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <span class="section-label">Project Background</span>
                <h2 class="section-title">Why this system was built</h2>
                <p class="section-desc">
                    Modern warehouses continue to suffer from manual, error-prone processes — inaccurate stock records, delayed order processing, and no means to predict future demand. This system was designed to address those gaps by leveraging AI-driven automation, predictive analytics, and a professional web-based interface.
                </p>
                <p class="section-desc mt-3">
                    The solution integrates moving-average forecasting, role-based access control, and real-time BI dashboards to deliver an enterprise-grade platform built entirely with open-source, PHP-based technologies — making it deployable on any standard XAMPP or LAMP server.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 reveal">
                        <div class="info-card text-center">
                            <div style="font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:var(--accent);">30+</div>
                            <div style="color:var(--text-muted);font-size:0.88rem;margin-top:6px;">Products in DB</div>
                        </div>
                    </div>
                    <div class="col-6 reveal reveal-delay-1">
                        <div class="info-card text-center">
                            <div style="font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:var(--accent2);">4</div>
                            <div style="color:var(--text-muted);font-size:0.88rem;margin-top:6px;">AI Robot Modules</div>
                        </div>
                    </div>
                    <div class="col-6 reveal reveal-delay-1">
                        <div class="info-card text-center">
                            <div style="font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:var(--highlight);">10</div>
                            <div style="color:var(--text-muted);font-size:0.88rem;margin-top:6px;">DB Tables</div>
                        </div>
                    </div>
                    <div class="col-6 reveal reveal-delay-2">
                        <div class="info-card text-center">
                            <div style="font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:#ffc107;">2</div>
                            <div style="color:var(--text-muted);font-size:0.88rem;margin-top:6px;">User Roles</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OBJECTIVES -->
<section>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 reveal">
                <span class="section-label">Objectives</span>
                <h2 class="section-title">What this system achieves</h2>
                <ul class="objective-list mt-4">
                    <li><i class="fas fa-check-circle"></i> Automate inventory tracking and reporting to eliminate manual errors</li>
                    <li><i class="fas fa-check-circle"></i> Implement AI-driven demand forecasting using moving average algorithms</li>
                    <li><i class="fas fa-check-circle"></i> Provide real-time BI dashboards with KPI cards and Chart.js visualizations</li>
                    <li><i class="fas fa-check-circle"></i> Enable role-based access control for Admin and Warehouse Manager</li>
                    <li><i class="fas fa-check-circle"></i> Generate, print, and export professional invoices and reports</li>
                    <li><i class="fas fa-check-circle"></i> Detect abnormal stock movements and trigger automated alerts</li>
                    <li><i class="fas fa-check-circle"></i> Deliver a production-ready system deployable on standard PHP servers</li>
                </ul>
            </div>
            <div class="col-lg-6 reveal reveal-delay-1">
                <span class="section-label">AI Simulation</span>
                <h2 class="section-title">How AI is simulated in PHP</h2>
                <p class="section-desc">
                    Since this is a web-based PHP system, AI is simulated through statistical logic rather than ML frameworks. Each robot module applies proven mathematical models directly to the MySQL database:
                </p>
                <div class="row g-3 mt-3">
                    <div class="col-12">
                        <div class="info-card" style="padding:1.2rem 1.5rem;">
                            <div style="font-weight:700;color:#fff;font-size:0.95rem;margin-bottom:6px;">📊 Moving Average (Inventory Robot)</div>
                            <div style="color:var(--text-muted);font-size:0.85rem;">Calculates 3-month and 6-month rolling averages of stock movements to project future demand and generate reorder suggestions.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-card" style="padding:1.2rem 1.5rem;">
                            <div style="font-weight:700;color:#fff;font-size:0.95rem;margin-bottom:6px;">📈 Velocity Analysis (Sales Robot)</div>
                            <div style="color:var(--text-muted);font-size:0.85rem;">Ranks products by outflow rate to identify fast and slow movers, with trend classification as Increasing, Stable, or Decreasing.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-card" style="padding:1.2rem 1.5rem;">
                            <div style="font-weight:700;color:#fff;font-size:0.95rem;margin-bottom:6px;">⏱ Delivery Baseline (Order Robot)</div>
                            <div style="color:var(--text-muted);font-size:0.85rem;">Computes historical average delivery times per supplier and flags any orders that exceed the baseline by more than 20%.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-card" style="padding:1.2rem 1.5rem;">
                            <div style="font-weight:700;color:#fff;font-size:0.95rem;margin-bottom:6px;">🔍 Anomaly Detection (Monitoring Robot)</div>
                            <div style="color:var(--text-muted);font-size:0.85rem;">Uses standard deviation analysis on movement data to detect statistically unusual inflow or outflow events and auto-generate alerts.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TECHNOLOGY STACK -->
<section style="background:var(--surface);">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">Technology Stack</span>
            <h2 class="section-title">Built With</h2>
            <p class="section-desc mx-auto" style="max-width:500px;">
                100% PHP-based stack. No Python. No external BI tools. Runs on any standard XAMPP/LAMP server.
            </p>
        </div>
        <div class="text-center reveal">
            <span class="tech-badge"><i class="fab fa-php" style="color:#8892be"></i> PHP 8.x</span>
            <span class="tech-badge"><i class="fas fa-database" style="color:#00758f"></i> MySQL</span>
            <span class="tech-badge"><i class="fab fa-html5" style="color:#e34f26"></i> HTML5</span>
            <span class="tech-badge"><i class="fab fa-css3-alt" style="color:#264de4"></i> CSS3</span>
            <span class="tech-badge"><i class="fab fa-js" style="color:#f7df1e"></i> JavaScript</span>
            <span class="tech-badge"><i class="fab fa-bootstrap" style="color:#7952b3"></i> Bootstrap 5</span>
            <span class="tech-badge"><i class="fas fa-exchange-alt" style="color:var(--accent)"></i> AJAX</span>
            <span class="tech-badge"><i class="fas fa-chart-bar" style="color:#ff6384"></i> Chart.js</span>
            <span class="tech-badge"><i class="fas fa-server" style="color:var(--highlight)"></i> XAMPP / Apache</span>
            <span class="tech-badge"><i class="fas fa-lock" style="color:#ffc107"></i> PDO Prepared Statements</span>
            <span class="tech-badge"><i class="fas fa-shield-halved" style="color:#28c880"></i> CSRF Protection</span>
            <span class="tech-badge"><i class="fas fa-key" style="color:var(--accent2)"></i> Bcrypt Password Hashing</span>
        </div>
    </div>
</section>

<!-- SYSTEM ARCHITECTURE -->
<section>
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 reveal">
                <span class="section-label">Architecture</span>
                <h2 class="section-title">Three-Tier Architecture</h2>
                <p class="section-desc">
                    The system follows a clean three-tier MVC-inspired architecture separating presentation, business logic, and data layers for maintainability and scalability.
                </p>
            </div>
            <div class="col-lg-7 reveal reveal-delay-1">
                <div class="arch-layer">
                    <div class="arch-layer-icon" style="background:rgba(0,212,255,0.12);color:var(--accent);"><i class="fas fa-globe"></i></div>
                    <div>
                        <div style="font-weight:700;color:#fff;font-size:0.95rem;">Presentation Layer</div>
                        <div style="color:var(--text-muted);font-size:0.85rem;">HTML5, CSS3, Bootstrap 5, JavaScript, Chart.js — Responsive UI for Admin & Manager</div>
                    </div>
                </div>
                <div class="arch-arrow"><i class="fas fa-arrow-down"></i></div>
                <div class="arch-layer">
                    <div class="arch-layer-icon" style="background:rgba(123,97,255,0.12);color:var(--accent2);"><i class="fab fa-php"></i></div>
                    <div>
                        <div style="font-weight:700;color:#fff;font-size:0.95rem;">Application Layer</div>
                        <div style="color:var(--text-muted);font-size:0.85rem;">PHP 8.x — Business logic, AJAX handlers, AI robot engine, session management, CSRF protection</div>
                    </div>
                </div>
                <div class="arch-arrow"><i class="fas fa-arrow-down"></i></div>
                <div class="arch-layer">
                    <div class="arch-layer-icon" style="background:rgba(0,255,200,0.12);color:var(--highlight);"><i class="fas fa-database"></i></div>
                    <div>
                        <div style="font-weight:700;color:#fff;font-size:0.95rem;">Data Layer</div>
                        <div style="color:var(--text-muted);font-size:0.85rem;">MySQL via PDO prepared statements — 10 normalized tables with sample data and foreign key constraints</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STUDENT CARD -->
<section style="background:var(--surface);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Developer</span>
            <h2 class="section-title">About the Student</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 reveal">
                <div class="team-card">
                    <div class="team-avatar">AA</div>
                    <h4>Abdiweli Abdille Abdi</h4>
                    <div class="role mt-1">BSc Computer Science Student</div>
                    <p>Admission No: BSCCS/2023/33779<br>Mount Kenya University<br>Semester: JAN/APR 2026</p>
                    <hr style="border-color:var(--border);margin:1.2rem 0;">
                    <div style="font-size:0.85rem;color:var(--text-muted);">
                        <i class="fas fa-user-tie me-2" style="color:var(--accent);"></i>Supervisor: Mr. Michael Nyoro
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> AI Warehouse Management System | Mount Kenya University | Abdiweli Abdille Abdi</p>
        <p class="mt-2"><a href="index.php">Home</a> &nbsp;|&nbsp; <a href="contact.php">Contact</a> &nbsp;|&nbsp; <a href="login.php">Login</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const observer = new IntersectionObserver(entries => entries.forEach(el => {
        if (el.isIntersecting) el.target.classList.add('visible');
    }), { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
</body>
</html>
