<?php
$pageTitle = 'Contact Us';
$activePage = 'contact';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // In production: send email with mail() or PHPMailer
        $success = true;
    }
}
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
            --primary: #0a1628; --accent: #00d4ff; --accent2: #7b61ff; --highlight: #00ffc8;
            --surface: #0f2040; --surface2: #162a4a; --text: #e8f0fe; --text-muted: #8ba3c7;
            --border: rgba(0,212,255,0.15); --card-bg: rgba(15,32,64,0.85);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--primary); color: var(--text); }
        h1,h2,h3,h4,h5 { font-family: 'Syne', sans-serif; }

        .navbar {
            background: rgba(10,22,40,0.97); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border); padding: 0.9rem 0;
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
        }
        .navbar-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 1.2rem; color: var(--text) !important; display: flex; align-items: center; gap: 10px; }
        .brand-icon { width: 38px; height: 38px; background: linear-gradient(135deg, var(--accent), var(--accent2)); border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .nav-link { color: var(--text-muted) !important; font-weight: 500; font-size: 0.9rem; transition: color 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--text) !important; }
        .btn-nav-login { background: linear-gradient(135deg, var(--accent), var(--accent2)); border: none; color: var(--primary) !important; font-weight: 700; padding: 0.45rem 1.4rem !important; border-radius: 25px; font-size: 0.88rem; }
        .navbar-toggler { border: 1px solid var(--border); }
        .navbar-toggler-icon { filter: invert(1); }

        .page-hero {
            padding: 140px 0 80px;
            background: linear-gradient(180deg, #060e1f 0%, #0a1628 100%);
        }
        .page-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(0,212,255,0.08); border: 1px solid rgba(0,212,255,0.25);
            color: var(--accent); padding: 0.4rem 1rem; border-radius: 50px;
            font-size: 0.82rem; font-weight: 600; margin-bottom: 1.5rem;
        }
        .page-title { font-size: clamp(2.2rem, 4vw, 3.5rem); font-weight: 800; color: #fff; margin-bottom: 1rem; }
        .page-subtitle { color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; font-weight: 300; }

        /* Form Section */
        .contact-section { padding: 80px 0; background: var(--surface); }

        .contact-form-card {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 20px; padding: 2.5rem;
        }

        .form-label { color: var(--text-muted); font-size: 0.88rem; font-weight: 500; margin-bottom: 6px; }
        .form-control, .form-select {
            background: var(--surface2); border: 1px solid var(--border);
            color: var(--text); border-radius: 10px; padding: 0.75rem 1rem;
            font-family: 'DM Sans', sans-serif; font-size: 0.92rem; transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            background: var(--surface2); border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(0,212,255,0.1); color: var(--text);
        }
        .form-control::placeholder { color: rgba(139,163,199,0.5); }
        .form-select option { background: var(--surface2); color: var(--text); }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: none; color: #fff; font-weight: 700; padding: 0.9rem 2rem;
            border-radius: 10px; font-size: 0.95rem; transition: all 0.3s; width: 100%;
            font-family: 'DM Sans', sans-serif; cursor: pointer;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0,212,255,0.3); }

        .alert-success-custom {
            background: rgba(0,255,200,0.1); border: 1px solid rgba(0,255,200,0.3);
            color: var(--highlight); border-radius: 12px; padding: 1rem 1.25rem;
        }
        .alert-error-custom {
            background: rgba(255,100,100,0.1); border: 1px solid rgba(255,100,100,0.3);
            color: #ff8080; border-radius: 12px; padding: 1rem 1.25rem;
        }

        /* Info cards */
        .contact-info-card {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 16px; padding: 1.5rem; margin-bottom: 16px;
            display: flex; align-items: flex-start; gap: 16px; transition: all 0.3s;
        }
        .contact-info-card:hover { border-color: rgba(0,212,255,0.3); }
        .contact-info-icon {
            width: 46px; height: 46px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; font-size: 1.1rem;
        }
        .contact-info-card h6 { color: #fff; font-weight: 700; font-size: 0.9rem; margin-bottom: 4px; }
        .contact-info-card p { color: var(--text-muted); font-size: 0.88rem; margin: 0; line-height: 1.5; }

        /* Map placeholder */
        .map-placeholder {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: 16px; overflow: hidden; margin-top: 20px; height: 220px;
            display: flex; align-items: center; justify-content: center;
            flex-direction: column; gap: 12px;
        }
        .map-placeholder i { font-size: 2.5rem; color: var(--accent); opacity: 0.5; }
        .map-placeholder p { color: var(--text-muted); font-size: 0.88rem; }

        footer { background: #060e1f; border-top: 1px solid var(--border); padding: 40px 0 20px; text-align: center; color: var(--text-muted); font-size: 0.88rem; }
        footer a { color: var(--accent); text-decoration: none; }

        .reveal { opacity: 0; transform: translateY(25px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.15s; }
    </style>
</head>
<body>

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
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#robots">AI Robots</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                <li class="nav-item ms-2"><a class="nav-link btn-nav-login" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-hero">
    <div class="container">
        <div class="page-badge"><i class="fas fa-envelope"></i> Get In Touch</div>
        <h1 class="page-title">Contact Us</h1>
        <p class="page-subtitle">Have a question about the system? Reach out to the project team at Mount Kenya University.</p>
    </div>
</div>

<section class="contact-section">
    <div class="container">
        <div class="row g-5">
            <!-- FORM -->
            <div class="col-lg-7 reveal">
                <div class="contact-form-card">
                    <h4 style="color:#fff;font-weight:700;margin-bottom:0.5rem;">Send a Message</h4>
                    <p style="color:var(--text-muted);font-size:0.9rem;margin-bottom:1.5rem;">Fill out the form and we'll get back to you shortly.</p>

                    <?php if ($success): ?>
                    <div class="alert-success-custom mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Message sent successfully!</strong> Thank you, we'll respond soon.
                    </div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                    <div class="alert-error-custom mb-4">
                        <i class="fas fa-exclamation-triangle me-2"></i> <?= htmlspecialchars($error) ?>
                    </div>
                    <?php endif; ?>

                    <form method="POST" action="contact.php" id="contactForm" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span style="color:#ff6b6b">*</span></label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Your full name"
                                    value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span style="color:#ff6b6b">*</span></label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="your@email.com"
                                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control"
                                    placeholder="+254 700 000 000"
                                    value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <select name="subject" class="form-select">
                                    <option value="">Select a subject</option>
                                    <option value="demo">System Demo Request</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="project">Project Collaboration</option>
                                    <option value="academic">Academic Inquiry</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message <span style="color:#ff6b6b">*</span></label>
                                <textarea name="message" class="form-control" rows="5"
                                    placeholder="Write your message here..."
                                    required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- CONTACT INFO -->
            <div class="col-lg-5 reveal reveal-delay-1">
                <h4 style="color:#fff;font-weight:700;margin-bottom:1.5rem;">Contact Information</h4>

                <div class="contact-info-card">
                    <div class="contact-info-icon" style="background:rgba(0,212,255,0.1);color:var(--accent);">
                        <i class="fas fa-university"></i>
                    </div>
                    <div>
                        <h6>Institution</h6>
                        <p>Mount Kenya University<br>School of Computing and Informatics<br>Department of Information Technology</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon" style="background:rgba(123,97,255,0.1);color:var(--accent2);">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6>Location</h6>
                        <p>Thika Road, Nairobi, Kenya<br>P.O. Box 342-01000 Thika</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon" style="background:rgba(0,255,200,0.1);color:var(--highlight);">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6>Email</h6>
                        <p>info@warehouse-system.co.ke<br>abdiweli.abdi@mku.ac.ke</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon" style="background:rgba(255,193,7,0.1);color:#ffc107;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h6>Phone</h6>
                        <p>+254 700 000 000<br>Mon – Fri, 8:00 AM – 5:00 PM EAT</p>
                    </div>
                </div>

                <!-- Map Placeholder -->
                <div class="map-placeholder">
                    <i class="fas fa-map"></i>
                    <p>Mount Kenya University, Nairobi Campus<br>
                    <span style="font-size:0.78rem;color:rgba(139,163,199,0.5)">Interactive map — embed Google Maps iframe in production</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> AI Warehouse Management System | Mount Kenya University</p>
        <p class="mt-2"><a href="index.php">Home</a> &nbsp;|&nbsp; <a href="about.php">About</a> &nbsp;|&nbsp; <a href="login.php">Login</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const observer = new IntersectionObserver(entries => entries.forEach(el => {
        if (el.isIntersecting) el.target.classList.add('visible');
    }), { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Client-side validation
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        const name = this.querySelector('[name="name"]').value.trim();
        const email = this.querySelector('[name="email"]').value.trim();
        const message = this.querySelector('[name="message"]').value.trim();
        if (!name || !email || !message) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
</script>
</body>
</html>
