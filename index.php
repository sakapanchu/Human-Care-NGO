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
    <title><?php echo $translations['welcome']; ?></title>
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

    <!-- Home Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1><?php echo $translations['welcome']; ?></h1>
            <p><?php echo $translations['welcome_description']; ?></p>
            <a href="donation.php" class="home-cta-button"><?php echo $translations['donate_now']; ?></a>
        </div>
    </section>

    <!-- Mission Statement -->
    <section id="mission" class="mission fade-in">
        <div class="container">
            <h2><?php echo $translations['our_mission']; ?></h2>
            <p><?php echo $translations['mission_description']; ?></p>
            <a href="about.php" class="read-more-btn"><?php echo $translations['read_more']; ?></a>
        </div>
    </section>

    <!-- Our Programs -->
    <section id="programs" class="programs fade-in">
        <div class="container">
            <h2><?php echo $translations['our_programs']; ?></h2>
            <div class="program-list">
                <div class="program-card">
                    <i class="fas fa-book"></i>
                    <h3><?php echo $translations['education_for_all']; ?></h3>
                    <p><?php echo $translations['education_description']; ?></p>
                </div>
                <div class="program-card">
                    <i class="fas fa-heartbeat"></i>
                    <h3><?php echo $translations['healthcare_initiatives']; ?></h3>
                    <p><?php echo $translations['healthcare_description']; ?></p>
                </div>
                <div class="program-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3><?php echo $translations['community_support']; ?></h3>
                    <p><?php echo $translations['community_description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Statistics -->
    <section id="impact" class="impact fade-in">
        <div class="container">
            <h2><?php echo $translations['our_impact']; ?></h2>
            <div class="impact-stats">
                <div class="stat">
                    <h3>10,000+</h3>
                    <p><?php echo $translations['children_educated']; ?></p>
                </div>
                <div class="stat">
                    <h3>50,000+</h3>
                    <p><?php echo $translations['lives_impacted']; ?></p>
                </div>
                <div class="stat">
                    <h3>100+</h3>
                    <p><?php echo $translations['communities_served']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="testimonials fade-in">
        <div class="container">
            <h2><?php echo $translations['what_people_say']; ?></h2>
            <div class="testimonial-list">
                <div class="testimonial-card">
                    <img src="assets/images/person1.png" alt="Ramesh" class="testimonial-image">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p><?php echo $translations['testimonial_1']; ?></p>
                    <h4>- Ramesh, Village Leader</h4>
                </div>
                <div class="testimonial-card">
                    <img src="assets/images/person3.png" alt="Priya" class="testimonial-image">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p><?php echo $translations['testimonial_2']; ?></p>
                    <h4>- Priya, Beneficiary</h4>
                </div>
                <div class="testimonial-card">
                    <img src="assets/images/person2.png" alt="Anil" class="testimonial-image">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p><?php echo $translations['testimonial_3']; ?></p>
                    <h4>- Anil, Donor</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section id="cta" class="cta fade-in">
        <div class="container">
            <h2><?php echo $translations['join_us']; ?></h2>
            <p><?php echo $translations['cta_description']; ?></p>
            <a href="donation.php" class="cta-button"><?php echo $translations['get_involved']; ?></a>
        </div>
    </section>

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
    <script>
        // Fade-in animation for testimonial cards
        const testimonialCards = document.querySelectorAll('.testimonial-card');
    
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Stop observing after animation
                    }
                });
            },
            { threshold: 0.3 } // Trigger when 50% of the card is visible
        );
    
        testimonialCards.forEach((card) => {
            observer.observe(card);


        });

        // Function to add animation class when element is in view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.fade-in');

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            console.log(`Element in view: ${entry.target.id}`); // Debugging
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target); // Stop observing after animation
                        }
                    });
                },
                { threshold: 0.5 } // Trigger when 50% of the element is visible
            );

            elements.forEach((element) => {
                console.log(`Observing element: ${element.id}`); // Debugging
                observer.observe(element);
            });
        };

        // Run the function when the page loads
        window.addEventListener('load', animateOnScroll);
    </script>
    <script src="assets/js/script.js"></script>
</body>
</html>



        <!-- // Language Selector
        const languageSelector = document.getElementById('language-selector');

        // Function to load language file
        async function loadLanguage(lang) {
            try {
                const response = await fetch(`languages/${lang}.json`);
                if (!response.ok) {
                    throw new Error(`Failed to load language file: ${lang}.json`);
                }
                const translations = await response.json();
                console.log(`Loaded translations for ${lang}:`, translations);
                return translations;
            } catch (error) {
                console.error(error);
                return {};
            }
        }

        // Function to update content with translations
        function updateContent(translations) {
            const elements = document.querySelectorAll('[data-i18n]');
            elements.forEach((element) => {
                const key = element.getAttribute('data-i18n');
                if (translations[key]) {
                    element.textContent = translations[key];
                } else {
                    console.warn(`Translation not found for key: ${key}`);
                }
            });
        }

        // Event listener for language change
        languageSelector.addEventListener('change', async (event) => {
            const selectedLanguage = event.target.value;
            console.log(`Selected language: ${selectedLanguage}`);
            const translations = await loadLanguage(selectedLanguage);
            updateContent(translations);

            // Save selected language to localStorage
            localStorage.setItem('language', selectedLanguage);
        });

        // Load saved language on page load
        window.addEventListener('load', async () => {
            const savedLanguage = localStorage.getItem('language') || 'en';
            languageSelector.value = savedLanguage;
            const translations = await loadLanguage(savedLanguage);
            updateContent(translations);
        });
    </script> -->