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
    <title><?php echo $translations['donation_hero_title']; ?></title>
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
    <section class="donation-hero">
        <div class="container">
            <h1><?php echo $translations['donation_hero_title']; ?></h1>
            <p><?php echo $translations['donation_hero_description']; ?></p>
        </div>
    </section>

    <!-- How Donations Help Section -->
    <section class="how-donations-help fade-in">
        <div class="d_container">
            <div class="content-wrapper">
                <div class="image-content">
                    <img src="assets/images/donation-impact.png" alt="How Donations Help">
                </div>

                <div class="text-content">
                    <h2><?php echo $translations['how_donations_help_title']; ?></h2>
                    <p><?php echo $translations['how_donations_help_description']; ?></p>
                    <div class="read-more">
                        <button onclick="window.location.href='events.php'"><?php echo $translations['read_more']; ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Form Section -->
    <section class="donation-form fade-in">
        <div class="container">
            <div class="form-container">
                <h2><?php echo $translations['donation_form_title']; ?></h2>
                <form id="donationForm">
                    <!-- First Name and Last Name -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name"><?php echo $translations['first_name']; ?></label>
                            <input type="text" id="first-name" name="first_name" required minlength="2" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="last-name"><?php echo $translations['last_name']; ?></label>
                            <input type="text" id="last-name" name="last_name" required minlength="2" maxlength="50">
                        </div>
                    </div>

                    <!-- Email and Phone Number -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email"><?php echo $translations['email']; ?></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone"><?php echo $translations['phone']; ?></label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <!-- Donation Amount -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="amount"><?php echo $translations['amount']; ?></label>
                            <input type="number" id="amount" name="amount" required min="1">
                        </div>
                    </div>


                    <!-- Anonymous Donation -->
                    <div class="anonymous-checkbox">
                        <input type="checkbox" id="anonymous" name="anonymous">
                        <label for="anonymous"><?php echo $translations['anonymous_donation']; ?></label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"><?php echo $translations['donate_now']; ?></button>
                </form>
            </div>

            <div class="image-container">
                <img src="assets/images/donations-form.png" alt="Donation Image">
            </div>
        </div>
    </section>

    <!-- Success Popup -->
    <div class="overlay fade-in" id="overlay"></div>
    <div class="success-popup" id="success-popup">
        <h3><?php echo $translations['thank_you']; ?></h3>
        <p><?php echo $translations['thank_you_message']; ?></p>
        <button onclick="closePopup()"><?php echo $translations['close']; ?></button>
    </div>
    

        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script> -->
  
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

        // Close the success popup
        function closePopup() {
            document.getElementById('success-popup').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
            window.location.href = 'donation.html'; // Redirect to the donation page
        }


        document.getElementById('donationForm').addEventListener('submit', function (event) {
            event.preventDefault();

            clearErrors();
            // Validate First Name
            const firstName = document.getElementById('first-name').value.trim();
            if (!firstName || firstName.length < 2 || firstName.length > 50) {
                showError('first-name', 'First Name must be between 2 and 50 characters.');
                return;
            }

            // Validate Last Name
            const lastName = document.getElementById('last-name').value.trim();
            if (!lastName || lastName.length < 2 || lastName.length > 50) {
                showError('last-name', 'Last Name must be between 2 and 50 characters.');
                return;
            }

            // Validate Email
            const email = document.getElementById('email').value.trim();
            if (!email || !validateEmail(email)) {
                showError('email', 'Please enter a valid email address.');
                return;
            }

            // Validate Phone Number
            const phone = document.getElementById('phone').value.trim();
            if (!phone || !validatePhone(phone)) {
                showError('phone', 'Please enter a valid 10-digit phone number.');
                return;
            }

            // Validate Donation Amount
            const amount = document.getElementById('amount').value.trim();
            if (!amount || isNaN(amount) || amount < 1) {
                showError('amount', 'Please enter a valid donation amount.');
                return;
            }

            console.log('First Name:', firstName);
            console.log('Last Name:', lastName);
            console.log('Email:', email);
            console.log('Phone:', phone);
            console.log('Amount:', amount);


            // PayHere credentials
            // const merchant_id = '1229851'; // Replace with your PayHere Merchant ID
            // const merchant_secret = 'NzczMTM5NTUxMTAzMzUxNjcyMTYwNTQyODM1NTQwMTQ4MTIyNjc='; // Replace with your PayHere Merchant Secret

            // Generate a unique order ID
            const order_id = 'ORDER' + new Date().getTime();

            fetch('generate-hash.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    merchant_id: '1229851', // Replace with your Merchant ID
                    order_id: order_id,
                    amount: amount,
                    currency: 'LKR', // Replace with your currency
                }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const hash = data.hash;
            // PayHere payment URL
            // const payhere_url = 'https://sandbox.payhere.lk/pay/o8d0d8f57'; // Use sandbox for testing

                // Payment details
                const payment_data = {
                    sandbox: true,
                    merchant_id: "1229851",
                    return_url: "http://localhost/NGO/return.php",
                    cancel_url: "http://localhost/NGO/cancel.php",
                    notify_url: "http://localhost/NGO/notify.php",
                    order_id: order_id,
                    items: "Donation",
                    hash: hash,
                    amount: amount,
                    currency: "LKR",
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    phone: phone
                };
            
                console.log('Payment Data:', payment_data);
                console.log('Hash:', hash);
                // Open PayHere payment gateway in a new tab
                const paymentUrl = `https://sandbox.payhere.lk/pay/o8d0d8f57?${new URLSearchParams(payment_data).toString()}`;
                window.open(paymentUrl, '_blank');
                console.log('Payment Link:', paymentUrl);

            })
            .catch(error => {
                console.error('Error generating hash:', error);
                showError('amount', 'Failed to generate payment hash. Please try again.');
            });
            // Generate the hash
            // const hash = strtoupper(
            //     md5(
            //         payment_data.merchant_id +
            //         payment_data.order_id +
            //         Number(payment_data.amount).toFixed(2) +
            //         payment_data.currency +
            //         strtoupper(md5(merchant_secret))
            //     )
            // );

            // Add the hash to the payment data
            // payment_data.hash = hash;

            // console.log('Hash:', hash);

            // // Generate the payment link
            // const payment_link = payhere_url + '?' + new URLSearchParams(payment_data).toString();

            // // Debug: Log the payment link
            //  console.log('Payment Link:', payment_link);

            //  // Open the payment link in a new tab
            // window.open(payment_link, '_blank');

            // Redirect to PayHere
            // window.location.href = payment_link;
        });

       
        //  // Helper function to generate MD5 hash
        //  function md5(input) {
        //     return CryptoJS.MD5(input).toString();
        // }

        // // Helper function to convert string to uppercase
        // function strtoupper(input) {
        //     return input.toUpperCase();
        // }

        // Helper Functions
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePhone(phone) {
            const phoneRegex = /^[0-9]{10}$/;
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

        // Close popup when clicking outside
        document.getElementById('overlay').addEventListener('click', closePopup);
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