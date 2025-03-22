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
    <title><?php echo $translations['events-hero-title']; ?></title>
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

    <!-- Event Details Section -->
    <!-- Event Details Section -->
    <section id="event-details" class="event-details fade-in">
        <div class="container">
            <h2 id="event-title"></h2>
            <div class="event-details-content">
                <img id="event-image" src="" alt="Event Image">
                <div class="event-info">
                    <p><i class="fas fa-calendar-alt"></i><span id="event-date"></span></p>
                    <p><i class="fas fa-map-marker-alt"></i><span id="event-location"></span></p>
                    <p id="event-description"><?php echo $translations['details_events']; ?></p>
                    <a href="events.php" class="details-cta-button"><?php echo $translations['back_to_events']; ?></a>
                </div>
            </div>
        </div>
    </section>

    <script>

        // Pass translations to JavaScript
        const translations = <?php echo json_encode($translations); ?>;

        // Get event ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('id');

        // Event data (replace with actual data from a database or API)
        const events = [
            {
                id: 1,
                title: translations.event1_title,
                date: translations.event1_date,
                location: translations.event1_location,
                image: "assets/images/event1.png",
                description:translations.details_events1,
            },
            {
                id: 2,
                title: translations.event2_title,
                date: translations.event2_date,
                location: translations.event2_location,
                image: "assets/images/event2.png",
                description: translations.details_events2,

            },
            {
                id: 3,
                title: translations.event3_title,
                date: translations.event3_date,
                location: translations.event3_location,
                image: "assets/images/event3.png",
                description: translations.details_events3,
            },
            {
                id: 4,
                title: translations.event4_title,
                date: translations.event4_date,
                location: translations.event4_location,
                image: "assets/images/event4.png",
                description: translations.details_events4,
            },

            {
                id: 5,
                title: translations.event6_title,
                date: translations.event6_date,
                location: translations.event6_location,
                image: "assets/images/event10.png",
                description: translations.details_events6,
            },
            {
                id: 6,
                title: translations.event5_title,
                date: translations.event5_date,
                location: translations.event5_location,
                image: "assets/images/event9.png",
                description: translations.details_events5,
            },

            // Past Events
            {
                id: 7,
                title: translations.event7_title,
                date: translations.event7_date,
                location: translations.event7_location,
                image: "assets/images/event5.png",
                description: translations.details_events7,
            },
            {
                id: 8,
                title: translations.event8_title,
                date: translations.event8_date,
                location: translations.event8_location,
                image: "assets/images/event6.png",
                description: translations.details_events8,
            },
            {
                id: 9,
                title: translations.event9_title,
                date: translations.event9_date,
                location: translations.event9_location,
                image: "assets/images/event7.png",
                description: translations.details_events9
            },
            {
                id: 10,
                title: translations.event10_title,
                date: translations.event10_date,
                location: translations.event10_location,
                image: "assets/images/event8.png",
                description: translations.details_events10
            },
            {
                id: 11,
                title: translations.event11_title,
                date: translations.event11_date,
                location: translations.event11_location,
                image: "assets/images/event11.png",
                description: translations.details_events11
            },
            {
                id: 12,
                title: translations.event12_title,
                date: translations.event12_date,
                location: translations.event12_location,
                image: "assets/images/event12.png",
                description: translations.details_events12
            }
        ];

        // Find the event by ID
        const event = events.find(e => e.id == eventId);

        // Populate event details
        if (event) {
            document.getElementById('event-title').textContent = event.title;
            document.getElementById('event-date').textContent = event.date;
            document.getElementById('event-location').textContent = event.location;
            document.getElementById('event-image').src = event.image;
            document.getElementById('event-description').textContent = event.description;
        } else {
            document.getElementById('event-details').innerHTML = '<h2>Event Not Found</h2>';
        }

        // Scroll animations
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
                { threshold: 0.5 } // Trigger when 50% of the element is visible
            );

            elements.forEach((element) => {
                observer.observe(element);
            });
        };

        // Run the function when the page loads
        window.addEventListener('load', animateOnScroll);
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

    

    <script src="assets/js/script.js"></script>
</body>
</html>