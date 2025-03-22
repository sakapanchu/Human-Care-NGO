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
    <title><?php echo $translations['about_us']; ?> - Human Care</title>
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
                        <option value="ta" <?php echo ($selectedLang === 'ta') ? 'selected' : ''; ?>>Tamil</option>
                        <option value="si" <?php echo ($selectedLang === 'si') ? 'selected' : ''; ?>>Sinhala</option>
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

    <!-- About Hero Section -->
    <section id="about-hero" class="about-hero">
        <div class="container">
            <h1><?php echo $translations['about_us']; ?></h1>
            <p class="about-description">
                <?php echo $translations['about_description']; ?>
            </p>        
        </div>
    </section>

    <!-- Mission, Vision, and Values Section -->
    <section id="mission-vision-values" class="mission-vision-values fade-in">
        <div class="container">
            <h2><?php echo $translations['mission_vision_values']; ?></h2>
            <div class="mv-container">
                <!-- Mission -->
                <div class="mv-card">
                    <i class="fas fa-bullseye"></i>
                    <h3><?php echo $translations['our_mission']; ?></h3>
                    <p><?php echo $translations['mission_description']; ?></p>
                </div>
                <!-- Vision -->
                <div class="mv-card">
                    <i class="fas fa-eye"></i>
                    <h3><?php echo $translations['our_vision']; ?></h3>
                    <p><?php echo $translations['vision_description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="our-story" class="our-story fade-in">
        <div class="container">
            <div class="story-content">
                <h2><?php echo $translations['our_story']; ?></h2>
                <p><?php echo $translations['story_description_1']; ?></p>
                <p><?php echo $translations['story_description_2']; ?></p>
                <p><?php echo $translations['story_description_3']; ?></p>
            </div>
            <div class="story-image">
                <img src="assets/images/about-story.png" alt="Our Story" width="300px" height="400px">
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section id="our-team" class="our-team fade-in">
        <div class="t_container">
            <h2><?php echo $translations['our_team']; ?></h2>
            <p><?php echo $translations['team_description']; ?></p>
            <div class="team-members">
                <!-- Team Member 1 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member1.png" alt="Team Member 1" height="300" width="80">
                            <h3><?php echo $translations['team_member_1_name']; ?></h3>
                            <p><?php echo $translations['team_member_1_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_1_name']; ?></h3>
                            <p><?php echo $translations['team_member_1_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member2.png" alt="Team Member 2" height="300" width="80">
                            <h3><?php echo $translations['team_member_2_name']; ?></h3>
                            <p><?php echo $translations['team_member_2_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_2_name']; ?></h3>
                            <p><?php echo $translations['team_member_2_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member3.png" alt="Team Member 3" height="300" width="80">
                            <h3><?php echo $translations['team_member_3_name']; ?></h3>
                            <p><?php echo $translations['team_member_3_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_3_name']; ?></h3>
                            <p><?php echo $translations['team_member_3_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 4 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member4.png" alt="Team Member 4" height="300" width="80">
                            <h3><?php echo $translations['team_member_4_name']; ?></h3>
                            <p><?php echo $translations['team_member_4_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_4_name']; ?></h3>
                            <p><?php echo $translations['team_member_4_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 5 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member5.png" alt="Team Member 5" height="300" width="80">
                            <h3><?php echo $translations['team_member_5_name']; ?></h3>
                            <p><?php echo $translations['team_member_5_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_5_name']; ?></h3>
                            <p><?php echo $translations['team_member_5_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 6 -->
                <div class="team-card">
                    <div class="team-card-inner">
                        <div class="team-card-front">
                            <img src="assets/images/member6.png" alt="Team Member 6" height="300" width="80">
                            <h3><?php echo $translations['team_member_6_name']; ?></h3>
                            <p><?php echo $translations['team_member_6_role']; ?></p>
                        </div>
                        <div class="team-card-back">
                            <h3><?php echo $translations['team_member_6_name']; ?></h3>
                            <p><?php echo $translations['team_member_6_description']; ?></p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section id="our-values" class="our-values fade-in">
        <div class="container">
            <h2><?php echo $translations['our_values']; ?></h2>
            <p class="section-description"><?php echo $translations['values_description']; ?></p>
            <div class="values-list">
                <!-- Value Card 1 -->
                <div class="value-card">
                    <i class="fas fa-heart"></i>
                    <h3><?php echo $translations['value_1_title']; ?></h3>
                    <p><?php echo $translations['value_1_description']; ?></p>
                </div>
                <!-- Value Card 2 -->
                <div class="value-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3><?php echo $translations['value_2_title']; ?></h3>
                    <p><?php echo $translations['value_2_description']; ?></p>
                </div>
                <!-- Value Card 3 -->
                <div class="value-card">
                    <i class="fas fa-users"></i>
                    <h3><?php echo $translations['value_3_title']; ?></h3>
                    <p><?php echo $translations['value_3_description']; ?></p>
                </div>
                <!-- Value Card 4 -->
                <div class="value-card">
                    <i class="fas fa-balance-scale"></i>
                    <h3><?php echo $translations['value_4_title']; ?></h3>
                    <p><?php echo $translations['value_4_description']; ?></p>
                </div>
                <!-- Value Card 5 -->
                <div class="value-card">
                    <i class="fas fa-lightbulb"></i>
                    <h3><?php echo $translations['value_5_title']; ?></h3>
                    <p><?php echo $translations['value_5_description']; ?></p>
                </div>
                <!-- Value Card 6 -->
                <div class="value-card">
                    <i class="fas fa-globe"></i>
                    <h3><?php echo $translations['value_6_title']; ?></h3>
                    <p><?php echo $translations['value_6_description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Achievements Section -->
    <section id="our-achievements" class="our-achievements fade-in">
        <div class="container">
            <h2><?php echo $translations['our_achievements']; ?></h2>
            <p class="section-description"><?php echo $translations['achievements_description']; ?></p>
            <div class="achievements-list">
                <!-- Achievement 1 -->
                <div class="achievement-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3 class="counter" data-target="10000">0</h3>
                    <p><?php echo $translations['achievement_1']; ?></p>
                </div>
                <!-- Achievement 2 -->
                <div class="achievement-card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3 class="counter" data-target="50000">0</h3>
                    <p><?php echo $translations['achievement_2']; ?></p>
                </div>
                <!-- Achievement 3 -->
                <div class="achievement-card">
                    <i class="fas fa-users"></i>
                    <h3 class="counter" data-target="100">0</h3>
                    <p><?php echo $translations['achievement_3']; ?></p>
                </div>
                <!-- Achievement 4 -->
                <div class="achievement-card">
                    <i class="fas fa-tasks"></i>
                    <h3 class="counter" data-target="500">0</h3>
                    <p><?php echo $translations['achievement_4']; ?></p>
                </div>
                <!-- Achievement 5 -->
                <div class="achievement-card">
                    <i class="fas fa-hands-helping"></i>
                    <h3 class="counter" data-target="1000">0</h3>
                    <p><?php echo $translations['achievement_5']; ?></p>
                </div>
                <!-- Achievement 6 -->
                <div class="achievement-card">
                    <i class="fas fa-handshake"></i>
                    <h3 class="counter" data-target="200">0</h3>
                    <p><?php echo $translations['achievement_6']; ?></p>
                </div>
            </div>
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
        // Number Counter Animation
        const counters = document.querySelectorAll('.counter');
    
        const startCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000; // Animation duration in milliseconds
            const increment = target / (duration / 16); // 16ms is roughly 60fps
    
            let current = 0;
    
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString(); // Format number with commas
                }
            };
    
            updateCounter();
        };
    
        // Intersection Observer to trigger the counter animation
        const achievementsSection = document.querySelector('.our-achievements');
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        counters.forEach((counter) => {
                            startCounter(counter);
                        });
                        observer.unobserve(entry.target); // Stop observing after animation starts
                    }
                });
            },
            { threshold: 0.5 } // Trigger when 50% of the section is visible
        );
    
        observer.observe(achievementsSection);
    </script>

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
                { threshold: 0.5 } // Trigger when 50% of the element is visible
            );

            elements.forEach((element) => {
                observer.observe(element);
            });
        };

        // Run the function when the page loads
        window.addEventListener('load', animateOnScroll);
    </script>
    
    <script src="assets/js/script.js"></script>
</body>
</html>