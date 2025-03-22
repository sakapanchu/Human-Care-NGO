<?php
// Start the session
session_start();

// Define available languages
$availableLanguages = ['en', 'ta', 'si'];

// Get the selected language from the query parameter or session
$selectedLang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'en'; // Default to English

// Validate the selected language
if (!in_array($selectedLang, $availableLanguages)) {
    $selectedLang = 'en'; // Default to English if invalid
}

// Save the selected language in the session
$_SESSION['lang'] = $selectedLang;

// Load the translations for the selected language
$translations = require "languages/{$selectedLang}.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $translations['gallery_hero_title']; ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="#" class="logo">
                <img src="assets/images/logo.png" alt="NGO Logo">
            </a>

            <!-- Navigation Links -->
            <ul class="nav-links">
                <li><a href="index.php" class="active"><?php echo $translations['home']; ?></a></li>
                <li><a href="about.php"><?php echo $translations['about']; ?></a></li>
                <li><a href="events.php"><?php echo $translations['events']; ?></a></li>
                <li><a href="gallery.php"><?php echo $translations['gallery']; ?></a></li>
                <li><a href="volunteer.php"><?php echo $translations['volunteer']; ?></a></li>
                <li><a href="donation.php"><?php echo $translations['donation']; ?></a></li>
            </ul>

            <!-- Language Dropdown -->
            <div class="language-dropdown">
                <form action="" method="GET">
                    <select name="lang" id="language-selector" onchange="this.form.submit()">
                        <option value="en" <?php echo ($selectedLang === 'en') ? 'selected' : ''; ?>>English</option>
                        <option value="ta" <?php echo ($selectedLang === 'ta') ? 'selected' : ''; ?>>தமிழ்</option>
                        <option value="si" <?php echo ($selectedLang === 'si') ? 'selected' : ''; ?>>සිංහල</option>
                    </select>
                </form>
            </div>

            <!-- Dark/Light Mode Toggle -->
            <div class="theme-toggle" id="theme-toggle">
                <i class="fas fa-moon"></i> <!-- Default to dark mode icon -->
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gallery-hero">
        <div class="container">
            <h1><?php echo $translations['gallery_hero_title']; ?></h1>
            <p><?php echo $translations['gallery_hero_description']; ?></p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery fade-in">
        <div class="g_container">
            <div class="gallery-grid">
                <!-- Event 1 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=1'">
                    <img src="assets/images/event1.png" alt="Community Health Camp">
                    <h4><?php echo $translations['event1_title']; ?></h4>
                </div>
                <!-- Event 2 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=2'">
                    <img src="assets/images/event2.png" alt="Education Drive">
                    <h4><?php echo $translations['event2_title']; ?></h4>
                </div>
                <!-- Event 3 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=3'">
                    <img src="assets/images/event3.png" alt="Environmental Cleanup">
                    <h4><?php echo $translations['event3_title']; ?></h4>
                </div>
                <!-- Event 4 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=4'">
                    <img src="assets/images/event4.png" alt="Women Empowerment Workshop">
                    <h4><?php echo $translations['event4_title']; ?></h4>
                </div>
                <!-- Event 6 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=5'">
                    <img src="assets/images/event10.png" alt="Blood Donation Camp">
                    <h4><?php echo $translations['event6_title']; ?></h4>
                </div>
                <!-- Event 5 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=6'">
                    <img src="assets/images/event9.png" alt="Youth Leadership Summit">
                    <h4><?php echo $translations['event5_title']; ?></h4>
                </div>
                <!-- Event 7 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=7'">
                    <img src="assets/images/event5.png" alt="Medical Camp 2022">
                    <h4><?php echo $translations['event7_title']; ?></h4>
                </div>
                <!-- Event 8 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=8'">
                    <img src="assets/images/event6.png" alt="Back to School Drive 2022">
                    <h4><?php echo $translations['event8_title']; ?></h4>
                </div>
                <!-- Event 9 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=9'">
                    <img src="assets/images/event7.png" alt="Tree Plantation Drive 2021">
                    <h4><?php echo $translations['event9_title']; ?></h4>
                </div>
                <!-- Event 10 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=10'">
                    <img src="assets/images/event8.png" alt="Women's Skill Development Workshop 2021">
                    <h4><?php echo $translations['event10_title']; ?></h4>
                </div>
                <!-- Event 11 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=11'">
                    <img src="assets/images/event11.png" alt="Disaster Relief Camp 2020">
                    <h4><?php echo $translations['event11_title']; ?></h4>
                </div>
                <!-- Event 12 -->
                <div class="gallery-item" onclick="window.location.href='event-details.php?id=12'">
                    <img src="assets/images/event12.png" alt="Digital Literacy Workshop 2020">
                    <h4><?php echo $translations['event12_title']; ?></h4>
                </div>
            </div>
        </div>
    </section>
    

    <script>

        // Function to add animation class when element is in view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.fade-in');

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target); // Stop observing after animation
                        }
                    });
                },
                { threshold: 0.3 } // Trigger when 50% of the element is visible
            );

            elements.forEach((element) => {
                observer.observe(element);
            });
        };

        // Run the function when the page loads
        window.addEventListener('load', animateOnScroll);

        // Scroll animations
        const animateOnScrolls = () => {
            const elements = document.querySelectorAll('.gallery-item');

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target); // Stop observing after animation
                        }
                    });
                },
                { threshold: 0.5 } // Trigger when 50% of the element is visible
            );

            elements.forEach((element) => {
                observer.observe(element);
            });
        };

        // Run the function when the page loads
        window.addEventListener('load', animateOnScrolls);
    </script>

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-container">
            <div class="footer-content">
                <!-- Contact Info -->
                <div class="footer-section contact-info">
                    <h3><?php echo $translations['contact_us']; ?></h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Elm Street, Downtown, Cityville, 567890</li>
                        <li><i class="fas fa-phone"></i> +1234567890</li>
                        <li><i class="fas fa-envelope"></i> humancare@gmail.com</li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="footer-section quick-links">
                    <h3><?php echo $translations['quick_links']; ?></h3>
                    <ul>
                        <li><a href="index.php"><?php echo $translations['home']; ?></a></li>
                        <li><a href="about.php"><?php echo $translations['about']; ?></a></li>
                        <li><a href="events.php"><?php echo $translations['events']; ?></a></li>
                        <li><a href="gallery.php"><?php echo $translations['gallery']; ?></a></li>
                        <li><a href="volunteer.php"><?php echo $translations['volunteer']; ?></a></li>
                        <li><a href="donation.php"><?php echo $translations['donation']; ?></a></li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div class="footer-section social-media">
                    <h3><?php echo $translations['follow_us']; ?></h3>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>

                    <!-- Footer Description -->
                    <div class="footer-description">
                        <p><?php echo $translations['footer_description']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; 2025 Human Care. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>