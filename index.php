<?php
// index.php - Landing Page
$pageTitle = 'AI-Powered Warehouse Management System';
$activePage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> | Enterprise WMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0a1628;
            --accent:  #00d4ff;
            --accent2: #7b61ff;
            --highlight: #00ffc8;
            --surface: #0f2040;
            --surface2: #162a4a;
            --text: #e8f0fe;
            --text-muted: #8ba3c7;
            --border: rgba(0,212,255,0.15);
            --card-bg: rgba(15,32,64,0.85);
            --glow: 0 0 30px rgba(0,212,255,0.18);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--primary);
            color: var(--text);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 { font-family: 'Syne', sans-serif; }

        /* ========== NAVBAR ========== */
        .navbar {
            background: rgba(10,22,40,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0.9rem 0;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(10,22,40,0.99);
            box-shadow: 0 4px 30px rgba(0,0,0,0.4);
        }

        .navbar-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--text) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .brand-text span { color: var(--accent); }

        .nav-link {
            color: var(--text-muted) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            position: relative;
            transition: color 0.3s;
            letter-spacing: 0.3px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 50%; right: 50%;
            height: 2px;
            background: var(--accent);
            transition: all 0.3s;
            border-radius: 2px;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text) !important;
        }

        .nav-link:hover::after, .nav-link.active::after {
            left: 1rem; right: 1rem;
        }

        .btn-nav-login {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: none;
            color: var(--primary) !important;
            font-weight: 700;
            padding: 0.45rem 1.4rem !important;
            border-radius: 25px;
            font-size: 0.88rem;
            transition: all 0.3s;
        }

        .btn-nav-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,212,255,0.35);
            color: var(--primary) !important;
        }

        .navbar-toggler { border: 1px solid var(--border); }
        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* ========== HERO ========== */
        #hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 7rem 0 4rem;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 60% 40%, rgba(0,212,255,0.07) 0%, transparent 60%),
                radial-gradient(ellipse 60% 80% at 20% 80%, rgba(123,97,255,0.09) 0%, transparent 60%),
                linear-gradient(180deg, #060e1f 0%, #0a1628 50%, #0d1f3c 100%);
        }

        .grid-overlay {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0,212,255,0.08);
            border: 1px solid rgba(0,212,255,0.25);
            color: var(--accent);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
            animation: fadeInDown 0.6s ease both;
        }

        .pulse-dot {
            width: 8px; height: 8px;
            background: var(--highlight);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4.2rem);
            font-weight: 800;
            line-height: 1.1;
            color: #fff;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.7s ease 0.1s both;
        }

        .hero-title .gradient-text {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 560px;
            margin-bottom: 2.5rem;
            font-weight: 300;
            animation: fadeInUp 0.7s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fadeInUp 0.7s ease 0.3s both;
        }

        .btn-primary-hero {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: none;
            color: #fff;
            font-weight: 700;
            padding: 0.85rem 2rem;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0,212,255,0.3);
            color: #fff;
        }

        .btn-outline-hero {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text);
            font-weight: 600;
            padding: 0.85rem 2rem;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-outline-hero:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(0,212,255,0.05);
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
            flex-wrap: wrap;
            animation: fadeInUp 0.7s ease 0.4s both;
        }

        .hero-stat-item { text-align: left; }
        .hero-stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--accent);
            line-height: 1;
        }
        .hero-stat-label {
            font-size: 0.82rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .hero-visual {
            position: relative;
            animation: floatUp 0.8s ease 0.3s both;
        }

        .dashboard-preview {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.5), var(--glow);
        }

        .preview-header {
            background: var(--surface);
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid var(--border);
        }

        .preview-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
        }

        .preview-dot.red { background: #ff5f57; }
        .preview-dot.yellow { background: #febc2e; }
        .preview-dot.green { background: #28c840; }

        .preview-url {
            background: rgba(255,255,255,0.05);
            border-radius: 6px;
            padding: 4px 12px;
            font-size: 0.75rem;
            color: var(--text-muted);
            flex: 1;
            margin-left: 8px;
        }

        .preview-body {
            padding: 16px;
        }

        .preview-kpis {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-bottom: 12px;
        }

        .preview-kpi {
            background: var(--surface2);
            border-radius: 8px;
            padding: 10px;
            border: 1px solid var(--border);
        }

        .preview-kpi-value {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--accent);
        }

        .preview-kpi-label {
            font-size: 0.65rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .preview-charts {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 8px;
        }

        .preview-chart-box {
            background: var(--surface2);
            border-radius: 8px;
            padding: 10px;
            height: 100px;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .chart-line-mock {
            position: absolute;
            bottom: 10px; left: 10px; right: 10px;
        }

        .bar-mock {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 70px;
        }

        .bar-item {
            flex: 1;
            border-radius: 3px 3px 0 0;
            background: linear-gradient(to top, var(--accent), var(--accent2));
            opacity: 0.7;
        }

        .float-badge {
            position: absolute;
            background: linear-gradient(135deg, var(--highlight), var(--accent));
            color: var(--primary);
            font-weight: 700;
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .fb-top-right { top: -10px; right: -10px; }
        .fb-bottom-left { bottom: 20px; left: -20px; }

        /* ========== SECTIONS COMMON ========== */
        section { padding: 90px 0; }

        .section-label {
            display: inline-block;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.9rem, 3vw, 2.8rem);
            font-weight: 800;
            color: #fff;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1.05rem;
            line-height: 1.7;
            font-weight: 300;
        }

        /* ========== FEATURES SECTION ========== */
        #features {
            background: var(--surface);
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
            transition: all 0.35s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            transform: scaleX(0);
            transition: transform 0.35s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            border-color: rgba(0,212,255,0.35);
            box-shadow: var(--glow);
        }

        .feature-card:hover::before { transform: scaleX(1); }

        .feature-icon {
            width: 54px; height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.25rem;
        }

        .fi-1 { background: rgba(0,212,255,0.12); color: var(--accent); }
        .fi-2 { background: rgba(123,97,255,0.12); color: var(--accent2); }
        .fi-3 { background: rgba(0,255,200,0.12); color: var(--highlight); }
        .fi-4 { background: rgba(255,107,53,0.12); color: #ff6b35; }
        .fi-5 { background: rgba(255,193,7,0.12); color: #ffc107; }
        .fi-6 { background: rgba(40,200,128,0.12); color: #28c880; }

        .feature-card h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        /* ========== ROBOTS SECTION ========== */
        #robots {
            background: var(--primary);
            position: relative;
        }

        .robot-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.35s;
            position: relative;
            overflow: hidden;
        }

        .robot-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(0,212,255,0.05) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.35s;
        }

        .robot-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0,212,255,0.3);
            box-shadow: var(--glow);
        }

        .robot-card:hover::after { opacity: 1; }

        .robot-number {
            font-family: 'Syne', sans-serif;
            font-size: 4rem;
            font-weight: 800;
            color: rgba(0,212,255,0.08);
            position: absolute;
            top: -10px; right: 20px;
            line-height: 1;
        }

        .robot-icon-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 1.25rem;
        }

        .robot-icon {
            width: 52px; height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            background: linear-gradient(135deg, rgba(0,212,255,0.15), rgba(123,97,255,0.15));
            border: 1px solid var(--border);
        }

        .robot-card h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.6rem;
        }

        .robot-card p {
            color: var(--text-muted);
            font-size: 0.88rem;
            line-height: 1.6;
        }

        .robot-tag {
            display: inline-block;
            background: rgba(0,212,255,0.1);
            border: 1px solid rgba(0,212,255,0.2);
            color: var(--accent);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            margin-top: 1rem;
        }

        /* ========== BENEFITS SECTION ========== */
        #benefits {
            background: var(--surface);
        }

        .benefit-item {
            text-align: center;
            padding: 2rem 1rem;
        }

        .benefit-number {
            font-family: 'Syne', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .benefit-label {
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .benefit-desc {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .divider-vertical {
            width: 1px;
            background: var(--border);
            margin: auto;
        }

        /* ========== DASHBOARD PREVIEW SECTION ========== */
        #dashboard-preview {
            background: var(--primary);
        }

        .big-preview-wrap {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.4);
        }

        .big-preview-header {
            background: var(--surface);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid var(--border);
        }

        .big-preview-body {
            padding: 20px;
        }

        .big-kpi-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .big-kpi-card {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
        }

        .big-kpi-label {
            font-size: 0.72rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .big-kpi-value {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            margin: 4px 0;
        }

        .big-kpi-change {
            font-size: 0.75rem;
            color: var(--highlight);
        }

        .big-charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 12px;
        }

        .big-chart-box {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .chart-title {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* SVG chart mock */
        .chart-svg { width: 100%; height: 120px; }

        /* ========== USE CASES SECTION ========== */
        #usecases { background: var(--surface); }

        .usecase-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.35s;
        }

        .usecase-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0,212,255,0.3);
            box-shadow: var(--glow);
        }

        .usecase-icon {
            font-size: 2.5rem;
            margin-bottom: 1.25rem;
            display: block;
        }

        .usecase-card h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.75rem;
        }

        .usecase-card p {
            color: var(--text-muted);
            font-size: 0.88rem;
            line-height: 1.6;
            margin: 0;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: linear-gradient(135deg, rgba(0,212,255,0.08), rgba(123,97,255,0.08));
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 70px 0;
        }

        .cta-section h2 {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            color: #fff;
            margin-bottom: 1rem;
        }

        /* ========== FOOTER ========== */
        footer {
            background: var(--primary);
            border-top: 1px solid var(--border);
            padding: 60px 0 30px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .footer-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            max-width: 280px;
        }

        .footer-heading {
            font-family: 'Syne', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.2rem;
        }

        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 0.6rem; }
        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--accent); }

        .footer-contact p {
            color: var(--text-muted);
            font-size: 0.88rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .footer-contact i { color: var(--accent); margin-top: 3px; flex-shrink: 0; }

        .social-links { display: flex; gap: 10px; margin-top: 1rem; }
        .social-link {
            width: 36px; height: 36px;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s;
        }
        .social-link:hover {
            background: rgba(0,212,255,0.1);
            border-color: var(--accent);
            color: var(--accent);
        }

        .footer-bottom {
            border-top: 1px solid var(--border);
            margin-top: 3rem;
            padding-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-bottom p {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin: 0;
        }

        .footer-bottom a {
            color: var(--accent);
            text-decoration: none;
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes floatUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        .animate-float { animation: float 4s ease-in-out infinite; }

        /* Scroll animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger delays */
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        @media (max-width: 768px) {
            .hero-stats { gap: 1.5rem; }
            .preview-kpis { grid-template-columns: repeat(2, 1fr); }
            .big-kpi-grid { grid-template-columns: repeat(2, 1fr); }
            .big-charts-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <div class="brand-icon">
                <i class="fas fa-warehouse" style="color:#fff;"></i>
            </div>
            <div class="brand-text">AI<span>WMS</span></div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="#robots">AI Robots</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item ms-2">
                    <a class="nav-link btn-nav-login" href="login.php">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ========== HERO ========== -->
<section id="hero">
    <div class="hero-bg"></div>
    <div class="grid-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-badge">
                    <div class="pulse-dot"></div>
                    AI-Powered Enterprise Solution
                </div>
                <h1 class="hero-title">
                    Intelligent<br>
                    <span class="gradient-text">Warehouse</span><br>
                    Management System
                </h1>
                <p class="hero-subtitle">
                    Transform your warehouse operations with real-time AI analytics, predictive demand forecasting, and intelligent robot modules — all in one unified platform.
                </p>
                <div class="hero-buttons">
                    <a href="login.php" class="btn-primary-hero">
                        <i class="fas fa-rocket"></i> Access System
                    </a>
                    <a href="#features" class="btn-outline-hero">
                        <i class="fas fa-play-circle"></i> Learn More
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat-item">
                        <div class="hero-stat-value">30+</div>
                        <div class="hero-stat-label">Products Tracked</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-value">4</div>
                        <div class="hero-stat-label">AI Robot Modules</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-value">99%</div>
                        <div class="hero-stat-label">Uptime Reliability</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-visual animate-float">
                    <div class="dashboard-preview">
                        <div class="preview-header">
                            <div class="preview-dot red"></div>
                            <div class="preview-dot yellow"></div>
                            <div class="preview-dot green"></div>
                            <div class="preview-url">warehouse-system/admin/dashboard</div>
                        </div>
                        <div class="preview-body">
                            <div class="preview-kpis">
                                <div class="preview-kpi">
                                    <div class="preview-kpi-value">847</div>
                                    <div class="preview-kpi-label">Total Products</div>
                                </div>
                                <div class="preview-kpi">
                                    <div class="preview-kpi-value" style="color:var(--highlight)">KSh 2.4M</div>
                                    <div class="preview-kpi-label">Stock Value</div>
                                </div>
                                <div class="preview-kpi">
                                    <div class="preview-kpi-value" style="color:#ffc107">12</div>
                                    <div class="preview-kpi-label">Low Stock</div>
                                </div>
                                <div class="preview-kpi">
                                    <div class="preview-kpi-value" style="color:var(--accent2)">38</div>
                                    <div class="preview-kpi-label">Orders</div>
                                </div>
                            </div>
                            <div class="preview-charts">
                                <div class="preview-chart-box">
                                    <div style="font-size:0.6rem;color:var(--text-muted);margin-bottom:6px;">Stock Movement Trend</div>
                                    <svg viewBox="0 0 200 60" class="chart-svg" style="height:60px;">
                                        <polyline points="10,50 30,35 50,40 70,20 90,28 110,15 130,22 150,12 170,18 190,8"
                                            fill="none" stroke="url(#lineGrad)" stroke-width="2" stroke-linecap="round"/>
                                        <defs>
                                            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#00d4ff"/>
                                                <stop offset="100%" style="stop-color:#7b61ff"/>
                                            </linearGradient>
                                        </defs>
                                        <polygon points="10,50 30,35 50,40 70,20 90,28 110,15 130,22 150,12 170,18 190,8 190,60 10,60"
                                            fill="url(#areaGrad)" opacity="0.3"/>
                                        <defs>
                                            <linearGradient id="areaGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                                <stop offset="0%" style="stop-color:#00d4ff;stop-opacity:0.5"/>
                                                <stop offset="100%" style="stop-color:#00d4ff;stop-opacity:0"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="preview-chart-box">
                                    <div style="font-size:0.6rem;color:var(--text-muted);margin-bottom:6px;">Categories</div>
                                    <div class="bar-mock">
                                        <div class="bar-item" style="height:80%"></div>
                                        <div class="bar-item" style="height:55%"></div>
                                        <div class="bar-item" style="height:70%"></div>
                                        <div class="bar-item" style="height:40%"></div>
                                        <div class="bar-item" style="height:65%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="float-badge fb-top-right">
                        <i class="fas fa-robot me-1"></i> AI Active
                    </div>
                    <div class="float-badge fb-bottom-left" style="background:rgba(123,97,255,0.9);color:#fff;">
                        <i class="fas fa-bell me-1"></i> 3 Alerts
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FEATURES ========== -->
<section id="features">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <span class="section-label">Platform Features</span>
                <h2 class="section-title">Everything you need to manage your warehouse</h2>
            </div>
            <div class="col-lg-6">
                <p class="section-desc mt-3 mt-lg-4">
                    A comprehensive set of tools built for modern warehouse operations — from real-time tracking to AI-powered analytics and automated reporting.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon fi-1"><i class="fas fa-boxes-stacked"></i></div>
                    <h5>Real-Time Inventory Tracking</h5>
                    <p>Monitor stock levels across all locations with live updates on stock-in, stock-out, and adjustments. Never face stockouts again.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="feature-card">
                    <div class="feature-icon fi-2"><i class="fas fa-robot"></i></div>
                    <h5>Intelligent Robot Analytics</h5>
                    <p>Four specialized AI robot modules handle inventory forecasting, sales analysis, order management, and anomaly detection.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="feature-card">
                    <div class="feature-icon fi-3"><i class="fas fa-brain"></i></div>
                    <h5>Automated Reorder Prediction</h5>
                    <p>Moving average algorithms predict when to reorder and how much — eliminating manual guesswork and reducing overstock costs.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="feature-card">
                    <div class="feature-icon fi-4"><i class="fas fa-shield-halved"></i></div>
                    <h5>Secure Role-Based Access</h5>
                    <p>Admin and Manager roles with different access permissions, CSRF protection, session management, and encrypted passwords.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="feature-card">
                    <div class="feature-icon fi-5"><i class="fas fa-file-invoice"></i></div>
                    <h5>Reporting & Invoice Management</h5>
                    <p>Generate, preview, and export professional invoices. Filter reports by date, category, and supplier with PDF/Excel export.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="feature-card">
                    <div class="feature-icon fi-6"><i class="fas fa-chart-line"></i></div>
                    <h5>Operational Performance Metrics</h5>
                    <p>BI-style dashboards with KPI cards, inventory turnover rates, fulfillment ratios, and trend charts powered by Chart.js.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== ROBOTS SECTION ========== -->
<section id="robots">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">AI Intelligence</span>
            <h2 class="section-title">Meet the Robot Modules</h2>
            <p class="section-desc mx-auto" style="max-width:580px;">
                Four AI-powered robots work continuously behind the scenes, analyzing data and providing actionable intelligence to optimize your warehouse operations.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 reveal">
                <div class="robot-card">
                    <div class="robot-number">01</div>
                    <div class="robot-icon-wrap">
                        <div class="robot-icon"><i class="fas fa-boxes" style="color:var(--accent)"></i></div>
                    </div>
                    <h4>Inventory Robot</h4>
                    <p>Uses moving average demand forecasting to predict optimal stock levels and automatically generate reorder suggestions before shortages occur.</p>
                    <span class="robot-tag">Demand Forecasting</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal reveal-delay-1">
                <div class="robot-card">
                    <div class="robot-number">02</div>
                    <div class="robot-icon-wrap">
                        <div class="robot-icon"><i class="fas fa-chart-bar" style="color:var(--accent2)"></i></div>
                    </div>
                    <h4>Sales Robot</h4>
                    <p>Identifies fast-moving products, analyzes sales velocity trends, and provides category-level performance insights to drive smarter procurement.</p>
                    <span class="robot-tag" style="border-color:rgba(123,97,255,0.3);color:var(--accent2);background:rgba(123,97,255,0.1)">Sales Analytics</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal reveal-delay-2">
                <div class="robot-card">
                    <div class="robot-number">03</div>
                    <div class="robot-icon-wrap">
                        <div class="robot-icon"><i class="fas fa-truck" style="color:var(--highlight)"></i></div>
                    </div>
                    <h4>Order Robot</h4>
                    <p>Monitors delivery times, detects order delays compared to historical averages, and flags suppliers with consistently poor lead times.</p>
                    <span class="robot-tag" style="border-color:rgba(0,255,200,0.3);color:var(--highlight);background:rgba(0,255,200,0.1)">Delivery Analysis</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal reveal-delay-3">
                <div class="robot-card">
                    <div class="robot-number">04</div>
                    <div class="robot-icon-wrap">
                        <div class="robot-icon"><i class="fas fa-shield-halved" style="color:#ffc107"></i></div>
                    </div>
                    <h4>Monitoring Robot</h4>
                    <p>Detects abnormal stock movements, unauthorized transactions, and unusual patterns. Generates critical alerts to keep your inventory secure.</p>
                    <span class="robot-tag" style="border-color:rgba(255,193,7,0.3);color:#ffc107;background:rgba(255,193,7,0.1)">Anomaly Detection</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== BENEFITS ========== -->
<section id="benefits">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">System Benefits</span>
            <h2 class="section-title">Measurable Results</h2>
        </div>
        <div class="row g-0">
            <div class="col-6 col-md-3 reveal">
                <div class="benefit-item border-end border-start" style="border-color:var(--border)!important">
                    <div class="benefit-number">40%</div>
                    <div class="benefit-label">Improved Efficiency</div>
                    <div class="benefit-desc">Reduction in manual processing time through automation</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal reveal-delay-1">
                <div class="benefit-item border-end" style="border-color:var(--border)!important">
                    <div class="benefit-number">95%</div>
                    <div class="benefit-label">Reduced Stock Loss</div>
                    <div class="benefit-desc">Accuracy in inventory records with real-time tracking</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal reveal-delay-2">
                <div class="benefit-item border-end" style="border-color:var(--border)!important">
                    <div class="benefit-number">3×</div>
                    <div class="benefit-label">Smarter Forecasting</div>
                    <div class="benefit-desc">Improvement in demand prediction versus manual estimates</div>
                </div>
            </div>
            <div class="col-6 col-md-3 reveal reveal-delay-3">
                <div class="benefit-item border-end" style="border-color:var(--border)!important">
                    <div class="benefit-number">24/7</div>
                    <div class="benefit-label">Data-Driven Decisions</div>
                    <div class="benefit-desc">Real-time intelligence always available to managers</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== DASHBOARD PREVIEW ========== -->
<section id="dashboard-preview">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 reveal">
                <span class="section-label">BI Dashboard</span>
                <h2 class="section-title">Enterprise-grade analytics at a glance</h2>
                <p class="section-desc">
                    The admin dashboard aggregates all warehouse data into clean, actionable visualizations — KPI cards, live charts, and alert summaries, all updated in real time.
                </p>
                <ul class="mt-3 ps-3" style="color:var(--text-muted);font-size:0.9rem;line-height:2;">
                    <li>8 real-time KPI cards</li>
                    <li>Stock In vs Out line chart</li>
                    <li>Category distribution pie chart</li>
                    <li>Top 10 products bar chart</li>
                    <li>Inventory trend analysis</li>
                </ul>
                <a href="login.php" class="btn-primary-hero mt-4 d-inline-flex">
                    <i class="fas fa-sign-in-alt"></i> Access System
                </a>
            </div>
            <div class="col-lg-7 reveal reveal-delay-2">
                <div class="big-preview-wrap">
                    <div class="big-preview-header">
                        <div class="preview-dot red"></div>
                        <div class="preview-dot yellow"></div>
                        <div class="preview-dot green"></div>
                        <div class="preview-url ms-2">Admin Dashboard — Real-Time Overview</div>
                    </div>
                    <div class="big-preview-body">
                        <div class="big-kpi-grid">
                            <div class="big-kpi-card">
                                <div class="big-kpi-label">Total Products</div>
                                <div class="big-kpi-value">30</div>
                                <div class="big-kpi-change">↑ Active items</div>
                            </div>
                            <div class="big-kpi-card">
                                <div class="big-kpi-label">Warehouse Value</div>
                                <div class="big-kpi-value" style="font-size:1.2rem">KSh 8.2M</div>
                                <div class="big-kpi-change">↑ +12% this month</div>
                            </div>
                            <div class="big-kpi-card">
                                <div class="big-kpi-label">Low Stock Items</div>
                                <div class="big-kpi-value" style="color:#ffc107">4</div>
                                <div class="big-kpi-change" style="color:#ffc107">⚠ Reorder needed</div>
                            </div>
                            <div class="big-kpi-card">
                                <div class="big-kpi-label">Pending Orders</div>
                                <div class="big-kpi-value" style="color:var(--accent2)">5</div>
                                <div class="big-kpi-change">Processing</div>
                            </div>
                        </div>
                        <div class="big-charts-grid">
                            <div class="big-chart-box">
                                <div class="chart-title">Stock In vs Stock Out — 6 Month Trend</div>
                                <svg viewBox="0 0 300 120" width="100%" height="100px">
                                    <!-- Stock In line (cyan) -->
                                    <polyline points="20,90 55,60 90,70 125,40 160,50 195,30 230,38 265,20 295,25"
                                        fill="none" stroke="#00d4ff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <!-- Stock Out line (purple) -->
                                    <polyline points="20,100 55,80 90,85 125,65 160,72 195,55 230,60 265,45 295,50"
                                        fill="none" stroke="#7b61ff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5,3"/>
                                    <!-- Month labels -->
                                    <text x="20" y="115" fill="#8ba3c7" font-size="8">Sep</text>
                                    <text x="55" y="115" fill="#8ba3c7" font-size="8">Oct</text>
                                    <text x="90" y="115" fill="#8ba3c7" font-size="8">Nov</text>
                                    <text x="125" y="115" fill="#8ba3c7" font-size="8">Dec</text>
                                    <text x="160" y="115" fill="#8ba3c7" font-size="8">Jan</text>
                                    <text x="195" y="115" fill="#8ba3c7" font-size="8">Feb</text>
                                </svg>
                                <div style="display:flex;gap:12px;margin-top:4px;">
                                    <span style="font-size:0.7rem;color:#00d4ff;"><span style="width:12px;height:2px;background:#00d4ff;display:inline-block;margin-right:4px;"></span>Stock In</span>
                                    <span style="font-size:0.7rem;color:#7b61ff;"><span style="width:12px;height:2px;background:#7b61ff;display:inline-block;margin-right:4px;"></span>Stock Out</span>
                                </div>
                            </div>
                            <div class="big-chart-box">
                                <div class="chart-title">Category Distribution</div>
                                <svg viewBox="0 0 100 100" width="80px" height="80px" style="display:block;margin:0 auto;">
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#0f2040" stroke-width="20"/>
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#00d4ff" stroke-width="20"
                                        stroke-dasharray="88 164" stroke-dashoffset="0"/>
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#7b61ff" stroke-width="20"
                                        stroke-dasharray="50 202" stroke-dashoffset="-88"/>
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#00ffc8" stroke-width="20"
                                        stroke-dasharray="30 222" stroke-dashoffset="-138"/>
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#ffc107" stroke-width="20"
                                        stroke-dasharray="34 218" stroke-dashoffset="-168"/>
                                </svg>
                                <div style="font-size:0.65rem;color:var(--text-muted);text-align:center;margin-top:4px;">10 Categories</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== USE CASES ========== -->
<section id="usecases">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Use Cases</span>
            <h2 class="section-title">Built for Modern Logistics</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="usecase-card">
                    <span class="usecase-icon">🏭</span>
                    <h5>Warehouse Operations</h5>
                    <p>Full-cycle inventory management — from goods receipt and put-away to picking, packing, and dispatch — with complete audit trails.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-delay-1">
                <div class="usecase-card">
                    <span class="usecase-icon">🚚</span>
                    <h5>Distribution Centers</h5>
                    <p>Manage multiple suppliers and outgoing orders simultaneously. Track delivery performance and flag delays before they impact customers.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-delay-2">
                <div class="usecase-card">
                    <span class="usecase-icon">🛒</span>
                    <h5>Retail Supply Chains</h5>
                    <p>Predict consumer demand, prevent overstock and stockouts, and generate professional invoices for every outgoing order.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA ========== -->
<div class="cta-section text-center">
    <div class="container">
        <h2 class="reveal">Ready to transform your warehouse?</h2>
        <p class="section-desc mx-auto mt-3 mb-4 reveal reveal-delay-1" style="max-width:500px;">
            Get started immediately with the demo system. Full admin and manager access included.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap reveal reveal-delay-2">
            <a href="login.php" class="btn-primary-hero">
                <i class="fas fa-sign-in-alt"></i> Login to System
            </a>
            <a href="about.php" class="btn-outline-hero">
                <i class="fas fa-info-circle"></i> Learn About This Project
            </a>
        </div>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand">
                    <div class="brand-icon"><i class="fas fa-warehouse" style="color:#fff;"></i></div>
                    <div class="brand-text" style="font-family:'Syne',sans-serif;font-weight:800;">AI<span style="color:var(--accent)">WMS</span></div>
                </div>
                <p class="footer-desc">
                    An AI-powered intelligent warehouse management system developed for Mount Kenya University, Department of Information Technology.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <p class="footer-heading">Navigation</p>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#robots">AI Robots</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <p class="footer-heading">System</p>
                <ul class="footer-links">
                    <li><a href="#">Admin Portal</a></li>
                    <li><a href="#">Manager Portal</a></li>
                    <li><a href="#">Robot Modules</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Invoicing</a></li>
                    <li><a href="#">Alerts</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <p class="footer-heading">Contact Information</p>
                <div class="footer-contact">
                    <p><i class="fas fa-university"></i> Mount Kenya University, School of Computing & Informatics</p>
                    <p><i class="fas fa-map-marker-alt"></i> Thika Road, Nairobi, Kenya</p>
                    <p><i class="fas fa-envelope"></i> info@warehouse-system.co.ke</p>
                    <p><i class="fas fa-phone"></i> +254 700 000 000</p>
                    <p><i class="fas fa-user-graduate"></i> Student: Abdiweli Abdille Abdi | BSCCS/2023/33779</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> AI Warehouse Management System. All rights reserved.</p>
            <p>Developed for <a href="#">Mount Kenya University</a> | BSc Computer Science Project</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll effect
    const navbar = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Scroll reveal animation
    const revealEls = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(el => {
            if (el.isIntersecting) {
                el.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    revealEls.forEach(el => observer.observe(el));

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
</body>
</html>
