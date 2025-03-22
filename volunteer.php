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
    <title><?php echo $translations['events_hero_title']; ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style> 

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
    <section class="volunteer-hero">
        <div class="container">
            <h1><?php echo $translations['volunteer_hero_title']; ?></h1>
            <p><?php echo $translations['volunteer_hero_description']; ?></p>
        </div>
    </section>

    <!-- Why Volunteer Section -->
    <section class="why-volunteer fade-in">
        <div class="container">
            <h2><?php echo $translations['why_volunteer_title']; ?></h2>
            <div class="reasons">
                <div class="reason">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3><?php echo $translations['reason1_title']; ?></h3>
                    <p><?php echo $translations['reason1_description']; ?></p>
                </div>
                <div class="reason">
                    <i class="fas fa-users"></i>
                    <h3><?php echo $translations['reason2_title']; ?></h3>
                    <p><?php echo $translations['reason2_description']; ?></p>
                </div>
                <div class="reason">
                    <i class="fas fa-chart-line"></i>
                    <h3><?php echo $translations['reason3_title']; ?></h3>
                    <p><?php echo $translations['reason3_description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Testimonials -->
    <section class="volunteer-testimonials fade-in">
        <div class="container">
            <h2><?php echo $translations['testimonials_title']; ?></h2>
            <div class="volunteer-testimonial-list">
                <div class="volunteer-testimonial">
                    <img src="assets/images/volunteer1.png" alt="Volunteer 1">
                    <p>"<?php echo $translations['testimonial1']; ?></p>
                    <h4>- John Doe</h4>
                </div>
                <div class="volunteer-testimonial">
                    <img src="assets/images/volunteer2.png" alt="Volunteer 2">
                    <p><?php echo $translations['testimonial2']; ?></p>
                    <h4>- Jane Smith</h4>
                </div>
                <div class="volunteer-testimonial">
                    <img src="assets/images/volunteer3.png" alt="Volunteer 3">
                    <p><?php echo $translations['testimonial3']; ?></p>
                    <h4>- Michael Brown</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Form Section -->
    <section class="volunteer-form fade-in">
        <div class="container">
            <div class="form-container">
                <h2><?php echo $translations['volunteer_form_title']; ?></h2>
                <form id="applicationForm" action="submit_volunteer.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name"><?php echo $translations['form_name_label']; ?></label>
                        <input type="text" id="name" name="name" placeholder="<?php echo $translations['form_name_placeholder']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email"><?php echo $translations['form_email_label']; ?></label>
                        <input type="email" id="email" name="email" placeholder="<?php echo $translations['form_email_placeholder']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone"><?php echo $translations['form_phone_label']; ?></label>
                        <input type="tel" id="phone" name="phone" placeholder="<?php echo $translations['form_phone_placeholder']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="interestArea"><?php echo $translations['form_interest_label']; ?></label>
                        <select id="interest" name="interest" required>
                            <option value="" disabled selected><?php echo $translations['form_interest_placeholder']; ?></option>
                            <option value="health"><?php echo $translations['health']; ?></option>
                            <option value="education"><?php echo $translations['education']; ?></option>
                            <option value="environment"><?php echo $translations['environment']; ?></option>
                            <option value="women_empowerment"><?php echo $translations['women_empowerment']; ?></option>
                            <option value="other"><?php echo $translations['other']; ?></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="messages"><?php echo $translations['form_message_label']; ?></label>
                        <textarea id="message" name="message" placeholder="<?php echo $translations['form_message_placeholder']; ?>"></textarea>
                    </div>
                    
                    <button type="submit"><?php echo $translations['form_submit_button']; ?></button>
                </form>
            </div>

            <div class="image-container">
                <img src="assets/images/volunteer-form.png" alt="Donation Image" heigth="800px" width="500px">
            </div>

            <!-- Blur Overlay -->
            <div id="blurOverlay" class="blur-overlay"></div>
            <!-- Success Message -->
            <div id="successMessage" class="success-message">
                <h2><?php echo $translations['success_message_title']; ?></h2><br>
                <p><?php echo $translations['thank_you_message']; ?></p>
                <p><?php echo $translations['thank_you_message']; ?></p>           
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

        document.getElementById('successMessage').style.display = 'none';

        // Form Submission Handler
        document.getElementById('applicationForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Get Form Data
            const fullName = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const interest = document.getElementById('interest').value.trim();
            const message = document.getElementById('message').value.trim();

            // Clear previous error messages
            clearErrors();

            // Validate Full Name
            if (!fullName) {
                showError('name', 'Full Name is required.');
                return;
            }

            // Validate Email
            if (!email) {
                showError('email', 'Email Address is required.');
                return;
            } else if (!validateEmail(email)) {
                showError('email', 'Please enter a valid email address.');
                return;
            }

            // Validate Phone Number
            if (!phone) {
                showError('phone', 'Phone Number is required.');
                return;
            } else if (!validatePhone(phone)) {
                showError('phone', 'Please enter a valid phone number.');
                return;
            }

            // Validate City
            if (!interest) {
                showError('interest', 'Interest of area is required.');
                return;
            }

            // Validate Position
            if (!message) {
                showError('message', 'message is required.');
                return;
            }

            // To apply the bounce animation and pulse effect
            document.getElementById('successMessage').classList.add('animated');
            document.getElementById('successMessage').classList.add('pulse');
            
            // Submit form data using Fetch API
            const formData = new FormData(document.getElementById('applicationForm'));

            fetch('submit_volunteer.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data:', data);
                if (data.status === 'success') {
                    
                    showSuccessMessage();
                   

                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to submit the form. Please check the console for details.');
            });
        });

        // Show Success Message
        function showSuccessMessage() {
            const blurOverlay = document.getElementById('blurOverlay');
            const successMessage = document.getElementById('successMessage');

            // Display blur overlay and success message
            blurOverlay.style.display = 'block';
            successMessage.style.display = 'block';

            // Add animation classes
            successMessage.classList.add('animated', 'pulse');

            // Close success message when clicking outside the box
            blurOverlay.addEventListener('click', function () {
                if (event.target === blurOverlay) {
                    resetForm();
                }
            });
        }

        // Reset Form and Hide Success Message
        function resetForm() {
            const blurOverlay = document.getElementById('blurOverlay');
            const successMessage = document.getElementById('successMessage');

            // Hide blur overlay and success message
            blurOverlay.style.display = 'none';
            successMessage.style.display = 'none';

            // Remove animation classes
            successMessage.classList.remove('animated', 'pulse');

            // Reset the form
            document.getElementById('applicationForm').reset();
        }

        // Helper Functions for Validation
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePhone(phone) {
            const phoneRegex = /^[0-9]{10,}$/; // Basic phone number validation (10+ digits)
            return phoneRegex.test(phone);
        }

        // Show Error Message
        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorElement = document.createElement('div');
            errorElement.className = 'error-message';
            errorElement.style.color = 'red';
            errorElement.style.fontSize = '14px';
            errorElement.style.marginTop = '5px';
            errorElement.textContent = message;

            // Append error message below the field
            field.parentNode.appendChild(errorElement);

            // Highlight the field with a red border
            field.style.borderColor = 'red';
        }

        // Clear All Error Messages
        function clearErrors() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(error => error.remove());

            // Reset border colors
            const fields = document.querySelectorAll('input, select, textarea');
            fields.forEach(field => field.style.borderColor = '#ccc');
        }

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