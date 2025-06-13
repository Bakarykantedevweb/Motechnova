{{-- @extends('layouts.frontend')
@section('content')
    @livewire('frontend.formation.detail-free',["formation" => $formation])
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeeksforGeeks Course - Introduction to JavaScript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --info-color: #0dcaf0;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --geeks-purple: #6f42c1;
            --sidebar-bg: #ffffff;
            --footer-bg: #1a2332;
            --border-color: #e9ecef;
            --text-muted: #6c757d;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.5;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling - Exact Match */
        .navbar {
            background-color: white !important;
            border-bottom: 1px solid #e9ecef;
            padding: 0.5rem 0;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark-color) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            color: var(--geeks-purple);
            margin-right: 0.5rem;
            font-size: 1.4rem;
        }

        .navbar-nav .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .search-input {
            width: 280px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            background-color: #f8f9fa;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            background-color: white;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            background: white;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .btn-icon:hover {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .profile-dropdown .btn {
            border: 1px solid #dee2e6;
            background: white;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
        }

        /* Sidebar Styling - Exact Match */
        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: calc(100vh - 76px);
            border-right: 1px solid #e9ecef;
            padding: 1.5rem 0;
            width: 100%;
        }

        .sidebar h6 {
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            padding: 0 1.5rem;
            color: var(--dark-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .chapter-item {
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--dark-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0;
            transition: background-color 0.2s ease;
        }

        .chapter-item:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }

        .chapter-item.active {
            background-color: var(--primary-color);
            color: white;
        }

        .chapter-item i {
            font-size: 0.75rem;
            transition: transform 0.2s ease;
            color: var(--secondary-color);
        }

        .lesson-item {
            padding: 0.5rem 2.5rem;
            font-size: 0.85rem;
            color: var(--primary-color);
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0;
            transition: background-color 0.2s ease;
        }

        .lesson-item:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }

        .lesson-item.active {
            background-color: rgba(13, 110, 253, 0.1);
            font-weight: 500;
        }

        .lesson-duration {
            font-size: 0.75rem;
            color: var(--secondary-color);
            font-weight: 400;
        }

        .play-icon {
            color: var(--primary-color);
            margin-right: 0.5rem;
            font-size: 0.7rem;
        }

        /* Main Content Area */
        .main-content {
            padding: 2rem;
            background-color: white;
            min-height: calc(100vh - 76px);
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            margin-bottom: 2rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Resources Section */
        .resources-section {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .resources-section h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
            font-size: 1.25rem;
        }

        .resources-section p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .resource-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            text-decoration: none;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }

        .resource-link:last-child {
            border-bottom: none;
        }

        .resource-link:hover {
            color: var(--primary-color);
            background-color: rgba(13, 110, 253, 0.05);
            margin: 0 -1rem;
            padding-left: 1rem;
            padding-right: 1rem;
            border-radius: 4px;
        }

        .resource-link i {
            margin-right: 0.75rem;
            width: 16px;
            font-size: 0.9rem;
        }

        /* Comments Section */
        .comments-section {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .comments-section h4 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-size: 1.25rem;
        }

        .comment-form textarea {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 1rem;
            font-size: 0.9rem;
            resize: vertical;
        }

        .comment-form textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .comment-form .btn {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .comment-item {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .comment-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .comment-author {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 0.9rem;
        }

        .comment-date {
            font-size: 0.8rem;
            color: var(--secondary-color);
        }

        .comment-text {
            margin-top: 0.75rem;
            color: var(--dark-color);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Footer Styling - Exact Match */
        .footer {
            background-color: var(--footer-bg);
            color: #8a9bb5;
            padding: 3rem 0 2rem;
        }

        .footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer a {
            color: #8a9bb5;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer a:hover {
            color: white;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .footer-logo i {
            font-size: 2rem;
            color: var(--geeks-purple);
            margin-right: 0.5rem;
        }

        .footer-logo span {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .footer p {
            font-size: 0.9rem;
            line-height: 1.6;
            color: #8a9bb5;
        }

        .language-selector {
            background-color: transparent;
            border: 1px solid #4a5568;
            color: #8a9bb5;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            margin-top: 1rem;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
        }

        .app-badges img {
            height: 40px;
            margin-right: 10px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 0.75rem;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            margin-top: 2rem;
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 0.85rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            font-size: 0.85rem;
        }

        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .back-to-top:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Alert Styling */
        .alert-info {
            background-color: #e7f3ff;
            border-color: #b8daff;
            color: #0c5460;
            border-radius: 6px;
            padding: 1rem;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 76px;
                width: 280px;
                z-index: 1000;
                transition: left 0.3s ease;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                padding: 1rem;
            }

            .sidebar-overlay {
                position: fixed;
                top: 76px;
                left: 0;
                width: 100%;
                height: calc(100vh - 76px);
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .search-input {
                width: 200px;
            }

            .navbar-nav {
                margin-top: 1rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }
        }

        .navbar-toggler-sidebar {
            border: none;
            padding: 0.25rem 0.5rem;
            background: transparent;
            color: var(--dark-color);
        }

        .navbar-toggler-sidebar:focus {
            box-shadow: none;
        }
    </style>
    @livewireStyles
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler-sidebar d-lg-none me-2" type="button">
                <i class="fas fa-bars"></i>
            </button>

            <a class="navbar-brand" href="#">
                <i class="fas fa-glasses"></i>Geeks
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Formations
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Web Development</a></li>
                            <li><a class="dropdown-item" href="#">Programming</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produits Digitaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Classements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">About</a></li>
                            <li><a class="dropdown-item" href="#">Contact</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-primary ms-2">Connexion</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Layout -->
   @livewire('frontend.formation.detail-free',["formation" => $formation])

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-logo">
                        <i class="fas fa-glasses"></i>
                        <span>Geeks</span>
                    </div>
                    <p class="mb-3">Nascetur nibh feugiat vulputate urna mauris tincidunt porttitor ultricies. Et dis
                        augue praesent congue.</p>
                    <div class="language-selector">
                        <i class="fas fa-globe me-2"></i>English
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">News and Blogs</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Investors</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Community</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help and Support</a></li>
                        <li><a href="#">Affiliate</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Geeks Business</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Teaching</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Become a teacher</a></li>
                        <li><a href="#">How to guide</a></li>
                        <li><a href="#">Documentation</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact</h5>
                    <p class="mb-2">Toll free: <strong>+1234 567 890</strong></p>
                    <p class="mb-2">Time: <strong>9AM to 8:PM IST</strong></p>
                    <p class="mb-4">Email: <strong>example@gmail.com</strong></p>

                    <div class="app-badges">
                        <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                            alt="Download on App Store">
                        <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png"
                            alt="Get it on Google Play">
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>© 2025 GeeksTheme. Powered Codescandy</p>
                <div class="footer-links">
                    <a href="#">Terms of use</a>
                    <a href="#">Cookies Settings</a>
                    <a href="#">Privacy policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.navbar-toggler-sidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                });
            }

            // Chapter arrow rotation
            const chapterItems = document.querySelectorAll('.chapter-item');
            chapterItems.forEach(item => {
                item.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    const target = this.getAttribute('data-bs-target');
                    const collapse = document.querySelector(target);

                    collapse.addEventListener('show.bs.collapse', function() {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    });

                    collapse.addEventListener('hide.bs.collapse', function() {
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    });
                });
            });

            // Lesson item click handling
            const lessonItems = document.querySelectorAll('.lesson-item');
            lessonItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all lessons
                    lessonItems.forEach(lesson => lesson.classList.remove('active'));
                    // Add active class to clicked lesson
                    this.classList.add('active');
                });
            });

            // Back to top functionality
            const backToTop = document.querySelector('.back-to-top');
            if (backToTop) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTop.style.display = 'flex';
                    } else {
                        backToTop.style.display = 'none';
                    }
                });

                backToTop.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
    @livewireScripts
</body>
</html>
