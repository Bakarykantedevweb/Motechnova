<!doctype html>
<html lang="en">

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/landings/home-academy.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:05:55 GMT -->

<head>
    <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/dist/css/glightbox.min.css') }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Codescandy" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <!-- darkmode js -->
    <script src="{{ asset('assets/js/vendors/darkMode.js') }}"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />
    <title>Motechnova</title>
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



        /* Navbar Styling - Exact Match */
       

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
            font-size: 1rem;
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
            /* color: var(--dark-color); */
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

            .footer-links {
                justify-content: center;
            }
        }
    </style>
    @livewireStyles
</head>

<body class="bg-white">
    <!-- Page content -->
    @include('layouts.inc.frontend.nav')


    <!-- section -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    @include('layouts.inc.frontend.footer')

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>


    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tnsSlider.js') }}"></script>
    <script src="{{ asset('assets/libs/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/glight.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/chart.js') }}"></script>
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

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/landings/home-academy.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:06:46 GMT -->

</html>
